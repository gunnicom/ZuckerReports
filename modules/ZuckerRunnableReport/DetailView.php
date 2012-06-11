<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');
require_once('modules/ZuckerReports/Forms.php');


global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_language;

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$focus =& new RunnableReport();

if(isset($_REQUEST['record'])) {
    $focus = $focus->retrieve($_REQUEST['record']);
	if ($focus == null) { echo "no access"; exit; }
}

echo "\n<p>\n";
echo get_module_title("ZuckerRunnableReport", $mod_strings['LBL_RUNNABLEREPORT'].": ".$focus->name, false);
echo "\n</p>\n";


$xtpl=new XTemplate ('modules/ZuckerRunnableReport/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME", $focus->name);
$xtpl->assign("SCHEDULE_INTERVAL", $focus->schedule_interval_desc);
$xtpl->assign("NEXT_RUN", $focus->nextrun);
$xtpl->assign("DESCRIPTION", $focus->description);
$xtpl->assign("SETTINGS", $focus->settings);
$xtpl->assign("REPORT_RESULT_TYPE", $focus->report_result_type);
$xtpl->assign("LASTLOG", $focus->lastlog);


$xtpl->assign('assigned_user_name', $focus->assigned_user_name);
$xtpl->assign('TEAM', $focus->team_name);

if ($focus->ACLAccess('edit')) $xtpl->parse("main.edit");
if ($focus->ACLAccess('delete')) $xtpl->parse("main.delete");

if ($focus->report_result_type == 'FILE') $xtpl->parse("main.schedule");

$xtpl->parse("main");
$xtpl->out("main");
?>
