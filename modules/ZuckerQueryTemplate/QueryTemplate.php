<?php
require_once('include/utils/db_utils.php');
require_once('data/SugarBean.php');
require_once('modules/ZuckerReports/ReportProviderBase.php');

class QueryTemplate extends ReportProviderBase {

	var $name;	
	var $sql1;
	var $description;
	
	var $table_name = "zucker_querytemplates";
	var $object_name = "QueryTemplate";
	var $module_dir = "ZuckerQueryTemplate";
	

	function QueryTemplate() {		
		parent::ReportProviderBase();		
		$this->new_schema = true;
	}	
	
	function get_summary_text() {		
		return $this->name;	
	}	
	
	function fill_in_additional_detail_fields() {		
		global $current_language, $theme;

		$mod_strings = return_module_language($current_language, "ZuckerQueryTemplate");
	
		$this->action_module = $this->module_dir;
		$this->type_desc = $mod_strings["LBL_QUERY"];
		$this->image_html = get_image("themes/".$theme."/images/ZuckerQueryTemplate", "alt=\"ZuckerQueryTemplate\"");
		$this->image_module = "ZuckerQueryTemplate";

		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = SimpleTeams::get_assigned_team_name($this);
	}			

	function getByName($name) {
		return QueryTemplate::get_by_name($name);
	}	
	
	function get_by_name($name) {
		$seed = new QueryTemplate();
		$results = $seed->get_full_list("", "name='".$name."'");
		if (!empty($results)) {
			$result = $seed->retrieve($results[0]->id);
			return $result;
		} else {
			return NULL;
		}
	}	

	var $archive_dir;
	var $include_header;
	var $col_delim;
	var $row_delim;
	
	function execute_request($parameter_values = array(), $archive_dir = "") {

		if (empty($archive_dir)) $archive_dir = $this->get_archive_dir();

		$this->archive_dir = $archive_dir;
		
		if ($_REQUEST["format"] == "CSV") {
			$this->col_delim = $this->get_delim($_REQUEST["col_delim"]);
			$this->row_delim = $this->get_delim($_REQUEST["row_delim"]);
		}
		$this->include_header = isset($_REQUEST["include_header"]);


		return $this->execute($_REQUEST["format"], $parameter_values);
	}

