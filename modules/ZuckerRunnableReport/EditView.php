<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $timedate;

$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");

$focus =& new RunnableReport();

if (!empty($_REQUEST['record'])) {
	$focus->retrieve($_REQUEST['record']);
	$name = $focus->name;
	$description = $focus->description;
	$settings = $focus->settings;
	$report_result_type = $focus->report_result_type;
	$interval = $focus->schedule_interval;
	$schedule_start = $focus->schedule_start;
}
if (!empty($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}
if (!empty($_REQUEST['description'])) {
	$description = $_REQUEST['description'];
}
if (!empty($_REQUEST['settings'])) {
	$settings = $_REQUEST['settings'];
}
if (!empty($_REQUEST['report_result_type'])) {
	$report_result_type = $_REQUEST['report_result_type'];
}

echo "\n<p>\n";
echo get_module_title("ZuckerRunnableReport", $mod_strings['LBL_RUNNABLEREPORT'].": ".$focus->name, false); 
echo "\n</p>\n";

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$xtpl=new XTemplate ('modules/ZuckerRunnableReport/EditView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);

$xtpl->assign("CALENDAR_LANG", "en");
$xtpl->assign("CALENDAR_DATEFORMAT", $timedate->get_cal_date_format());
$xtpl->assign("USER_DATEFORMAT", '('. $timedate->get_user_date_format().')');

$xtpl->assign("IMAGE_PATH", $image_path);$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("JAVASCRIPT", get_set_focus_js().get_validate_js());
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME", $name);
$xtpl->assign("DESCRIPTION", $description);
$xtpl->assign("SETTINGS", $settings);
$xtpl->assign("REPORT_RESULT_TYPE", $report_result_type);
asort($mod_list_strings["SCHEDULE_INTERVALS"]);
$xtpl->assign("INTERVAL_SELECTION", get_select_options_with_id($mod_list_strings["SCHEDULE_INTERVALS"], $interval));


$json = getJSONobj();

if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id = $current_user->id;
if (empty($focus->assigned_name) && empty($focus->id))  $focus->assigned_user_name = $current_user->user_name;
$assigned_user = get_user_array(TRUE, "Active", $focus->assigned_user_id);
asort($assigned_user);
$xtpl->assign("ASSIGNED_USER_OPTIONS", get_select_options_with_id($assigned_user, $focus->assigned_user_id));
$xtpl->assign("ASSIGNED_USER_NAME", $focus->assigned_user_name);
$xtpl->assign("ASSIGNED_USER_ID", $focus->assigned_user_id );

/// Users Popup
$popup_request_data = array(
	'call_back_function' => 'set_return',
	'form_name' => 'EditView',
	'field_to_name_array' => array(
		'id' => 'assigned_user_id',
		'user_name' => 'assigned_user_name',
		),
	);
$xtpl->assign('encoded_users_popup_request_data', $json->encode($popup_request_data));


require_once('modules/ZuckerReports/SimpleTeams.php');
$xtpl->assign("TEAM_SELECTION", SimpleTeams::xtplGetTeamSelection($xtpl, $focus));


if ($report_result_type == 'FILE' || $focus->report_result_type == "INLINE") $xtpl->parse("main.schedule");
else $xtpl->parse("main.noschedule");

$xtpl->parse("main");
$xtpl->out("main");

require_once('include/javascript/javascript.php');
$javascript = new javascript();
$javascript->setFormName('EditView');
$javascript->setSugarBean($focus);
$javascript->addAllFields('');

$javascript->addFieldGeneric('team_name', 'varchar', $app_strings['LBL_TEAM'] ,'true');
$javascript->addToValidateBinaryDependency('team_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_TEAM'], 'false', '', 'team_id');

$javascript->addToValidateBinaryDependency('assigned_user_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_ASSIGNED_TO'], 'false', '', 'assigned_user_id');
echo $javascript->getScript();
?>