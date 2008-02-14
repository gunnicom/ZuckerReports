<?php
require_once('include/logging.php');
require_once('data/SugarBean.php');
require_once('modules/ZuckerReportModuleLink/ReportModuleLink.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');

class ReportProviderBase extends SugarBean {

	var $id;	
	var $created_by;	
	var $date_entered;	
	var $date_modified;	
	var $modified_user_id;		
	
	var $image_html;
	var $image_module;
	var $action_module;
	var $type_desc;

	function ReportProviderBase() {		
		parent::SugarBean();		
		$this->new_schema = true;
	}	

	function save($check_notify = false) {			
		return parent::save($check_notify);			
	}	
	
	function retrieve($id = NULL, $encode=false) {		
		$ret = parent::retrieve($id, $encode);		
		return $ret;	
	}			
	
	function fill_in_additional_list_fields() {		
		$this->fill_in_additional_detail_fields();	
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
