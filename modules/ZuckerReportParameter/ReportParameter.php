<?php

require_once('include/logging.php');
require_once('include/utils.php');
require_once('data/SugarBean.php');

class ReportParameter extends SugarBean {

	var $id;
	var $friendly_name;
	var $default_name;
	var $default_value;
	var $description;
	var $range; //MODULE,SQL,LIST,SIMPLE
	var $range_options; //module to select, sql-query, value-list
	
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;

	var $range_description;
	
	var $table_name = "zucker_reportparameters";
	var $object_name = "ReportParameter";
	var $module_dir = "ZuckerReportParameter";

	function ReportParameter() {
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

	function getByDefaultname($default_name) {
		$seed = new ReportParameter();
		$results = $seed->get_full_list("", "default_name='".$default_name."'");
		if ($results && count($results) > 0) {
			$result = $results[0];
			$result->retrieve();
			return $result;
		} else {
			return NULL;
		}
	}	
	
	
	
	function mark_relationships_deleted($id) {
		$query = "UPDATE zucker_reportparameterlink set deleted=1 where parameter_id='$id'";
		$this->db->query($query, true, "Error marking record deleted: ");
	}

	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
		global $current_language;

		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");
		$this->range_description = $mod_list_strings['PARAM_RANGE_TYPES'][$this->range];
	}
	
	function get_summary_text() {
		return $this->friendly_name." (".$this->range_description.")";
	}			
	
	function get_sql_table($query = "", $limit = "") {		
		if (empty($query)) {			
			$query = $this->range_options;		
		}
		if (!empty($limit)) {
			$query .= " ".$limit;
		}
		$rs = mysql_query($query);		
		if ($rs) {			
			$result = array();			
			if (mysql_num_fields($rs) == 1) {				
				while ($row = mysql_fetch_row($rs)) {					
					$result[$row[0]] = $row[0];				
				}			
			} else {				
				while ($row = mysql_fetch_row($rs)) {					
					$result[$row[0]] = $row[1];				
				}			
			}		
		} else {			
			$result = mysql_errno().": ".mysql_error();		
		}			
		return $result;	
	}		
	
	function get_list_table($list = "") {		
		if (empty($list)) {			
			$list = $this->range_options;		
		}		
		$list = split(",", $list);		
		$result = array();		
		foreach ($list as $l) {			
			$result[$l] = $l;		
		}		
		return $result;	
	}
}

?>
