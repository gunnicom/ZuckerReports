<?php
require_once('data/SugarBean.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

class ListingTemplateFilter extends SugarBean {

	var $id;
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;

	var $listing_template_id;
	var $module_name;
	var $field_name;
	var $comparator;
	var $value_type;
	var $value;
	
	var $rpl;
	
	var $module_desc;
	var $filter_desc;
	
	var $table_name = "zucker_listingtemplatefilter";
	var $object_name = "ListingTemplateFilter";
	var $module_dir = "ZuckerListingTemplateFilter";
	
	
	function ListingTemplateFilter() {
		parent::SugarBean();
		$this->new_schema = true;
	}

	function save($check_notify = false) {	
		return parent::save($check_notify);		
	}

	function retrieve($id, $encode=false) {
		$ret = parent::retrieve($id, $encode);
		return $ret;
	}	

	function fill_in_additional_detail_fields() {		
		global $mod_strings;
	
		if ($this->value_type == "parameter") {
			$this->rpl = new ReportParameterLink();
			$this->rpl->retrieve($this->value);
		}
		
		$this->module_desc = $this->module_name;
		$this->filter_desc = $this->get_summary_text();
	}			
	
	function get_summary_text() {
		$result = "";
		$result .= ListingTemplate::get_field_display_name($this->module_name, $this->field_name);
		$result .= " ".$this->comparator." ";
		if ($this->value_type == "parameter") {
			$result .= "'&lt;&lt; ".$this->rpl->name." &gt;&gt;'";
		} else {
			$result .= "'".$this->value."'";
		}
		return $result;
	}
	
	function create_where_clause($parameter_values = array()) {
		global $beanList, $beanFiles;

		$result = "";
		
		$beanName = $beanList[$this->module_name];
		$beanFile = $beanFiles[$beanName];
		if (!empty($beanName) && !empty($beanFile)) {
			
			require_once($beanFile);
			$seed = new $beanName;
			
			
			
			$field_def = $seed->field_defs[$this->field_name];
			if ($field_def["type"] == "relate" && $field_def["source"] == "non-db") {
				$result .= $field_def["table"].".".$field_def["rname"];
			} else {
				$result .= $seed->table_name.".".$this->field_name;
			}
			$result .= " ".$this->comparator." ";
			
			if ($this->value_type == "parameter") {
			
				$rpl = new ReportParameterLink();
				$rpl->retrieve($this->value);
				$result .= "'".$parameter_values[$rpl->name]."'";
			} else {
				$result .= "'".$this->value."'";
			}
		}
		return $result;
	}
	
}

?>
