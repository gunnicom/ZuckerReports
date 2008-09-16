<?php

global $theme;
require_once('XTemplate/xtpl.php');
require_once('include/utils.php');
require_once('include/ListView/ListView.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_language;

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

if(!isset($_REQUEST['form'])) sugar_die("Missing 'form' parameter");

$container = new ReportContainer();
if(!empty($_REQUEST['record'])) {
	$container->retrieve($_REQUEST['record']);
} else {
	$container->name = $mod_strings['LBL_CONTAINER_TOP'];
}

$form =new XTemplate ('modules/ZuckerReportContainer/Popup.html');
$form->assign("MOD", $mod_strings);
$form->assign("APP", $app_strings);

$the_javascript  = "<script type='text/javascript' language='JavaScript'>\n";
$the_javascript .= "function set_return(parent_id, parent_name) {\n";
$the_javascript .= "	window.opener.document.".$_REQUEST['form'].".parent_name.value = parent_name;\n";
$the_javascript .= "	window.opener.document.".$_REQUEST['form'].".parent_id.value = parent_id;\n";
$the_javascript .= "}\n";
$the_javascript .= "</script>\n";
$button  = "<form action='index.php' method='post' name='form' id='form'>\n";
if (!empty($container->id)) {
	$button .= "<input type='hidden' name='module' value='ZuckerReports'>\n";
	$button .= "<input type='hidden' name='action' value='PopupReportContainer'>\n";
	$button .= "<input type='hidden' name='record' value='".($container->parent_id)."'>\n";	
	$button .= "<input type='hidden' name='form' value='".($_REQUEST['form'])."'>\n";	
	$button .= "<input class='button' type='submit' value=' ".$mod_strings['LBL_CONTAINER_UP']."  '>\n";
}
$button .= "<input class='button' LANGUAGE=javascript onclick=\"window.opener.document.".$_REQUEST['form'].".parent_name.value = '';window.opener.document.".$_REQUEST['form'].".parent_id.value = ''; window.close()\" type='submit' name='button' value='  ".$app_strings['LBL_CLEAR_BUTTON_LABEL']."  '>\n";
$button .= "<input class='button' LANGUAGE=javascript onclick=\"window.close()\" type='submit' name='button' value='  ".$app_strings['LBL_CANCEL_BUTTON_LABEL']."  '>\n";
$button .= "</form>\n";

$form->assign("SET_RETURN_JS", $the_javascript);
$form->assign("THEME", $theme);
$form->assign("IMAGE_PATH", $image_path);
$form->assign("MODULE_NAME", $currentModule);
$form->assign("FORM", $_REQUEST['form']);

insert_popup_header($theme);

$child_containers = $container->get_linked_beans("containers", "ReportContainer");


echo "\n<p>\n";
echo get_module_title("ZuckerReports", $mod_strings['LBL_CONTAINER'].": ".$container->name, false);
echo "\n</p>\n";

$lv = new ListView();
$lv->setXTemplate($form);
$lv->setHeaderTitle($mod_strings['LBL_SUBCONTAINERS']);
$lv->setHeaderText($button);
$lv->setModStrings($mod_strings);
$lv->processListViewTwo($child_containers, "main", "CONTAINER");

if (function_exists("get_form_footer"))
	echo get_form_footer();
insert_popup_footer();
?>