<?php
require_once('data/SugarBean.php');
require_once('modules/ZuckerReports/config.php');
require_once('modules/ZuckerReports/ReportProviderBase.php');
require_once('modules/ZuckerReports/SimpleTeams.php');

function endsWith( $str, $sub ) {
	return ( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub );
}

class ReportTemplate extends ReportProviderBase {

	var $name;	
	var $filename;
	var $description;
	var $export_as;

	var $template_url;		
	var $compiled_filename;
	var $resources_folder;

	var $table_name = "zucker_reporttemplates";
	var $object_name = "ReportTemplate";
	var $module_dir = "ZuckerReportTemplate";
	
	function ReportTemplate() {		
		parent::ReportProviderBase();
		$this->new_schema = true;
	}	
	
	function get_summary_text() {		
		return $this->name;	
	}	
	
	function get_export_checkbox_array() {
		global $current_language;
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReportTemplate");
		$export_types = $mod_list_strings["REPORT_EXPORT_TYPES"];
		
		$result = array();
		foreach ($export_types as $key => $value) {
			if (strpos($this->export_as, $key) === false) {
				$checked = "";
			} else {
				$checked = "checked";
			}
			$result[] = '<input type="checkbox" name="export_'.$key.'" value="true" '.$checked.'>'.$value;
		}
		return $result;
	}
	function set_export_from_checkboxes() {
		global $current_language;
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReportTemplate");
		$export_types = $mod_list_strings["REPORT_EXPORT_TYPES"];
		
		$this->export_as = "";
		
		foreach ($export_types as $key => $value) {
			if (!empty($_REQUEST["export_".$key])) {
				$this->export_as .= $key." ";
			}
		}
		if (empty($this->export_as)) {
			$this->export_as = "PDF";
		}
	}
	
	
	function get_export_array() {
		global $current_language;
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReportTemplate");
		$export_types = $mod_list_strings["REPORT_EXPORT_TYPES"];
		
		$result = array();
		foreach ($export_types as $key => $value) {
			if (!(strpos($this->export_as, $key) === false)) {
				$result[] = $value;
			}
		}
		return $result;
	}
	function get_export_selection_array($selected) {
		global $current_language;
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReportTemplate");
		$export_types = $mod_list_strings["REPORT_EXPORT_TYPES"];
		
		$result = array();
		foreach ($export_types as $key => $value) {
			if (!(strpos($this->export_as, $key) === false)) {
				if ($key == $selected) {
					$sel = "selected";
				} else {
					$sel = "";
				}
				$result[] = '<OPTION '.$sel.' value="'.$key.'">'.$value.'</OPTION>';
			}
		}
		return $result;
	}


	
	function fill_in_additional_detail_fields() {		
		global $current_language, $theme;		
		global $sugar_config;				

		$mod_strings = return_module_language($current_language, "ZuckerReportTemplate");
		
		$this->template_url = $this->get_resources_dir().($this->filename);
		$this->compiled_filename = $this->get_resources_dir().($this->filename);
		$this->resources_folder = $this->get_resources_dir().($this->filename)."_files/";
		
		$this->action_module = $this->module_dir;
		$this->type_desc = $mod_strings["LBL_REPORT"];
		$this->image_html = get_image("themes/".$theme."/images/ZuckerReportTemplate", "alt=\"ZuckerReportTemplate\"");
		$this->image_module = "ZuckerReportTemplate";

		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
		$this->team_name = SimpleTeams::get_assigned_team_name($this);
	}			

	function getByFilename($filename) {
		return ReportTemplate::get_by_filename($filename);
	}	
	
	function get_by_filename($filename) {
		$seed = new ReportTemplate();
		$results = $seed->get_full_list("", "filename='".$filename."'");
		if (!empty($results)) {
			$result = $results[0];
			$result->retrieve();
			return $result;
		} else {
			return NULL;
		}
	}	

	function unlink_all_files() {
		@unlink($this->compiled_filename);
		$this->rec_delete($this->resources_folder);
	}
	
	function set_reportfile($infile, $orig_filename) {
		global $mod_strings;
	

		if (substr($orig_filename, strrpos($orig_filename, ".") + 1) == "jrxml") {
			$this->filename = substr($orig_filename, 0, strrpos($orig_filename, ".")).".jasper";
			$this->fill_in_additional_detail_fields();
			
			$classpath = $this->get_classpath();
			$result = $this->execute_java("-classpath ".$classpath." at.go_mobile.zuckerreports.JasperCompileMain ".$infile." ".$this->compiled_filename);
			return $result;
		} else {
			$this->report_output = $mod_strings['ERR_TEMPLATE_INVALID_FILE'];
			return FALSE;
		}
	}

