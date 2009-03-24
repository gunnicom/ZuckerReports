<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReports/config.php');

global $mod_strings;
global $app_list_strings;
global $app_strings;
global $current_user, $focus;
global $current_language;
global $zuckerreports_config;

if (!empty($_REQUEST["record"])) {
	$zr_module_strings = return_module_language($current_language, 'ZuckerReports');

	foreach ($zuckerreports_config["providers"] as $provider) {
		if ($provider["menu_ext"] != "yes") continue;
		
		if (!empty($provider["include"])) require_once($provider["include"]);
		
		$seed = new $provider["class_name"];
		if (empty($seed)) continue;
		$templates = $seed->get_full_list("name");
		if (!empty($templates)) {
			foreach ($templates as $t) {
				$mod_link = $t->get_module_link($_REQUEST["module"]);
				if ($mod_link) {
					
					$href = "index.php?module=ZuckerReports&action=ReportOnDemand&record=".$t->id;
					$href .= "&run=false";
					$href .= "&parent_module=".$_REQUEST["module"];
					$href .= "&parent_id=".$_REQUEST["record"];
					//$href .= "&parent_name=".urlencode($focus->get_summary_text());
					$href .= "&".$mod_link->parameterlink_name."=".$_REQUEST["record"];
					
					$module_menu[] = array($href, $t->get_summary_text(), $t->image_module);
				}
			}
		}
	}
}
?>
