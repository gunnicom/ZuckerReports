<?php

require_once('include/logging.php');
require_once('include/utils.php');
require_once('data/SugarBean.php');
require_once('include/TimeDate.php');

class ReportParameter extends SugarBean {

	var $id;
	var $friendly_name;
	var $default_name;
	var $default_value;
	var $description;
	var $range; //SQL,LIST,SIMPLE,DATE,CURRENT_USER
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
	
	function input_required() {
		if ($this->range == "CURRENT_USER") {
			return false;
		}
		if ($this->range == "SCRIPT") {
			return false;
		}
		return true;
	}
	
	function get_parameter_value($rp, $rpl) {
		global $current_language, $current_user;
		
		if ($rp->range == "CURRENT_USER") {
			return $current_user->id;
		} else if ($rp->range == "SCRIPT") {
			return eval($rp->range_options);
		} else {
			return $_REQUEST[$rpl->name];
		}
	}
	
	
	function get_parameter_html($rp, $rpl, $selected_val = "") {
		global $app_strings;
		global $current_language, $current_user;
		
		$mod_strings = return_module_language($current_language, "ZuckerReportParameter");
	
		$xtpl = new XTemplate('modules/ZuckerReportParameter/ParameterFill.html');
		$xtpl->assign("MOD", $mod_strings);
		$xtpl->assign("APP", $app_strings);
		
		if ($rp->range == 'SQL') {
			$param_table = $rp->get_sql_table();
			if (is_array($param_table)) {
				$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
				$xtpl->assign("PARAM_NAME", $rpl->name);
				$xtpl->assign("PARAM_SELECTION", get_select_options_with_id($param_table, $selected_val));
				$xtpl->parse("SQL");
				$parameter_html = $xtpl->text("SQL");
			} else {
				$parameter_html = $param_table."<br/>";
			}
		} else if ($rp->range == 'LIST') {
			$list = $rp->get_list_table();
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_SELECTION", get_select_options_with_id($list, $selected_val));
			$xtpl->parse("LIST");
			$parameter_html = $xtpl->text("LIST");

		} else if ($rp->range == 'SIMPLE') {
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_VALUE", $selected_val);
			$xtpl->parse("SIMPLE");
			$parameter_html = $xtpl->text("SIMPLE");

		} else if ($rp->range == 'DATE') {
			$timedate = new TimeDate();
				
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_VALUE", $selected_val);
			$xtpl->assign("CALENDAR_LANG", "en");
			$xtpl->assign("USER_DATEFORMAT", '('. $timedate->get_user_date_format().')');
			$xtpl->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());
			$xtpl->parse("DATE");
			$parameter_html = $xtpl->text("DATE");
		
		}
	
		return $parameter_html;
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