	function add_subreportfile($infile, $orig_filename) {
		global $mod_strings;

		if (!file_exists($this->resources_folder)) {
			mkdir($this->resources_folder, 0700);		
		}
	
		$filename = substr($orig_filename, 0, strrpos($orig_filename, ".")).".jasper";
		$compiled_filename = ($this->resources_folder)."/".($filename);

		if (substr($orig_filename, strrpos($orig_filename, ".") + 1) == "jrxml") {
			$classpath = $this->get_classpath();
			$result = $this->execute_java('-classpath '.$classpath.' at.go_mobile.zuckerreports.JasperCompileMain "'.$infile.'" "'.$compiled_filename.'"');
			return $result;	
		} else {
			$this->report_output = $mod_strings['ERR_TEMPLATE_INVALID_FILE'];
			return FALSE;
		}
	}

	function add_resource_file($infile, $orig_filename) {
		if (!file_exists($this->resources_folder)) {
			mkdir($this->resources_folder, 0700);
		}
		copy($infile, $this->resources_folder."/".$orig_filename);
	}
	
	function execute_request($parameter_values = array(), $archive_dir = "") {
		if (empty($archive_dir)) $archive_dir = $this->get_archive_dir();
		return $this->execute($_REQUEST['format'], $parameter_values, $archive_dir);
	}
	
	
	//$format = "PDF", "XLS", "CSV", "HTML", "XML", "XML_EMBED"
	function execute($format = 'PDF', $parameter_values = array(), $archive_dir = "") {
		global $sugar_config, $current_user;
		global $zuckerreports_config;

		if (empty($archive_dir)) $archive_dir = $this->get_archive_dir();
		
		$base = substr($this->filename, 0, strrpos($this->filename, "."));
		
		$date = date("ymd_His");
		if ($format == 'XLS') {
			$this->report_result_name = $date."_".$base.".xls";
		} else if ($format == 'CSV') {
			$this->report_result_name = $date."_".$base.".csv";
		} else if ($format == 'HTML') {
			$this->report_result_name = $date."_".$base.".html";
		} else if ($format == 'XML') {
			$this->report_result_name = $date."_".$base.".xml";
		} else if ($format == 'XML_EMBED') {
			$this->report_result_name = $date."_".$base.".xml";
		} else {
			$this->report_result_name = $date."_".$base.".pdf";
		}
		$this->report_result_name = strtolower(join("_", explode(" ", $this->report_result_name)));
		$this->report_result = $archive_dir."/".$this->report_result_name;
		
		if ($format == 'HTML') {
			$this->report_result_type = "FORWARD";
		} else {
			$this->report_result_type = "FILE";
		}
		
		$tempdir = ($this->get_temp_dir()).create_guid();	
		$cmdfile = $tempdir."/cmd.properties";
		mkdir($tempdir, 0700);		
		$f = fopen($cmdfile, "w");
		fwrite($f, "jasper.datasource=jdbc\n");

		if ($sugar_config["dbconfig"]["db_type"] == 'mysql') {
			fwrite($f, "jdbc.driver=com.mysql.jdbc.Driver\n");
			fwrite($f, "jdbc.url=jdbc:mysql://".($sugar_config["dbconfig"]["db_host_name"]).":3306/".($sugar_config["dbconfig"]["db_name"]).$zuckerreports_config["jdbc_url_extension"]."\n");
		} else if ($sugar_config["dbconfig"]["db_type"] == 'mssql') {
			fwrite($f, "jdbc.driver=com.microsoft.sqlserver.jdbc.SQLServerDriver\n");
			//fwrite($f, "jdbc.url=jdbc:sqlserver://".($sugar_config["dbconfig"]["db_host_name"])."\\\\".($sugar_config["dbconfig"]["db_host_instance"]).";databaseName=".($sugar_config["dbconfig"]["db_name"]).$zuckerreports_config["jdbc_url_extension"]."\n");
			fwrite($f, "jdbc.url=jdbc:sqlserver://localhost\\\\".($sugar_config["dbconfig"]["db_host_instance"]).";databaseName=".($sugar_config["dbconfig"]["db_name"]).$zuckerreports_config["jdbc_url_extension"]."\n");
		} else {
			return "Database Type ".$sugar_config["dbconfig"]["db_type"]." not supported by ZuckerReports";
		}
		
		fwrite($f, "jdbc.user=".($sugar_config["dbconfig"]["db_user_name"])."\n");
		fwrite($f, "jdbc.password=".($sugar_config["dbconfig"]["db_password"])."\n");
		fwrite($f, "jasper.sourcefile=".$this->compiled_filename."\n");
		fwrite($f, "jasper.targetfile=".$this->report_result."\n");
		fwrite($f, "jasper.format=".$format."\n");
		fwrite($f, "sugar.site_url=".($sugar_config['site_url'])."/\n");
		fwrite($f, "parameter.SUGAR_USER_ID=".($current_user->id)."\n");
		fwrite($f, "parameter.SUGAR_USER_NAME=".($current_user->user_name)."\n");
		fwrite($f, "parameter.SUGAR_SESSION_ID=".($_REQUEST['PHPSESSID'])."\n");
		fwrite($f, "parameter.SUBREPORT_DIR=".($this->resources_folder)."\n");
		foreach ($parameter_values as $name => $value) {			
			fwrite($f, "parameter.".$name."=".$value."\n");
		}		
		fclose($f);

		$classpath = $this->get_classpath();
		$result = $this->execute_java("-classpath ".$classpath." at.go_mobile.zuckerreports.JasperBatchMain ".$cmdfile."");
		
		if ($zuckerreports_config["debug"] != "yes") $this->rec_delete($tempdir);
		return $result;
	}

