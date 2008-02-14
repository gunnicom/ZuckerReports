<?php
require_once('XTemplate/xtpl.php');
require_once('data/Tracker.php');
require_once('modules/ZuckerWordTemplate/WordTemplate.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$focus =& new WordTemplate();


if(isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
	$title = $mod_strings['LBL_MODULE_NAME'].": ".$focus->name;
	
	$name = $focus->name;
	$description = $focus->description;
	$querytemplate_id = $focus->querytemplate_id;
} else {
	$title = $mod_strings['LBL_WORD_TEMPLATE_NEW'];
}

if (!empty($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}
if (!empty($_REQUEST['description'])) {
	$description = $_REQUEST['description'];
}
if (!empty($_REQUEST['querytemplate_id'])) {
	$querytemplate_id = $_REQUEST['querytemplate_id'];
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

echo "\n<p>\n";
echo get_module_title("ZuckerWordTemplate", $title, false); 
echo "\n</p>\n";

$xtpl=new XTemplate ('modules/ZuckerWordTemplate/EditView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("JAVASCRIPT", get_validate_js());
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME", $name);
$xtpl->assign("URL", $focus->template_url);
$xtpl->assign("DESCRIPTION", $description);

$xtpl->assign("ERROR_MSG", $_REQUEST["ZR_ERROR_MSG"]);

$qtselect = array();

$qtseed = new QueryTemplate();
$qtlist = $qtseed->get_full_list("name");
foreach ($qtlist as $qt) {
	$qtselect[$qt->id] = $qt->name;
}
$ltseed = new ListingTemplate();
$ltlist = $ltseed->get_full_list("name");
foreach ($ltlist as $lt) {
	$qtselect[$lt->id] = $lt->name;
}

$xtpl->assign("QUERYTEMPLATE_SELECTION", get_select_options_with_id($qtselect, $querytemplate_id));

$xtpl->parse("main");
$xtpl->out("main");

?>