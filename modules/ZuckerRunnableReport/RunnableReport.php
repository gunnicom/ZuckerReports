<?php

require_once('include/utils.php');
require_once('include/TimeDate.php');
require_once('data/SugarBean.php');
require_once('data/SugarBean.php');
require_once('modules/ZuckerReports/SimpleTeams.php');

class RunnableReport extends SugarBean {

	var $id;
	var $name;
	var $description;
	var $settings;
	var $report_result_type;
	
	var $nextrun;
	var $schedule_interval;
	var $schedule_interval_desc;
	var $lastlog;
	
	var $assigned_user_id;
	var $assigned_user_name;
	var $team_id;
	var $team_name;
	
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	
	var $table_name = "zucker_runnablereport";
	var $object_name = "RunnableReport";	
	var $module_dir = "ZuckerRunnableReport";


	function RunnableReport() {
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
		global $current_language;
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");
		$intervals = $mod_list_strings["SCHEDULE_INTERVALS"];
		
		$this->schedule_interval_desc = $intervals[$this->schedule_interval];
	
		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = SimpleTeams::get_assigned_team_name($this);
	}
	
	function get_summary_text() {
		return $this->name;
	}

	function get_runnablereports_to_run(){
		$time = gmdate('Y-m-d H:i:s', time());
		$query = "SELECT id FROM $this->table_name WHERE nextrun < '$time' AND deleted=0 AND schedule_interval is not null ORDER BY nextrun ASC";
		
		$seed = new RunnableReport();
		$result = $seed->build_related_list($query, $seed);
		return $result;
	}

	function scheduler_run_all() {
		$seed = new RunnableReport();
		$list = $seed->get_runnablereports_to_run();
		foreach ($list as $runnable) {
			$runnable->run(true);
		}
	}
	
	
	function run($update_nextrun_time = false) {
		global $timedate;
		
		$parameter_values = unserialize(html_entity_decode($this->settings));
		
		foreach ($parameter_values as $key=>$value) {
			$_REQUEST[$key] = $value;
		}
		$_REQUEST["reportname"] = $this->name;
		$_REQUEST["is_scheduler"] = "true";
		$_REQUEST["run"] = "true";
		ob_start();
		include("modules/ZuckerReports/ReportOnDemand.php");
		$this->lastlog = ob_get_clean();
		
		if ($update_nextrun_time) {
			$this->nextrun = date($timedate->get_date_time_format(), time() + $this->schedule_interval);
		}
		$this->save();
	}

	function run_inline() {
	
		$parameter_values = unserialize(html_entity_decode($this->settings));
		
		foreach ($parameter_values as $key=>$value) {
			$_REQUEST[$key] = $value;
		}
		$_REQUEST["reportname"] = $this->name;
		$_REQUEST["is_scheduler"] = "true";
		$_REQUEST["run"] = "true";
		ob_start();
		include("modules/ZuckerReports/ReportOnDemand.php");
		$this->lastlog = ob_get_clean();
	
		$this->save();
		return $_REQUEST['REPORT_RESULT'];
	}

	
}

?>
