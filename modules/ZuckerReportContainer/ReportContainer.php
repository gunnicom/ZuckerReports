<?php
require_once('include/utils.php');
require_once('data/SugarBean.php');
require_once('data/SugarBean.php');
require_once('modules/ZuckerReports/Report.php');
require_once('modules/ZuckerReports/SimpleTeams.php');

class ReportContainer extends SugarBean {

	var $id;
	var $parent_id;
	var $name;
	var $description;

	var $assigned_user_id;
	var $assigned_user_name;
	var $team_id;
	var $team_name;
	
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;

	var $parent_name;
	
	var $table_name = "zucker_reportcontainer";
	var $object_name = "ReportContainer";	
	var $module_dir = "ZuckerReportContainer";


	function ReportContainer() {
		parent::SugarBean();
		$this->new_schema = true;
		
		if(empty($GLOBALS["current_user"]))
		{
			$this->assigned_user_id = 1;
			$this->assigned_user_name = 'admin';
		}
		else
		{
			$this->assigned_user_id = $GLOBALS["current_user"]->id;
			$this->assigned_user_name = $GLOBALS["current_user"]->user_name;
		}
		SimpleTeams::prepareBean($this);
	}

	function save($check_notify = false) {	
		return parent::save($check_notify);		
	}

	function retrieve($id = -1) {
		$bean = parent::retrieve($id);
		if ($bean != null) {
			if (!SimpleTeams::checkAccess($bean)) {
				$bean = null;
			}
		}
		return $bean;
	}
	
	function get_full_list($order_by = "", $where = "") {
		$list = parent::get_full_list($order_by, $where);
		
		if (!empty($list)) $list = SimpleTeams::filterBeanList($list);
		return $list;
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL':return true;
		}
		return false;
	}
	
	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
		$this->parent_name = "";
		if (!empty($this->parent_id)) {
			$query = "select name from zucker_reportcontainer where id = '$this->parent_id' and deleted=0";
			$result =& $this->db->query($query);
			if ($result) {
				$row = $this->db->fetchByAssoc($result);
				if ($row) {
					$this->parent_name = $row["name"];
				}
			}
		}

		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = SimpleTeams::get_assigned_team_name($this);
	}
	
	function get_summary_text() {
		return $this->name;
	}
	
	function get_parent_container() {
		if (!empty($this->parent_id)) {
			$parent = new ReportContainer();
			return $parent->retrieve($this->parent_id);
		}
		return false;
	}

	function mark_deleted($id) {
		$rc = new ReportContainer();
		$rc = $rc->retrieve($id);
		if ($rc) {
			$child_containers = $rc->get_linked_beans("containers", "ReportContainer");
			$child_reports = $rc->get_linked_beans("reports", "ZuckerReport");
			foreach ($child_containers as $c) {
				$c->parent_id = $rc->parent_id;
				$c->save();
			}
			foreach ($child_reports as $r) {
				$r->container_id = $rc->parent_id;
				$r->save();
			}
		}
		SugarBean::mark_deleted($id);
	}

	function get_root_line_links($id) {
		$root_line = ReportContainer::get_root_line($id);
		$links = array();
		foreach ($root_line as $obj) {
			$links[] = '<a href="index.php?module=ZuckerReportContainer&action=DetailView&record='.($obj->id).'">'.$obj->get_summary_text().'</a>';
		}
		return join("->", $links);
	}
	

	function get_root_line($id) {
		global $mod_strings;
	
		$result = array();
		$obj = new ReportContainer();
		$obj->retrieve($id);
		$result[] = $obj;
		while (($obj = $obj->get_parent_container())) {
			$result[] = $obj;
		}
		$obj = new ReportContainer();
		$obj->name = $mod_strings['LBL_CONTAINER_TOP'];
		$result[] = $obj;
		
		return array_reverse($result);
	}	
	
	function get_root_containers() {
		$root = new ReportContainer();
		$seed = new ReportContainer();
		$query = "select id from zucker_reportcontainer where (parent_id is null or parent_id = '') and deleted = 0";
		$result = $root->build_related_list($query, $seed);
		return $result;
	}
	function get_root_reports() {
		$root = new ReportContainer();
		$seed = new ZuckerReport();
		$query = "select id from zucker_report where (container_id is null or container_id = '') and deleted = 0";
		$result = $root->build_related_list($query, $seed);
		return $result;
	}	
	
	function get_category_select_options() {
		$root = new ReportContainer();
		$result = array();
		$result[""] = "";
		ReportContainer::get_category_select_options_rec($result, $root, "");
		
		return $result;
	}
	
	function get_category_select_options_rec(&$result, $container, $prefix) {
		if (empty($container->id)) {
			$child_containers = ReportContainer::get_root_containers();		
		} else {
			$child_containers = $container->get_linked_beans("containers", "ReportContainer");
		}
		$child_containers = SimpleTeams::filterBeanList($child_containers);
		
		foreach ($child_containers as $child) {
			$result[$child->id] = "".$prefix.($child->name);
			ReportContainer::get_category_select_options_rec($result, $child, $prefix."--");
		}
	}
}

?>