	function execute($format = 'CSV', $parameter_values = array()) {
		global $sugar_config, $current_user, $theme;
		$date = date("ymd_His");
		
		if ($format == 'CSV') {
			$this->report_result_type = "FILE";
			$this->report_result_name = $date."_".$this->name.".csv";
			$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
			$this->report_result = $this->archive_dir."/".$this->report_result_name;
		} else if ($format == 'HTML' || $format == 'SIMPLEHTML') {
			$this->report_result_type = "FILE";
			$this->report_result_name = $date."_".$this->name.".html";
			$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
			$this->report_result = $this->archive_dir."/".$this->report_result_name;
		} else {
			$this->report_result_type = "INLINE";
		}
		
		$seed = new QueryTemplate();
		$bean = $seed->retrieve($this->id, false);
		
		$sql = $bean->sql1;
		foreach ($parameter_values as $name => $value) {
			$sql = str_replace('$'.$name, ''.$value, $sql);
		}
		$sql = str_replace('$SUGAR_USER_ID', $current_user->id, $sql);
		$sql = str_replace('$SUGAR_USER_NAME', $current_user->user_name, $sql);
		$sql = str_replace('$SUGAR_SESSION_ID', $_REQUEST['PHPSESSID'], $sql);
		$this->report_output .= "Query: ".$sql."<br/>";
		
		$rs =& $this->db->query($sql, false, "Error executing query: ");
		if ($rs) {
			$rows_found =  $this->db->getRowCount($rs);
			$this->report_output .= "Found ".$rows_found."<br/>";
			$this->report_output .= "Writing to ".$this->report_result."<br/>";
		
			$fields = $this->db->getFieldsArray($rs);
			if ($format == "CSV") {
				$f = fopen($this->report_result, "w");
				
				if ($this->include_header) {
					foreach ($fields as $field) {
						fwrite($f, $field);
						fwrite($f, $this->col_delim);
					}
					fwrite($f, $this->row_delim);
				}
				for($row = $this->db->fetchByAssoc($rs); $row; $row = $this->db->fetchByAssoc($rs))	{
					for ($i = 0; $i < count($fields); $i++) {
						$field = $fields[$i];
						$pieces = explode("\n", $row[$field]);
						$cleaned_pieces = array();
						foreach ($pieces as $piece) {
							$cleaned_pieces[] = trim($piece);
						}
						fwrite($f, join(" ", $cleaned_pieces));
						if ($i != count($fields) - 1) {
							fwrite($f, $this->col_delim);
						}
					}
					fwrite($f, $this->row_delim);
				}
				fclose($f);
				
				
			} else if ($format == "HTML") {
				$f = fopen($this->report_result, "w");
				
				$c = file_get_contents("modules/ZuckerQueryTemplate/html/header.html");
				$c = str_replace("{SITE_URL}", $sugar_config["site_url"], $c);
				$c = str_replace("{THEME_URL}", $sugar_config["site_url"]."/themes/".$theme, $c);
				$c = str_replace("{CHARSET}", $this->get_charset(), $c);
				fwrite($f, $c);
				
				fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/table_header.html"));
				if ($this->include_header) {
					fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/table_header_row_start.html"));
					foreach ($fields as $field) {
						$c = file_get_contents("modules/ZuckerQueryTemplate/html/table_header_col.html");
						$c = str_replace('{VALUE}', $field, $c);
						fwrite($f, $c);
					}
					fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/table_header_row_end.html"));
				}
				$ext = "1";
				for($row = $this->db->fetchByAssoc($rs); $row; $row = $this->db->fetchByAssoc($rs))	{
					fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/table_row_start.html"));
					
					foreach ($fields as $field) {
						if (empty($row[$field])) {
							$value = "&nbsp;";
						} else {
							$value = $this->format_value_for_html($row[$field]);
						}
						$c = file_get_contents("modules/ZuckerQueryTemplate/html/table_row_col".$ext.".html");
						$c = str_replace('{VALUE}', $value, $c);
						fwrite($f, $c);
					}
					fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/table_row_end.html"));
					if ($ext == "1") $ext = "2";
					else $ext = "1";
				}
				fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/table_footer.html"));
				fwrite($f, file_get_contents("modules/ZuckerQueryTemplate/html/footer.html"));

				fclose($f);

			} else if ($format == "SIMPLEHTML") {
				$f = fopen($this->report_result, "w");

 				fwrite($f, "<!DOCTYPE html PUBLIC \"-//W3C//DTD html 4.01 Transitional//".$this->get_charset()."\">\n");
 				fwrite($f, "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$this->get_charset()."\"></head>");
 				fwrite($f, "<body><table border=\"1\">");
				if ($this->include_header) {
					fwrite($f, "\n<tr>");
					foreach ($fields as $field) {
						fwrite($f, "<th>".$field."</th>");
					}
					fwrite($f, "</tr>");
				}
				for($row = $this->db->fetchByAssoc($rs); $row; $row = $this->db->fetchByAssoc($rs))	{
					fwrite($f, "\n<tr>");
					foreach ($fields as $field) {
						if (empty($row[$field])) {
							fwrite($f, "<td>&nbsp;</td>");
						} else {
							fwrite($f, "<td>".$this->format_value_for_html($row[$field])."</td>");
						}
					}
					fwrite($f, "</tr>");
				}
				fwrite($f, "\n</table></body></html>");
				fclose($f);
				
			} else {
				$this->report_result = file_get_contents("modules/ZuckerQueryTemplate/html/table_header.html");
				if ($this->include_header) {
					$this->report_result .= file_get_contents("modules/ZuckerQueryTemplate/html/table_header_row_start.html");
					foreach ($fields as $field) {
						$c = file_get_contents("modules/ZuckerQueryTemplate/html/table_header_col.html");
						$c = str_replace('{VALUE}', $field, $c);
						$this->report_result .= $c;
					}
					$this->report_result .= file_get_contents("modules/ZuckerQueryTemplate/html/table_header_row_end.html");
				}
				$ext = "1";
				for($row = $this->db->fetchByAssoc($rs); $row; $row = $this->db->fetchByAssoc($rs))	{
					$this->report_result .= file_get_contents("modules/ZuckerQueryTemplate/html/table_row_start.html");
					foreach ($fields as $field) {
						if (empty($row[$field])) {
							$value = "&nbsp;";
						} else {
							$value = $this->format_value_for_html($row[$field]);
						}
						$c = file_get_contents("modules/ZuckerQueryTemplate/html/table_row_col".$ext.".html");
						$c = str_replace('{VALUE}', $value, $c);
						$this->report_result .= $c;
					}
					$this->report_result .= file_get_contents("modules/ZuckerQueryTemplate/html/table_row_end.html");
					
					if ($ext == "1") $ext = "2";
					else $ext = "1";
				}
				$this->report_result .= file_get_contents("modules/ZuckerQueryTemplate/html/table_footer.html");
			}
			
			$result = true;
		} else {
			$result = false;
			if ($this->db->dbType == "mysql") {
				$this->report_output .= "MySQL error ".mysql_errno().": ".mysql_error()."<br/>";
			} else {
				$this->report_output .= $this->database->getMessage()."<br/>";
			}			
		}
		return $result;
	}
	
