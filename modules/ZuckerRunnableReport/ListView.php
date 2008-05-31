<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');
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


$seed = new RunnableReport();

$lv = new ListView();
$lv->initNewXTemplate('modules/ZuckerRunnableReport/ListView.html', $current_module_strings);
$lv->setHeaderTitle($current_module_strings['LNK_RUNNABLE_REPORTS']);
$lv->show_export_button = false;
$lv->show_mass_update = false;
$lv->show_delete_button = false;
$lv->show_select_menu = false;
$lv->setQuery("", "", "name", "RUNNABLE");
$lv->processListView($seed, "main", "RUNNABLE");
?>
