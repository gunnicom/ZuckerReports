<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$focus =& new QueryTemplate();


if(isset($_REQUEST['record'])) {
    $focus = $focus->retrieve($_REQUEST['record']);
	if ($focus == null) { echo "no access"; exit; }
	
	$title = $mod_strings['LBL_MODULE_NAME'].": ".$focus->name;
	
	$name = $focus->name;
	$description = $focus->description;
	$sql = $focus->sql1;
} else {
	$title = $mod_strings['LBL_QUERY_TEMPLATE_NEW'];
}

if (!empty($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}
if (!empty($_REQUEST['description'])) {
	$description = $_REQUEST['description'];
}
if (!empty($_REQUEST['sql'])) {
	$sql = $_REQUEST['sql'];
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

echo "\n<p>\n";
echo get_module_title("ZuckerQueryTemplate", $title, false); 
echo "\n</p>\n";


$xtpl=new XTemplate ('modules/ZuckerQueryTemplate/EditView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("JAVASCRIPT", get_set_focus_js().get_validate_js());
$xtpl->assign("ERROR_MSG", $_REQUEST['ERROR_MSG']);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME", $name);
$xtpl->assign("SQL", $sql);
$xtpl->assign("DESCRIPTION", $description);

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


$xtpl->parse("main");
$xtpl->out("main");

?>
