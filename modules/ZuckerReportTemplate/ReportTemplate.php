<?php
require_once('include/logging.php');
require_once('data/SugarBean.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('modules/ZuckerReportModuleLink/ReportModuleLink.php');

// Enter the path to your java executable here, if autodetection doesn't work

//Windows Environment Default
define("JAVA_CMDLINE", "javaw %ARGS% 2>&1");

//Unix Environment Default
//define("JAVA_CMDLINE", "java -Djava.awt.headless=true %ARGS% 2>&1");

function endsWith( $str, $sub ) {
	return ( substr( $str, strlen( $str ) - strlen( $sub ) ) == $sub );
}

class ReportTemplate extends SugarBean {

	var $id;	
	var $name;	
	var $filename;
	var $description;
	var $export_as;
	var $created_by;	
	var $date_entered;	
	var $date_modified;	
	var $modified_user_id;		
	
	var $template_url;		
	var $compiled_filename;
	var $resources_folder;
	var $icon_url;
	
	var $action_module;
	var $type_desc;

	var $table_name = "zucker_reporttemplates";
	var $object_name = "ReportTemplate";
	var $module_dir = "ZuckerReportTemplate";
	
	function ReportTemplate() {		
		parent::SugarBean();		
		$this->new_schema = true;	
	}	
	
	function save($check_notify = false) {			
		return parent::save($check_notify);			
	}	
	
	function get_summary_text() {		
		return $this->name;	
	}	
	
	function get_export_checkbox_array() {
		global $current_language;
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");
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
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");
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
	
		$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");
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
		global $mod_list_strings;
		
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

	
	function retrieve($id = NULL, $encode=false) {		
		$ret = parent::retrieve($id, $encode);		
		return $ret;	
	}			
	
	function fill_in_additional_list_fields() {		
		$this->fill_in_additional_detail_fields();	
	}	
	
	function fill_in_additional_detail_fields() {		
		global $mod_strings;
		global $current_language;		
		global $sugar_config;				
		
		$mod_strings = return_module_language($current_language, 'ZuckerReports');
		$this->template_url = "modules/ZuckerReports/resources/".($this->filename);
		$this->compiled_filename = "modules/ZuckerReports/resources/".($this->filename);
		$this->resources_folder = "modules/ZuckerReports/resources/".($this->filename)."_files/";
		
		$this->action_module = $this->module_dir;
		$this->type_desc = $mod_strings["LBL_REPORT"];
		$this->icon_url = "modules/ZuckerReports/icons/pdf.gif";
	}			
	
	function get_parameter_links() {
		$query = "SELECT id from zucker_reportparameterlink where template_id='$this->id' AND deleted=0";
		$seed = new ReportParameterLink();	
		return $this->build_related_list($query, $seed);
	}	
	function get_module_links() {
		$query = "SELECT rl.id from zucker_reportmodulelink rl, zucker_reportparameterlink rpl where rl.parameterlink_id = rpl.id and rpl.template_id='$this->id' AND rl.deleted = 0 and rpl.deleted=0";		
		$seed = new ReportModuleLink();
		return $this->build_related_list($query, $seed);
	}	
	function get_module_link($module_name) {
		$query = "SELECT rl.id from zucker_reportmodulelink rl, zucker_reportparameterlink rpl where rl.parameterlink_id = rpl.id and rpl.template_id='$this->id' and rl.module_name='$module_name' AND rl.deleted = 0 and rpl.deleted=0";		
		$seed = new ReportModuleLink();
		$list = $this->build_related_list($query, $seed);
		if ($list && count($list) > 0) {
			return $list[0];
		} 
		return FALSE;
	}	
	
	function getByFilename($filename) {
		$seed = new ReportTemplate();
		$results = $seed->get_full_list("", "filename='".$filename."'");
		if ($results && count($results) > 0) {
			$result = $results[0];
			$result->retrieve();
			return $result;
		} else {
			return NULL;
		}
	}	

	function get_for_module($module_name) {
		$query = "SELECT distinct(rt.id) from zucker_reporttemplates rt, zucker_reportmodulelink rl, zucker_reportparameterlink rpl where rt.id = rpl.template_id and rl.parameterlink_id = rpl.id and rl.module_name='$module_name' AND rt.deleted = 0 and rl.deleted = 0 and rpl.deleted=0";		
		$seed = new ReportTemplate();
		return $this->build_related_list($query, $seed);
	}
	
	function mark_relationships_deleted($id) {
		$rt = new ReportTemplate();
		$rt->retrieve($id);
		
		$parameter_links = $rt->get_parameter_links();
		$module_links = $rt->get_module_links();

		foreach ($parameter_links as $pl) {
			$pl->mark_deleted($pl->id);
		}
		foreach ($module_links as $ml) {
			$ml->mark_deleted($ml->id);
		}
	}

	function unlink_all_files() {
		@unlink($this->compiled_filename);
		$this->rec_delete($this->resources_folder);
	}
	
	var $report_output;		
	var $report_outfile;
	var $outfile;

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
			mkdir($this->resources_folder, 0755);		
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
			mkdir($this->resources_folder, 0755);
		}
		copy($infile, $this->resources_folder."/".$orig_filename);
	}
	
	function execute_request($parameter_values = array(), $archive_dir = "modules/ZuckerReports/archive/") {
		return $this->execute($_REQUEST['format'], $parameter_values, $archive_dir);
	}
	
	
	//$format = "PDF", "XLS", "CSV", "HTML", "XML", "XML_EMBED"
	function execute($format = 'PDF', $parameter_values = array(), $archive_dir = "modules/ZuckerReports/archive/") {
		global $sugar_config, $current_user;

		$base = substr($this->filename, 0, strrpos($this->filename, "."));
		
		$date = date("ymd_His");
		if ($format == 'XLS') {
			$this->outfile = $date."_".$base.".xls";
		} else if ($format == 'CSV') {
			$this->outfile = $date."_".$base.".csv";
		} else if ($format == 'HTML') {
			$this->outfile = $date."_".$base.".html";
		} else if ($format == 'XML') {
			$this->outfile = $date."_".$base.".xml";
		} else if ($format == 'XML_EMBED') {
			$this->outfile = $date."_".$base.".xml";
		} else {
			$this->outfile = $date."_".$base.".pdf";
		}
		$this->outfile = strtolower(join("_", explode(" ", $this->outfile)));
		$this->report_outfile = $archive_dir."/".$this->outfile;
		
		$tempdir = "modules/ZuckerReports/temp/".create_guid();		
		$cmdfile = $tempdir."/cmd.properties";
		mkdir($tempdir, 0755);		
		$f = fopen($cmdfile, "w");
		fwrite($f, "jasper.datasource=jdbc\n");
		fwrite($f, "jdbc.driver=com.mysql.jdbc.Driver\n");
		fwrite($f, "jdbc.url=jdbc:mysql://".($sugar_config["dbconfig"]["db_host_name"]).":3306/".($sugar_config["dbconfig"]["db_name"])."\n");
		fwrite($f, "jdbc.user=".($sugar_config["dbconfig"]["db_user_name"])."\n");
		fwrite($f, "jdbc.password=".($sugar_config["dbconfig"]["db_password"])."\n");
		fwrite($f, "jasper.sourcefile=".$this->compiled_filename."\n");
		fwrite($f, "jasper.targetfile=".$this->report_outfile."\n");
		fwrite($f, "jasper.format=".$format."\n");
		fwrite($f, "sugar.site_url=".($sugar_config['site_url'])."/\n");
		fwrite($f, "parameter.SUGAR_USER_ID=".($current_user->id)."\n");
		fwrite($f, "parameter.SUGAR_USER_NAME=".($current_user->user_name)."\n");
		fwrite($f, "parameter.SUGAR_SESSION_ID=".($_REQUEST['PHPSESSID'])."\n");
		foreach ($parameter_values as $name => $value) {			
			fwrite($f, "parameter.".$name."=".$value."\n");
		}		
		fclose($f);

		$classpath = $this->get_classpath();
		$result = $this->execute_java("-classpath ".$classpath." at.go_mobile.zuckerreports.JasperBatchMain ".$cmdfile);
		
		$this->rec_delete($tempdir);
		return $result;
	}

	function execute_java($args) {
		$pattern = JAVA_CMDLINE;
		
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
		
		$this->report_output = join("<br/>", $output);				
		if ($return_var == 0) {			
			return TRUE;		
		} else {			
			return FALSE;		
		}	
	}

	function get_classpath() {
	
		if ($this->isWindows()) {
			$cp_sep = ";";
		} else {
			$cp_sep = ":";
		}	

		$classpath = "modules/ZuckerReports/resources/".$cp_sep.($this->resources_folder);
	
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
		
	function can_attach_to_parent() {
		if ($_REQUEST["format"] != "HTML") {
			return TRUE;
		}
		return FALSE;
	}	
	function can_attach_to_container() {
		if ($_REQUEST["format"] != "HTML") {
			return TRUE;
		}
		return FALSE;
	}	
		
	function handle_format_selection(&$xtpl) {
		global $mod_list_strings;
	
		if (isset($_REQUEST["format"])) {
			if (!array_key_exists($_REQUEST["format"], $mod_list_strings["REPORT_EXPORT_TYPES"])) {
				$_REQUEST["format"] = null;
			}
		}
		if (!isset($_REQUEST["format"])) {
			$_REQUEST["format"] = "PDF";
		}
		
		$export_types = $this->get_export_selection_array($_REQUEST['format']);
		$xtpl->assign("FORMAT_SELECTION", join("\n", $export_types));
	}	

	function handle_format_parameters(&$xtpl) {
	}
}

?>
