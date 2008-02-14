<?php
require_once('XTemplate/xtpl.php');
require_once('data/Tracker.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerListingTemplate");

$focus =& new ListingTemplate();

if(isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
	$title = $mod_strings['LBL_MODULE_NAME'].": ".$focus->name;
	
	$name = $focus->name;
	$description = $focus->description;
	$mainmodule = $focus->mainmodule;
	$filtertype = $focus->filtertype;
	
} else {
	$title = $mod_strings['LBL_LISTING_TEMPLATE_NEW'];
}

if (!empty($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}
if (!empty($_REQUEST['mainmodule'])) {
	$mainmodule = $_REQUEST['mainmodule'];
}
if (!empty($_REQUEST['filtertype'])) {
	$filtertype = $_REQUEST['filtertype'];
}
if (!empty($_REQUEST['description'])) {
	$description = $_REQUEST['description'];
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

echo "\n<p>\n";
echo get_module_title("ZuckerListingTemplate", $title, false); 
echo "\n</p>\n";



$xtpl=new XTemplate ('modules/ZuckerListingTemplate/EditView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("JAVASCRIPT", get_validate_js());
$xtpl->assign("ERROR_MSG", $_REQUEST['ERROR_MSG']);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME", $name);
$xtpl->assign("DESCRIPTION", $description);


$xtpl->assign("MAINMODULE_OPTIONS", get_select_options_with_id($focus->get_full_beans_list(), $mainmodule));
$xtpl->assign("FILTERTYPE_OPTIONS", get_select_options_with_id($mod_list_strings["LISTING_FILTER_TYPES"], $filtertype));

$xtpl->parse("main");
$xtpl->out("main");

?>
