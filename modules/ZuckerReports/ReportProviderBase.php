<?php
require_once('data/SugarBean.php');
require_once('modules/ZuckerReportModuleLink/ReportModuleLink.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('modules/ZuckerReports/SimpleTeams.php');

class ReportProviderBase extends SugarBean {

	var $id;	
	var $created_by;	
	var $date_entered;	
	var $date_modified;	
	var $modified_user_id;		

	var $assigned_user_id;
	var $assigned_user_name;
	var $team_id;
	var $team_name;
	
	var $image_html;
	var $image_module;
	var $action_module;
	var $type_desc;

	function ReportProviderBase() {		
		parent::SugarBean();		
		$this->new_schema = true;
		global $current_user;
		if(empty($current_user))
		{
			$this->assigned_user_id = 1;
			$this->assigned_user_name = 'admin';
		}
		else
		{
			$this->assigned_user_id = $current_user->id;
			$this->assigned_user_name = $current_user->user_name;
		}
		SimpleTeams::prepareBean($this);
	}	

	function bean_implements($interface){
		switch($interface){
			case 'ACL':return true;
		}
		return false;
	}

	function save($check_notify = false) {			
		return parent::save($check_notify);			
	}	
	
	function retrieve($id = NULL, $encode=false) {		
		$bean = parent::retrieve($id, $encode);
		if ($bean != null) {
			if (!SimpleTeams::checkAccess($bean)) {
				$bean = null;
			}
		}
		return $bean;
	}
	function get_all($order_by = "", $where = "") {
		$list = parent::get_list($order_by, $where, 0, 1000, 1000, 0);
		$list = $list["list"];
		
		if (!empty($list)) $list = SimpleTeams::filterBeanList($list);
		return $list;
	}
	
	function get_charset() {
		global $sugar_config;
		global $zuckerreports_config;
		
		if (empty($zuckerreports_config["charset"])) {
			return $sugar_config["default_charset"];
		} else {
			return $zuckerreports_config["charset"];
		}
	}
	
	function fill_in_additional_list_fields() {		
		$this->fill_in_additional_detail_fields();	
	}	

	function format_value_for_html($value) {
		return nl2br(htmlentities(from_html($value), ENT_COMPAT, $this->get_charset()));
	}
	
	function get_parameter_links() {
		$query = "SELECT id from zucker_reportparameterlink where template_id='".$this->id."' AND deleted=0";
		$seed = new ReportParameterLink();
		return $this->build_related_list($query, $seed);
	}	
	function get_module_links() {
		$query = "SELECT rl.id from zucker_reportmodulelink rl, zucker_reportparameterlink rpl where rl.parameterlink_id = rpl.id and rpl.template_id='".$this->id."' AND rl.deleted = 0 and rpl.deleted=0";		
		$seed = new ReportModuleLink();
		return $this->build_related_list($query, $seed);
	}	
	function get_module_link($module_name) {
		$query = "SELECT rl.id from zucker_reportmodulelink rl, zucker_reportparameterlink rpl where rl.parameterlink_id = rpl.id and rpl.template_id='".$this->id."' and rl.module_name='".$module_name."' AND rl.deleted = 0 and rpl.deleted=0";		
		$seed = new ReportModuleLink();
		$list = $this->build_related_list($query, $seed);
		if ($list && count($list) > 0) {
			return $list[0];
		} 
		return FALSE;
	}	
	
	function get_for_module($module_name) {
		$query = "SELECT distinct(t.id) from ".$this->table_name." t, zucker_reportmodulelink rl, zucker_reportparameterlink rpl where t.id = rpl.template_id and rl.parameterlink_id = rpl.id and rl.module_name='".$module_name."' AND t.deleted = 0 and rl.deleted = 0 and rpl.deleted=0";		
		$seed = new $this->object_name;
		return $this->build_related_list($query, $seed);
	}
	
	function mark_relationships_deleted($id) {
		$t = new $this->object_name;
		$t->retrieve($id);
		
		$parameter_links = $t->get_parameter_links();
		$module_links = $t->get_module_links();

		foreach ($parameter_links as $pl) {
			$pl->mark_deleted($pl->id);
		}
		foreach ($module_links as $ml) {
			$ml->mark_deleted($ml->id);
		}
	}


	var $report_output;
	//FILE | INLINE | FORWARD
	var $report_result_type;
	var $report_result_name;
	var $report_result;
	
	
	

	function execute_request($parameter_values = array()) {
		return FALSE;
	}
	function get_format_selection() {
	}	
	function get_format_parameters() {
	}
	
	
}

?>