	function execute_java($args) {
		global $zuckerreports_config;
	
		$pattern = $zuckerreports_config["java_cmdline"];
		
		if (empty($pattern)) {
			if ($this->isWindows()) {
				$pattern = "javaw %ARGS% 2>&1";
			} else {
				$pattern = "java -Djava.awt.headless=true %ARGS% 2>&1";
			}
		}
		$cmdline = str_replace("%ARGS%", $args, $pattern);

		exec($cmdline, $output, $return_var);
		$GLOBALS['log']->debug("execute_java: ".$cmdline." => ".$return_var);
		
		if ($return_var == 0) {			
			$this->report_output = join("<br/>", $output);
			return TRUE;		
		} else {			
			$this->report_output = "cmdline: ".$cmdline." <br/>".join("<br/>", $output);				
			return FALSE;		
		}	
	}
	function execute_cmd($cmdline) {
		exec($cmdline, $output, $return_var);
		$GLOBALS['log']->debug("execute_cmd: ".$cmdline." => ".$return_var);
		
		if ($return_var == 0) {			
			$this->report_output = join("<br/>", $output);
			return TRUE;		
		} else {			
			$this->report_output = "cmdline: ".$cmdline." <br/>".join("<br/>", $output);				
			return FALSE;		
		}	
	}

	function get_classpath() {
	
		if ($this->isWindows()) {
			$cp_sep = ";";
		} else {
			$cp_sep = ":";
		}	

		$classpath = $this->get_resources_dir().$cp_sep.($this->resources_folder);
	
		$jars = array();
		$d = opendir("modules/ZuckerReports/jasper");
		while (false !== ($file = readdir($d))) {
			if ($file == "." || $file == "..") continue;
			if (endsWith($file, ".zip") || endsWith($file, ".jar")) {
				$jars[] = "modules/ZuckerReports/jasper/".$file;
			}
		}
		closedir($d);
		$classpath .= $cp_sep.(implode($cp_sep, $jars));

		if (file_exists($this->resources_folder)) {
			$jars = array();
			$d = opendir($this->resources_folder);
			while (false !== ($file = readdir($d))) {
				if ($file == "." || $file == "..") continue;
				if (endsWith($file, ".zip") || endsWith($file, ".jar")) {
					$jars[] = ($this->resources_folder)."/".$file;
				}
			}
			closedir($d);
			$classpath .= $cp_sep.(implode($cp_sep, $jars));
		}
		return '"'.$classpath.'"';
	}
	
	function isWindows() {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
	
	
	function rec_delete($dir) {
		if (file_exists($dir)) {
			$d = opendir($dir);
			while (false !== ($file = readdir($d))) {
				if ($file == "." || $file == "..") continue;
				@unlink($dir."/".$file);
			}
			@rmdir($dir);
		}
	}
	
	function set_report_params_temp($parameter_values = array()) {
		global $current_user;

		$this->cleanup_report_params_temp();

		$sess_id = session_id();
		foreach ($parameter_values as $name => $value) {
			$this->db->query("delete from zucker_reporttemp where name='".($name)."'");
			$this->db->query("insert into zucker_reporttemp(session_id, current_user_id, current_user_name, name, value) values('".$sess_id."', '".($current_user->id)."', '".($current_user->user_name)."', '".$name."', '".$value."')");
		}
	}
	function cleanup_report_params_temp() {
		global $current_user;

		$this->db->query("delete from zucker_reporttemp where current_user_id='".($current_user->id)."'");
	}
		
	function get_format_selection() {
		global $current_language, $app_strings;
	
		$mod_strings = return_module_language($current_language, $this->module_dir);
		$mod_list_strings = return_mod_list_strings_language($current_language, $this->module_dir);
	
		if (isset($_REQUEST["format"])) {
			if (!array_key_exists($_REQUEST["format"], $mod_list_strings["REPORT_EXPORT_TYPES"])) {
				$_REQUEST["format"] = null;
			}
		}
		if (!isset($_REQUEST["format"])) {
			$_REQUEST["format"] = "PDF";
		}
		
		if ($_REQUEST["format"] == "HTML") {
			$this->report_result_type = "FORWARD";
		} else {
			$this->report_result_type = "FILE";
		}
		
		$export_types = $this->get_export_selection_array($_REQUEST['format']);
		return join("\n", $export_types);
	}	
	
	function get_format_scheduler_parameters(&$params) {
		if (!isset($_REQUEST["format"])) {
			$params["format"] = "PDF";
		} else {
			$params["format"] = $_REQUEST["format"];
		}
	}
	
	
}

?>
