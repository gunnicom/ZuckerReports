<?php

require_once('data/SugarBean.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');

class ReportModuleLink extends SugarBean {

	var $id;
	var $parameterlink_id;
	var $module_name;

	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	
	var $parameterlink;
	var $parameterlink_name;
	var $parameterlink_friendly_name;
	
	var $table_name = "zucker_reportmodulelink";
	var $object_name = "ReportModuleLink";
	var $module_dir = "ZuckerReportModuleLink";

	function ReportModuleLink() {
		parent::SugarBean();
		$this->new_schema = true;
	}

	function save($check_notify = false) {	
		return parent::save($check_notify);		
	}
	function get_summary_text() {
		return $this->name;
	}

	function retrieve($id, $encode=false) {
		$ret = parent::retrieve($id, $encode);
		return $ret;
	}	

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {		
		$this->parameterlink = new ReportParameterLink();
		$this->parameterlink->retrieve($this->parameterlink_id);	
		$this->parameterlink_name = $this->parameterlink->name;
		$this->parameterlink_friendly_name = $this->parameterlink->parameter->friendly_name;
	}	
	
	
}

?>
