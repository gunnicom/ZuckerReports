<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReports/ZuckerReport.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');
require_once('modules/ZuckerReports/Forms.php');


global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_language;

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$container = new ReportContainer();
if(!empty($_REQUEST['record']) && $_REQUEST["record"] != "root") {
	$container = $container->retrieve($_REQUEST['record']);
	if ($container == null) { echo "no access"; exit; }
} else {
	$_REQUEST["record"] = null;
	$container->name = $mod_strings['LBL_CONTAINER_TOP'];
}

echo "\n<p>\n";
echo get_module_title("ZuckerReportContainer", $mod_strings['LBL_CONTAINER'].": ".$container->name, false);
echo "\n</p>\n";

if (!empty($_REQUEST['record'])) {
	echo "\n<p>\n";
	echo ReportContainer::get_root_line_links($_REQUEST['record']);
	echo "<a href='index.php?module=ZuckerReportContainer&action=EditView&record=".$_REQUEST['record']."'> (".$app_strings['LBL_EDIT_BUTTON_LABEL'].")</a>";
	echo "\n</p>\n";
}

$xtpl=new XTemplate ('modules/ZuckerReportContainer/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("THEME", $theme);
$xtpl->assign("GRIDLINE", $gridline);
$xtpl->assign("IMAGE_PATH", $image_path);
	
if (!empty($container->description)) {
	$xtpl->assign("NAME", $container->name);
	$xtpl->assign("DESCRIPTION", nl2br($container->description));
	$xtpl->parse("detail");
	$xtpl->out("detail");
	echo "<p/>\n";
}

/*
if(!empty($_REQUEST['createcontainername'])) {
	$newone = new ReportContainer();
	$newone->name = $_REQUEST['createcontainername'];
	$newone->parent_id = $container->id;
	$newone->assigned_user_id = $current_user->id;
	$newone->team_id = $container->team_id;
	$newone->save();
}
*/

$button = "";
$button .= "<form action='index.php' method='post'>\n";
$button .= "<input type='hidden' name='module' value='ZuckerReportContainer'>\n";
$button .= "<input type='hidden' name='action'>\n";
$button .= "<input type='hidden' name='record'>\n";
$button .= "<input type='hidden' name='parent_id'>\n";
if (!empty($container->id)) {
	$button .= "<input class='button' onclick='this.form.action.value=\"DetailView\"; this.form.record.value=\"".($container->parent_id)."\"' type='submit' value=' ".$mod_strings['LBL_CONTAINER_UP']."  '>\n";
}
$button .= "<input name='name' size='20' maxlength='50' type='text'/>\n";
$button .= "<input class='button' onclick='this.form.action.value=\"New\"; this.form.parent_id.value=\"".($container->id)."\"; return verify_container_data(this.form);' type='submit' value=' ".$mod_strings['LBL_CONTAINER_NEW']."  '>\n";
$button .= "</form>\n";

if (empty($container->id)) {
	$child_containers = ReportContainer::get_root_containers();
	$child_reports = ReportContainer::get_root_reports();
} else {	
	$child_containers = $container->get_linked_beans("containers", "ReportContainer");
	$child_reports = $container->get_linked_beans("reports", "ZuckerReport");
}

$child_containers = SimpleTeams::filterBeanList($child_containers);



require_once('include/ListView/ListView.php');
$lv = new ListView();
$lv->initNewXTemplate('modules/ZuckerReportContainer/DetailView.html', $mod_strings);
$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline.png','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
$lv->xTemplateAssign("EDIT_INLINE_PNG",  get_image($image_path.'edit_inline.png','align="absmiddle" alt="'.$app_strings['LNK_EDIT'].'" border="0"'));
$lv->xTemplateAssign("RETURN_URL", "&return_module=ZuckerReportContainer&return_action=DetailView&return_id=".$container->id);
$lv->setHeaderTitle($mod_strings['LBL_SUBCONTAINERS']);
$lv->setHeaderText($button);
$lv->processListViewTwo($child_containers, "containers", "CONTAINER");

$lv->setHeaderTitle($mod_strings['LBL_SUBREPORTS']);
$lv->setHeaderText("");
$lv->processListViewTwo($child_reports, "reports", "REPORT");

echo get_validate_js();
?>
