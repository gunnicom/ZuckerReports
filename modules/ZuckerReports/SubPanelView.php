<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReports/config.php');

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once ($theme_path."layout_utils.php");

global $mod_strings;
global $app_list_strings;
global $app_strings;
global $current_user, $focus;
global $current_language;
$current_module_strings = return_module_language($current_language, 'ZuckerReports');


echo "<p>\n";
echo get_form_header($current_module_strings["LBL_ONDEMAND_BOUND"], "", FALSE);
echo "</p>\n";


$templates = array();
foreach ($zuckerreports_config["providers"] as $provider) {
	if (!empty($provider["include"])) require_once($provider["include"]);
	
	$seed = new $provider["class_name"];
	if (empty($seed)) continue;
	$templates1 = $seed->get_full_list("name");
	if (is_array($templates1)) $templates = array_merge($templates, $templates1);
}

$template_select = array();
$javascript_table = "";
$javascript_params = "";
$params = array();
foreach ($templates as $t) {
	$mod_link = $t->get_module_link($_REQUEST["module"]);
	if ($mod_link) {
		$template_select[$t->id] = $t->get_summary_text();
		
		$javascript_table .= "mapping['$t->id'] = '$mod_link->parameterlink_name';\n";
		if (!array_key_exists($mod_link->parameterlink_name, $params)) {
			$params[$mod_link->parameterlink_name] = "hugo";
			$javascript_params .= "<input type='hidden' name='$mod_link->parameterlink_name'>\n";
		}
	}
}


$xtpl_reports=new XTemplate ('modules/ZuckerReports/SubPanelView.html');
$xtpl_reports->assign("MOD", $current_module_strings);
$xtpl_reports->assign("APP", $app_strings);
$xtpl_reports->assign("THEME", $theme);
$xtpl_reports->assign("IMAGE_PATH", $image_path);

$xtpl_reports->assign("RETURN_MODULE", $_REQUEST["module"]);
$xtpl_reports->assign("RETURN_ID", $focus->id);
$xtpl_reports->assign("RETURN_ACTION", $_REQUEST["action"]);
$xtpl_reports->assign("PARENT_MODULE", $_REQUEST["module"]);
$xtpl_reports->assign("PARENT_ID", $focus->id);
$xtpl_reports->assign("PARENT_NAME", $focus->get_summary_text());

$xtpl_reports->assign("JAVASCRIPT_PARAMS", $javascript_params);
$xtpl_reports->assign("JAVASCRIPT_TABLE", $javascript_table);
$xtpl_reports->assign("JAVASCRIPT_PARAM", $focus->id);
asort($template_select);
$xtpl_reports->assign("TEMPLATE_SELECTION", get_select_options_with_id($template_select, ""));

$xtpl_reports->assign("REPORT_FORMAT", "PDF");
$xtpl_reports->assign("REPORT_RUN", "false");

if (array_key_exists($_REQUEST["module"], $app_list_strings['record_type_display'])) {
	$xtpl_reports->parse("main.attach");
	$xtpl_reports->parse("main.attachscript");
}

$xtpl_reports->parse("main");
$xtpl_reports->out("main");
?>
