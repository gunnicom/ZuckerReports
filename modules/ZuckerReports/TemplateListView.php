<?php
require_once('XTemplate/xtpl.php');
require_once('themes/'.$theme.'/layout_utils.php');
require_once('include/ListView/ListView.php');
require_once('modules/ZuckerReports/config.php');

global $app_strings;
global $app_list_strings;
global $current_language;
global $current_user;
global $urlPrefix;
global $currentModule;
global $zuckerreports_config;

$current_module_strings = return_module_language($current_language, 'ZuckerReports');

echo "\n<p>\n";
echo get_module_title("ZuckerReports", $mod_strings['LBL_MODULE_TITLE'], false);
echo "\n</p>\n";
global $theme;

$button = "";
$button .= "<form action='index.php' method='post'>\n";
$button .= "<input type='hidden' name='module' value='ZuckerReports'>\n";
$button .= "<input type='hidden' name='action'>\n";
$button .= "<input type='hidden' name='return_module' value='ZuckerReports'>\n";
$button .= "<input type='hidden' name='return_action' value='TemplateListView'>\n";
foreach ($zuckerreports_config["providers"] as $provider) {
	$strings = return_module_language($current_language, $provider["module"]);
	$button .= "<input class='button' onclick='this.form.module.value=\"".$provider["module"]."\";this.form.action.value=\"EditView\"' type='submit' value=' ".$strings[$provider["lang_key_new"]]."  '>\n";
}
$button .= "</form>\n";

$list = array();
foreach ($zuckerreports_config["providers"] as $provider) {
	if (!empty($provider["include"])) require_once($provider["include"]);
	
	$seed = new $provider["class_name"];
	if (empty($seed)) continue;
	$list1 = $seed->get_all("name");
	if (is_array($list1)) $list = array_merge($list, $list1);
}

$lv = new ListView();
$lv->initNewXTemplate('modules/ZuckerReports/TemplateListView.html', $current_module_strings);
$lv->setHeaderTitle($current_module_strings['LBL_TEMPLATE_LIST_HEADER']);
$lv->setHeaderText($button);
$lv->show_export_button = false;
$lv->processListView($list, "main", "TEMPLATE");
?>
