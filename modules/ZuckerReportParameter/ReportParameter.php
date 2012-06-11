<?php

require_once('include/utils.php');
require_once('data/SugarBean.php');
require_once('include/TimeDate.php');

class ReportParameter extends SugarBean {

	var $id;
	var $friendly_name;
	var $default_name;
	var $default_value;
	var $description;
	var $range_name; //SQL,LIST,SIMPLE,DATE,CURRENT_USER
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
		$this->disable_row_level_security = true;
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
		if (!empty($results)) {
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
		$this->range_description = $mod_list_strings['PARAM_RANGE_TYPES'][$this->range_name];
	}
	
	function get_summary_text() {
		return $this->friendly_name." (".$this->range_description.")";
	}			

	function input_required() {
		if ($this->range_name == "CURRENT_USER") {
			return false;
		}
		if ($this->range_name == "DATE_NOW") {
			return false;
		}
		if ($this->range_name == "SCRIPT") {
			return false;
		}
		return true;
	}
	
	function get_parameter_value($rp, $rpl) {
		global $current_language, $current_user;
		
		if ($rp->range_name == "CURRENT_USER") {
			return $current_user->id;
		} else if ($rp->range_name == "SCRIPT") {
			return eval($rp->range_options);
		} else if ($rp->range_name == "DATE") {
		
			$timedate = new TimeDate();
			$result = $timedate->to_db_date($_REQUEST[$rpl->name], false);
			return $result;
		} else if ($rp->range_name == "DATE_NOW") {
		
			$timedate = new TimeDate();
			$result = $timedate->get_gmt_db_datetime();
			return $result;
		
		} else if ($rp->range_name == "DATE_ADD" || $rp->range_name == "DATE_SUB") {
			$timedate = new TimeDate();
			
			$arr = split("::", $_REQUEST[$rpl->name]);
			if (count($arr) == 2) {
				$count = $arr[0];
				$type = $arr[1];
				
				if ($type == "MINUTE") {
					$count *= 60;
				} else if ($type == "HOUR") {
					$count *= 60 * 60;
				} else if ($type == "DAY") {
					$count *= 60 * 60 * 24;
				} else if ($type == "WEEK") {
					$count *= 60 * 60 * 24 * 7;
				} else if ($type == "MONTH") {
					$count *= 60 * 60 * 24 * 30;
				} else if ($type == "YEAR") {
					$count *= 60 * 60 * 24 * 365;
				}
				if ($rp->range_name == "DATE_SUB") $count *= -1;
			} else {
				$count = 0;
			}
			
			$time = time();
			$time += $count;
			$result = date('Y-m-d H:i:s', $time);
			$result = $timedate->to_db($result);
			return $result;
			
		} else {
			return $_REQUEST[$rpl->name];
		}
	}
	
	
	function get_parameter_html($rp, $rpl) {
		global $app_strings;
		global $current_language, $current_user, $theme;
		
		$mod_strings = return_module_language($current_language, "ZuckerReportParameter");
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReportParameter");
	
		$xtpl = new XTemplate('modules/ZuckerReportParameter/ParameterFill.html');
		$xtpl->assign("MOD", $mod_strings);
		$xtpl->assign("APP", $app_strings);
		$xtpl->assign("THEME", $theme);
		
		$selected_val = $rpl->default_value;
		if (!empty($_REQUEST[$rpl->name])) {
			$selected_val = $_REQUEST[$rpl->name];
		}
		
		if ($rp->range_name == 'SQL') {
			$param_table = $rp->get_sql_table();
			asort($param_table);
			if (is_array($param_table)) {
				$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
				$xtpl->assign("PARAM_NAME", $rpl->name);
				$xtpl->assign("PARAM_SELECTION", get_select_options_with_id($param_table, $selected_val));
				$xtpl->parse("SQL");
				$parameter_html = $xtpl->text("SQL");
			} else {
				$parameter_html = $param_table."<br/>";
			}
		} else if ($rp->range_name == 'LIST') {
			$list = $rp->get_list_table();
			asort($list);
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_SELECTION", get_select_options_with_id($list, $selected_val));
			$xtpl->parse("LIST");
			$parameter_html = $xtpl->text("LIST");

		} else if ($rp->range_name == 'DROPDOWN') {
			$app_list_strings = return_app_list_strings_language($current_language);
		
			$list = $rp->get_list_table();
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			asort($app_list_strings[$rp->range_options]);
			$xtpl->assign("PARAM_SELECTION", get_select_options_with_id($app_list_strings[$rp->range_options], $selected_val));
			$xtpl->parse("LIST");
			$parameter_html = $xtpl->text("LIST");

		} else if ($rp->range_name == 'SIMPLE') {
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_VALUE", $selected_val);
			$xtpl->parse("SIMPLE");
			$parameter_html = $xtpl->text("SIMPLE");

		} else if ($rp->range_name == 'DATE') {
			$timedate = new TimeDate();
				
			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_VALUE", $selected_val);
			$xtpl->assign("CALENDAR_LANG", "en");
			$xtpl->assign("USER_DATEFORMAT", '('. $timedate->get_user_date_format().')');
			$xtpl->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());
			$xtpl->parse("DATE");
			$parameter_html = $xtpl->text("DATE");

		} else if ($rp->range_name == 'DATE_ADD' || $rp->range_name == 'DATE_SUB') {

			$xtpl->assign("PARAM_FRIENDLY_NAME", $rpl->friendly_name);
			$xtpl->assign("PARAM_NAME", $rpl->name);
			$xtpl->assign("PARAM_VALUE", $selected_val);
			
			$arr = split("::", $selected_val);
			if (count($arr) == 2) {
				$count = $arr[0];
				$type = $arr[1];
			} else {
				$count = 0;
				$type = NULL;
			}
			$xtpl->assign("PARAM_VALUE_COUNT", $count);
			asort($mod_list_strings['PARAM_DATE_TYPES']);
			$xtpl->assign("PARAM_SELECTION", get_select_options_with_id($mod_list_strings['PARAM_DATE_TYPES'], $type));
			
			$xtpl->parse("DATE_CALC");
			$parameter_html = $xtpl->text("DATE_CALC");
		}
	
		return $parameter_html;
	}	
	
	function get_sql_table($query = "", $limit = -1) {
		if (empty($query)) {			
			$query = $this->range_options;		
		}
		if ($limit > 0) {
			$rs = $this->db->limitQuery($query,0,$limit,false);
		} else {
			$rs = $this->db->query($query, false);
		}
		if(!empty($rs)) {
			$result = array();
			while(($row = $this->db->fetchByAssoc($rs)) != null) {
				$keys = array_keys($row);
				$key = $row[$keys[0]];
				if (count($row) == 1) {
					$value = $key;
				} else {
					$value = $row[$keys[1]];
				}
				$result[$key] = $value;
			}		
		} else {			
			$result = $this->db->last_error;
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
