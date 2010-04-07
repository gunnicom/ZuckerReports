<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReports/ZuckerReport.php');

global $mod_strings;
global $app_strings;
global $current_user;
global $current_language;
$current_module_strings = return_module_language($current_language, 'ZuckerReports');

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$seed = new ZuckerReport();

require_once('include/ListView/ListView.php');
$lv = new ListView();
$lv->initNewXTemplate('modules/ZuckerReports/ReportHomeView.html', $current_module_strings);
$lv->setHeaderTitle($current_module_strings['LBL_HOME_REPORTS']);
$lv->show_export_button = false;
$lv->setQuery("published=1", "20", "date_modified desc", "REPORT");
$lv->processListView($seed, "main", "REPORT");
?>
