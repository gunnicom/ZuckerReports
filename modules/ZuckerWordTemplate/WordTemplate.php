<?php
require_once('data/SugarBean.php');
require_once('modules/ZuckerReports/ReportProviderBase.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

class WordTemplate extends ReportProviderBase {

	var $name;	
	var $filename;
	var $querytemplate_id;
	var $description;
	
	var $querytemplate;
	var $querytemplate_name;
	var $querytemplate_link;
	
	var $template_url;
	var $extension;
	
	var $table_name = "zucker_wordtemplates";
	var $object_name = "WordTemplate";
	var $module_dir = "ZuckerWordTemplate";
	
	function WordTemplate() {		
		parent::ReportProviderBase();		
		$this->new_schema = true;
	}	
	
	function get_summary_text() {		
		return $this->name;	
	}	
	
	function fill_in_additional_detail_fields() {		
		global $current_language, $theme;

		$mod_strings = return_module_language($current_language, "ZuckerWordTemplate");
	
		if (!empty($this->filename)) {
			$this->template_url = $this->get_resources_dir().($this->filename);
			$this->extension = substr($this->filename, strrpos($this->filename, ".") + 1);
		}		
		$this->action_module = $this->module_dir;

		$seed = new QueryTemplate();
		$this->querytemplate = $seed->retrieve($this->querytemplate_id);
		if (empty($this->querytemplate)) {
			$seed = new ListingTemplate();
			$this->querytemplate = $seed->retrieve($this->querytemplate_id);
		}
		
		if (!empty($this->querytemplate)) {
			$this->querytemplate_name = $this->querytemplate->name;
			$this->querytemplate_link = "index.php?module=".$this->querytemplate->module_dir."&action=DetailView&record=".$this->querytemplate->id;
		}

		
		

		if ($this->extension == "stw" || $this->extension == "odt") {
			$this->type_desc = $mod_strings["LBL_OPENOFFICE"];
			$this->image_html = get_image("themes/".$theme."/images/ZuckerOpenOfficeTemplate", "alt=\"ZuckerOpenOfficeTemplate\"");
			$this->image_module = "ZuckerOpenOfficeTemplate";
		} else if ($this->extension == "doc") {
			$this->type_desc = $mod_strings["LBL_WORD"];
			$this->image_html = get_image("themes/".$theme."/images/ZuckerWordTemplate", "alt=\"ZuckerWordTemplate\"");
			$this->image_module = "ZuckerWordTemplate";
		}
		
		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = SimpleTeams::get_assigned_team_name($this);
	}			

	function get_parameter_links() {
		if (empty($this->querytemplate)) {
			return array();
		} else {
			return $this->querytemplate->get_parameter_links();
		}
	}
	
	function get_module_link($module_name) {
		if (empty($this->querytemplate)) {
			return array();
		} else {
			return $this->querytemplate->get_module_link($module_name);
		}
	}

	function get_for_module($module_name) {
		$query = "SELECT distinct(wt.id) from zucker_wordtemplates wt, zucker_querytemplates qt, zucker_reportmodulelink rl, zucker_reportparameterlink rpl where wt.querytemplate_id = qt.id and qt.id = rpl.template_id and rl.parameterlink_id = rpl.id and rl.module_name='$module_name' AND wt.deleted = 0 and qt.deleted = 0 and rl.deleted = 0 and rpl.deleted=0";		
		$seed = new WordTemplate();
		return $this->build_related_list($query, $seed);
	}
	

	function get_by_name($name) {
		$seed = new WordTemplate();
		$results = $seed->get_full_list("", "name='".$name."'");
		if (!empty($results)) {
			$result = $seed->retrieve($results[0]->id);
			return $result;
		} else {
			return NULL;
		}
	}	
	function get_by_filename($filename) {
		$seed = new WordTemplate();
		$results = $seed->get_full_list("", "filename='".$filename."'");
		if (!empty($results)) {
			$result = $seed->retrieve($results[0]->id);
			return $result;
		} else {
			return NULL;
		}
	}	
	function get_by_query($query_id) {
		$seed = new WordTemplate();
		$result = $seed->get_full_list("name", "querytemplate_id='".$query_id."'");
		if (empty($result)) $result = array();
		return $result;
	}

	
	
	function unlink_all_files() {
		@unlink($this->get_resources_dir().($this->filename));
	}

	function mark_relationships_deleted($id) {
		//don't do this here ... all is linked to query ...
	}

	function set_templatefile($infile, $orig_filename) {
		global $mod_strings;
	

		if (substr($orig_filename, strrpos($orig_filename, ".") + 1) == "doc") {
			$this->filename = $orig_filename;
			$this->fill_in_additional_detail_fields();
			copy($infile, $this->get_resources_dir().($this->filename));
			return TRUE;	
		} else if (substr($orig_filename, strrpos($orig_filename, ".") + 1) == "stw" || substr($orig_filename, strrpos($orig_filename, ".") + 1) == "odt") {
			$this->filename = $orig_filename;
			$this->fill_in_additional_detail_fields();
			copy($infile, $this->get_resources_dir().($this->filename));
			return TRUE;	
		} else {
			$this->report_output = $mod_strings['ERR_TEMPLATE_INVALID_OFFICE_FILE'];
			return FALSE;
		}
	}

	var $save_path;
	var $archive_dir;
	
	function execute_request($parameter_values = array(), $archive_dir = "") {
		
		$this->save_path = $_REQUEST['save_path'];
		if (empty($archive_dir)) $this->archive_dir = $this->get_archive_dir();
		else $this->archive_dir = $archive_dir;
		
		return $this->execute($_REQUEST['format'], $parameter_values);
	}

	//$format = Fax, Mail, Print, NewDocument
	function execute($format, $parameter_values = array()) {
		global $sugar_config, $current_user;
		global $zuckerreports_config;

		$result = FALSE;
		$rt = new ReportTemplate();

		$base = substr($this->filename, 0, strrpos($this->filename, "."));
		$date = date("ymd_His");
		
		$this->report_result_type = "FORWARD";
		if ($this->extension == "stw" || $this->extension == "odt") {
			$this->report_result_name = $date."_".$base.".zro";
		} else if ($this->extension == "doc") {
			$this->report_result_name = $date."_".$base.".zrw";
		}
		$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
		$this->report_result = $this->archive_dir."/".$this->report_result_name;

		$tempdir = ($this->get_temp_dir()).create_guid();	
		$cmdfile = $tempdir."/cmd.xml";
		mkdir($tempdir, 0700);
		
		if ($rt->isWindows()) {
			$abs_report_result = realpath(str_replace("/", "\\", $this->archive_dir))."\\".($this->report_result_name);
			$abs_tempdir = realpath(str_replace("/", "\\", $tempdir));
		} else {
			$abs_report_result = realpath($this->archive_dir)."/".($this->report_result_name);
			$abs_tempdir = realpath($tempdir);
		}
		

		

		if ($this->extension == "stw" || $this->extension == "odt") {
			$data_format = "CSV";
		} else if ($this->extension == "doc") {
			$data_format = "SIMPLEHTML";
		}

		$data_success = false;
		if ($this->querytemplate->object_name == "ListingTemplate") {
			$this->querytemplate->archive_dir = $tempdir;
			$this->querytemplate->include_header = TRUE;
			$this->querytemplate->col_delim = ",";
			$this->querytemplate->row_delim = "\n";
			$data_success = $this->querytemplate->execute($data_format, $parameter_values);
			
		} else if ($this->querytemplate->object_name == "QueryTemplate") {
			$this->querytemplate->archive_dir = $tempdir;
			$this->querytemplate->include_header = TRUE;
			$this->querytemplate->col_delim = ",";
			$this->querytemplate->row_delim = "\n";
			$data_success = $this->querytemplate->execute($data_format, $parameter_values);
			
		}
		if ($data_success) {
		
			$datafile = $this->querytemplate->report_result_name;
			copy($this->get_resources_dir().($this->filename), $tempdir."/".($this->filename));

			$f = fopen($cmdfile, "w");
			fwrite($f, "<ZuckerReportsCommand><ZuckerReports>\n");
			if ($this->extension == "stw") {
				fwrite($f, " <Application>StarWriter</Application>\n");
			} else if ($this->extension == "odt") {
				fwrite($f, " <Application>OpenOffice</Application>\n");
			} else if ($this->extension == "doc") {
				fwrite($f, " <Application>Word</Application>\n");
			}
			fwrite($f, " <Destination>".$format."</Destination>\n");
			if ($format == "Save") {
				fwrite($f, " <SavePath>".$this->save_path."</SavePath>\n");
			}
			fwrite($f, " <DataPath>".$datafile."</DataPath>\n");
			fwrite($f, " <TemplatePath>".($this->filename)."</TemplatePath>\n");
			fwrite($f, " <Sugar>\n");
			fwrite($f, "  <SiteUrl>".($sugar_config['site_url'])."/</SiteUrl>\n");
			fwrite($f, " </Sugar>\n");
			fwrite($f, " <Parameter name=\"SUGAR_USER_ID\" value=\"".($current_user->id)."\"/>\n");
			fwrite($f, " <Parameter name=\"SUGAR_USER_NAME\" value=\"".($current_user->user_name)."\"/>\n");
			fwrite($f, " <Parameter name=\"SUGAR_SESSION_ID\" value=\"".($_REQUEST['PHPSESSID'])."\"/>\n");
			foreach ($parameter_values as $name => $value) {			
				fwrite($f, " <Parameter name=\"".$name."\" value=\"".$value."\"/>\n");
			}		
			fwrite($f, "</ZuckerReports></ZuckerReportsCommand>\n");
			fclose($f);

		
			$zip_pattern = $zuckerreports_config["zip_cmdline"];
			if (empty($zip_pattern) || $zip_pattern == "java") {
				$success = $rt->execute_java("sun.tools.jar.Main cfM ".($this->report_result)." -C ".$tempdir." .");
				
			} else if ($zip_pattern == "zip") {
			
				if ($rt->isWindows()) {
					$exec_path = realpath("modules\\ZuckerReports\\resources")."\\zip.exe";
				} else {
					$exec_path = "zip";
				}
				$cmdline = "cd \"".$abs_tempdir."\" && \"".$exec_path."\" \"".$abs_report_result."\" *";
				$success = $rt->execute_cmd($cmdline);
				
			} else {
				$cmdline = $zip_pattern;
				$cmdline = str_replace("%DIR%", $abs_tempdir, $cmdline);
				$cmdline = str_replace("%FILE%", $abs_report_result, $cmdline);
				
				$success = $rt->execute_cmd($cmdline);
			}
			


			
			if ($success) {
				$result = TRUE;
			} else {
				$this->report_output = $rt->report_output;
				$result = FALSE;
			}
		} else {
			$this->report_output = $this->querytemplate->report_output;
			$result = FALSE;
		}
		$rt->rec_delete($tempdir);
		return $result;
	}
	
	function get_format_selection() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);

		$this->report_result_type = "FORWARD";
		
		if ($this->extension == "stw" || $this->extension == "odt") {
			if (isset($_REQUEST["format"])) {
				if (!array_key_exists($_REQUEST["format"], $mod_list_strings["OPENOFFICE_EXPORT_TYPES"])) {
					$_REQUEST["format"] = null;
				}
			}
			if (!isset($_REQUEST["format"])) {
				$_REQUEST["format"] = "File";
			}
			asort($mod_list_strings["OPENOFFICE_EXPORT_TYPES"]);
			return get_select_options_with_id($mod_list_strings["OPENOFFICE_EXPORT_TYPES"], $_REQUEST["format"]);
		} else if ($this->extension == "doc") {
			if (isset($_REQUEST["format"])) {
				if (!array_key_exists($_REQUEST["format"], $mod_list_strings["WORD_EXPORT_TYPES"])) {
					$_REQUEST["format"] = null;
				}
			}
			if (!isset($_REQUEST["format"])) {
				$_REQUEST["format"] = "NewDocument";
			}
			asort($mod_list_strings["WORD_EXPORT_TYPES"]);
			return get_select_options_with_id($mod_list_strings["WORD_EXPORT_TYPES"], $_REQUEST["format"]);
		}
	}		

	function get_format_parameters() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);

		$xtpl = new XTemplate('modules/ZuckerWordTemplate/OnDemand.html');
		$xtpl->assign("MOD", $mod_strings);
		$xtpl->assign("APP", $app_strings);		
		$xtpl->parse("msg");
		return $xtpl->text("msg");
	}
	
}

?>
