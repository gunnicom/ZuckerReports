<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('themes/'.$theme.'/layout_utils.php');
require_once('include/ListView/ListView.php');

global $app_strings;
global $app_list_strings;
global $current_language;
global $current_user;
global $urlPrefix;
global $currentModule;

$current_module_strings = return_module_language($current_language, 'ZuckerReports');

echo "\n<p>\n";
echo get_module_title($mod_strings['LBL_MODULE_NAME'], $mod_strings['LBL_MODULE_TITLE'], false);
echo "\n</p>\n";
global $theme;

$button = "";
if (is_admin($current_user)) {
	$button .= "<form action='index.php' method='post'>\n";
	$button .= "<input type='hidden' name='module' value='ZuckerReportParameter'>\n";
	$button .= "<input type='hidden' name='action'>\n";
	$button .= "<input type='hidden' name='return_module' value='ZuckerReportParameter'>\n";
	$button .= "<input type='hidden' name='return_action' value='ListView'>\n";
	$button .= "<input class='button' onclick='this.form.action.value=\"EditView\"' type='submit' value=' ".$mod_strings['LBL_PARAM_NEW']."  '>\n";
	$button .= "</form>\n";
}

$seed = new ReportParameter();

$lv = new ListView();
$lv->initNewXTemplate('modules/ZuckerReportParameter/ListView.html', $current_module_strings);
$lv->setHeaderTitle($current_module_strings['LNK_PARAMETER_LIST']);
$lv->setHeaderText($button);
$lv->show_export_button = false;
$lv->show_mass_update = false;
$lv->show_delete_button = false;
$lv->show_select_menu = false;
$lv->setQuery("", "", "default_name", "PARAM");
$lv->processListView($seed, "main", "PARAM");
?>
