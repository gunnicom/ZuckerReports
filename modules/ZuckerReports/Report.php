<?php
require_once('include/utils.php');
require_once('data/SugarBean.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');

global $icon_map;

$icon_map = array(
	"csv" => "excel.gif",
	"html" => "html.gif",
	"xls" => "excel.gif",
	"txt" => "txt.gif",
	"pdf" => "pdf.gif",
	"doc" => "word.gif",
	"dot" => "word.gif",
);

class ZuckerReport extends SugarBean {

	var $id;
	var $container_id;
	var $filename;
	var $description;
	var $published;
	
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;

	var $container_name;
	var $published_text;
	var $icon_url;
	
	var $table_name = "zucker_report";
	var $object_name = "ZuckerReport";
	var $module_dir = "ZuckerReports";
	var $column_fields = Array(
		"id"
		,"container_id"
		,"filename"
		,"description"
		,"published"
		,"date_entered"
		,"date_modified"
		,"created_by"
		,"modified_user_id"	
		);
	
	function ZuckerReport() {
		parent::SugarBean();
		$this->new_schema = true;
		$this->disable_row_level_security = true;
	}

	function save($check_notify = false) {	
		return parent::save($check_notify);		
	}

	function retrieve($id, $encode=false) {
		$ret = parent::retrieve($id, $encode);
		return $ret;
	}	

	function populateFromRow($row) {
		//print_r($row);
		$ret = parent::populateFromRow($row);
		return $ret;
	}
	
	function fill_in_additional_list_fields() {
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
		global $mod_strings, $icon_map;
		
		if ($this->published) {
			$this->published_text = $mod_strings["LBL_ZUCKERREPORT_PUBLISHED"];
		} else {
			$this->published_text = $mod_strings["LBL_ZUCKERREPORT_UNPUBLISHED"];
		}
		$this->container_name = "";
		$query = "select * from zucker_reportcontainer where id = '$this->container_id'";
		$result =& $this->db->query($query);
		if ($result) {
			$row = $this->db->fetchByAssoc($result);
			if ($row) {
				$this->container_name = $row["name"];
			}
		}
		
		$ext = substr($this->filename, strrpos($this->filename, ".") + 1);
		if (array_key_exists($ext, $icon_map)) {
			$this->icon_url = "modules/ZuckerReports/icons/".($icon_map[$ext]);
		} else {
			$this->icon_url = "modules/ZuckerReports/icons/txt.gif";
		}
	}
	
	function get_summary_text() {
		return $this->filename;
	}
	
	function get_parent_container() {
		if (!empty($this->container_id)) {
			$parent = new ReportContainer();
			return $parent->retrieve($this->container_id);
		}
		return false;
	}		
	
}

?>
