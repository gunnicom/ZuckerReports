<?php

require_once('data/SugarBean.php');
// Stefan: Fixed missing class error
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

class ListingTemplateOrder extends SugarBean {

	var $id;
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;

	var $listing_template_id;
	var $module_name;
	var $field_name;
	var $order_type;

	var $module_desc;
	var $order_desc;
	
	var $table_name = "zucker_listingtemplateorder";
	var $object_name = "ListingTemplateOrder";
	var $module_dir = "ZuckerListingTemplateOrder";
	
	
	function ListingTemplateOrder() {
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

	function get_summary_text() {
		global $current_language;

		$mod_strings = return_module_language($current_language, "ZuckerListingTemplate");
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerListingTemplate");

		$result = "";
		$result .= ListingTemplate::get_field_display_name($this->module_name, $this->field_name);
		$result .= ", ";
		$result .= $mod_list_strings["LISTING_ORDER_TYPES"][$this->order_type];
		return $result;
	}
	
	
	
	function fill_in_additional_detail_fields() {		
		global $current_language;

		$mod_strings = return_module_language($current_language, "ZuckerListingTemplate");
	
		$this->module_desc = $this->module_name;
		$this->order_desc = $this->get_summary_text();
	}			

	function create_order_clause($parameter_values = array()) {
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
			//$result .= $seed->table_name.".".$this->field_name;
			if ($this->order_type == "asc") {
				$result .= " asc ";
			} else {
				$result .= " desc ";
			}
		}
		return $result;
	}
	
}

?>
