<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReports/ZuckerReport.php');
require_once('include/upload_file.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$focus =& new ZuckerReport();

if(isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
}

echo "\n<p>\n";
echo get_module_title("ZuckerReports", $mod_strings['LBL_MODULE_NAME'].": ".$focus->filename, false); 
echo "\n</p>\n";

if (!empty($focus->container_id)) {
	echo "\n<p>\n";
	echo ReportContainer::get_root_line_links($focus->container_id);
	echo "\n</p>\n";
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$xtpl=new XTemplate ('modules/ZuckerReports/ReportDetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("CONTAINER_ID", $focus->container_id);
$xtpl->assign("CONTAINER_NAME", $focus->container_name);
$xtpl->assign("DESCRIPTION", $focus->description);
$xtpl->assign("PUBLISHED_TEXT", $focus->published_text);
$xtpl->assign("CONTAINER_ID", $focus->container_id);

//$fileurl = "<a href=\"".UploadFile::get_url($focus->filename,$focus->id)."\" target=\"_blank\">". $focus->filename ."</a>";
$fileurl = "<a href=\"index.php?entryPoint=download&id=".$focus->id."&type=Notes\" target=\"_blank\">". $focus->filename ."</a>";


$xtpl->assign("FILELINK", $fileurl);


if ($focus->published) {
	$xtpl->parse("main.unpublish");
} else {
	$xtpl->parse("main.publish");
}

$xtpl->parse("main");
$xtpl->out("main");
?>