	function get_delim($in) {
		if ($in == "tab") {
			return "\t";
		} else if ($in == "newline") {
			return "\n";
		} else {
			return $in;
		}
	}
	
	function get_format_selection() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);
	
		if (isset($_REQUEST["format"])) {
			if (!array_key_exists($_REQUEST["format"], $mod_list_strings["QUERY_EXPORT_TYPES"])) {
				$_REQUEST["format"] = null;
			}
		}
		if (!isset($_REQUEST["format"])) {
			$_REQUEST["format"] = "CSV";
		}
		
		if ($_REQUEST["format"] == "CSV") {
			$this->report_result_type = "FILE";
		} else if ($_REQUEST["format"] == "TABLE") {
			$this->report_result_type = "INLINE";
		} else if ($_REQUEST["format"] == "HTML" || $_REQUEST["format"] == "SIMPLEHTML") {
			$this->report_result_type = "FILE";
		}
		
		asort($mod_list_strings["QUERY_EXPORT_TYPES"]);
		return get_select_options_with_id($mod_list_strings["QUERY_EXPORT_TYPES"], $_REQUEST["format"]);
	}	

	
	function get_format_parameters() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);
		
		$xtpl = new XTemplate('modules/ZuckerQueryTemplate/OnDemand.html');
		$xtpl->assign("MOD", $mod_strings);
		$xtpl->assign("APP", $app_strings);		

		if ($_REQUEST["format"] == "CSV") {
			asort($mod_list_strings["COL_DELIMS"]);
			asort($mod_list_strings["ROW_DELIMS"]);
			$xtpl->assign("COL_DELIM_SELECTION", get_select_options_with_id($mod_list_strings["COL_DELIMS"], $_REQUEST["col_delim"]));
			$xtpl->assign("ROW_DELIM_SELECTION", get_select_options_with_id($mod_list_strings["ROW_DELIMS"], $_REQUEST["row_delim"]));
			if (isset($_REQUEST["include_header"])) {
				$xtpl->assign("INCLUDE_HEADER_CHECKED", "checked");
			}
			$xtpl->parse("queryCSV");
			return $xtpl->text("queryCSV");
		} else if ($_REQUEST["format"] == "HTML"  || $_REQUEST["format"] == "SIMPLEHTML") {
			if (isset($_REQUEST["include_header"])) {
				$xtpl->assign("INCLUDE_HEADER_CHECKED", "checked");
			}
			$xtpl->parse("queryHTML");
			return $xtpl->text("queryHTML");
		} else if ($_REQUEST["format"] == "TABLE") {
			if (isset($_REQUEST["include_header"])) {
				$xtpl->assign("INCLUDE_HEADER_CHECKED", "checked");
			}
			$xtpl->parse("queryTABLE");
			return $xtpl->text("queryTABLE");
		}
	}
	
	function get_format_scheduler_parameters(&$params) {
		$params["format"] = $_REQUEST["format"];
		if ($_REQUEST["format"] == "CSV") {
			$params["col_delim"] = $_REQUEST["col_delim"];
			$params["row_delim"] = $_REQUEST["row_delim"];
			if (isset($_REQUEST["include_header"])) {
				$params["include_header"] = $_REQUEST["include_header"];
			}
		} else if ($_REQUEST["format"] == "HTML"  || $_REQUEST["format"] == "SIMPLEHTML") {
			if (isset($_REQUEST["include_header"])) {
				$params["include_header"] = $_REQUEST["include_header"];
			}
		} else if ($_REQUEST["format"] == "TABLE") {
			if (isset($_REQUEST["include_header"])) {
				$params["include_header"] = $_REQUEST["include_header"];
			}
		}
	}	
}

?>
