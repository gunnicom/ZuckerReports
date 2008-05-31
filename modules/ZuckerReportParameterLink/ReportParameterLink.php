<?php
require_once('data/SugarBean.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');

class ReportParameterLink extends SugarBean {

	var $id;
	var $template_id;
	var $parameter_id;
	var $name;
	var $default_value;

	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	
	var $parameter;
	var $friendly_name;
	var $range_description;
	
	var $table_name = "zucker_reportparameterlink";
	var $object_name = "ReportParameterLink";
	var $module_dir = "ZuckerReportParameterLink";
	
	
	function ReportParameterLink() {
		parent::SugarBean();
		$this->new_schema = true;
		$this->disable_row_level_security = true;
	}

	function save($check_notify = false) {	
		return parent::save($check_notify);		
	}
	function get_summary_text() {
		return (empty($this->friendly_name) ? $this->name : $this->friendly_name);
	}

	function retrieve($id, $encode=false) {
		$ret = parent::retrieve($id, $encode);
		return $ret;
	}	

	function get_scheduler_parameters(&$params) {
		if (empty($this->parameter)) {
			$this->fill_in_additional_detail_fields();
		}
		if ($this->parameter->input_required()) {
			$params[$this->name] = $_REQUEST[$this->name];
		}
	}
	
	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {		
		$this->parameter = new ReportParameter();		
		$this->parameter->retrieve($this->parameter_id);		
		$this->range_description = $this->parameter->range_description;
		$this->friendly_name = $this->parameter->friendly_name;
	}	
	
	
}

?>
