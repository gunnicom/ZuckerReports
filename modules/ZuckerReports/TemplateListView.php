<?php
require_once('XTemplate/xtpl.php');
require_once("data/Tracker.php");
require_once('modules/ZuckerReportTemplate/ReportTemplate.php');
require_once('themes/'.$theme.'/layout_utils.php');
require_once('include/logging.php');
require_once('include/ListView/ListView.php');

global $app_strings;
global $app_list_strings;
global $current_language;
global $current_user;
global $urlPrefix;
global $currentModule;

$current_module_strings = return_module_language($current_language, 'ZuckerReports');

echo "\n<p>\n";
echo get_module_title("ZuckerReports", $mod_strings['LBL_MODULE_TITLE'], false);
echo "\n</p>\n";
global $theme;

$button = "";
if (is_admin($current_user)) {
	$button .= "<form action='index.php' method='post'>\n";
	$button .= "<input type='hidden' name='module' value='ZuckerReports'>\n";
	$button .= "<input type='hidden' name='action'>\n";
	$button .= "<input type='hidden' name='return_module' value='ZuckerReports'>\n";
	$button .= "<input type='hidden' name='return_action' value='TemplateListView'>\n";
	$button .= "<input class='button' onclick='this.form.module.value=\"ZuckerReportTemplate\";this.form.action.value=\"EditView\"' type='submit' value=' ".$mod_strings['LBL_REPORT_TEMPLATE_NEW']."  '>\n";
	$button .= "</form>\n";
}

$seed1 = new ReportTemplate();
$list = $seed1->get_full_list("name");
if (empty($list)) $list = array();

$lv = new ListView();
$lv->initNewXTemplate('modules/ZuckerReports/TemplateListView.html', $current_module_strings);
$lv->setHeaderTitle($current_module_strings['LBL_TEMPLATE_LIST_HEADER']);
$lv->setHeaderText($button);
$lv->show_export_button = false;
$lv->processListView($list, "main", "TEMPLATE");
?>
