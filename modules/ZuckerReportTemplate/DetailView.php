<?php
require_once('XTemplate/xtpl.php');
require_once('data/Tracker.php');
require_once('modules/ZuckerReportTemplate/ReportTemplate.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('include/ListView/ListView.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$focus =& new ReportTemplate();

if(isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
}

echo "\n<p>\n";
echo get_module_title("ZuckerReports", $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, false); 
echo "\n</p>\n";

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$xtpl=new XTemplate ('modules/ZuckerReportTemplate/DetailView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME",$focus->name);
$xtpl->assign("FILENAME",$focus->filename);
$xtpl->assign("URL",$focus->template_url);
$xtpl->assign("DESCRIPTION",$focus->description);


$strings = $focus->get_export_array();
$xtpl->assign("EXPORT_TYPES", join("<br/>", $strings));

if (is_admin($current_user)) {
	$xtpl->parse("main.edit");
	$xtpl->parse("main.delete");
}
$xtpl->parse("main");
$xtpl->out("main");

echo "\n<p>\n";
$lv = new ListView();
$lv->setXTemplate($xtpl);
$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline.png','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
$lv->xTemplateAssign("TEMPLATE_ID",  $focus->id);
$lv->setHeaderTitle($mod_strings['LBL_PARAM_LINK_LIST']);
$lv->show_export_button = false;
$lv->processListView($focus->get_parameter_links(), "parameters", "LINK");
echo "\n</p>\n";

echo "\n<p>\n";
$lv = new ListView();
$lv->setXTemplate($xtpl);
$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline.png','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
$lv->xTemplateAssign("TEMPLATE_ID",  $focus->id);
$lv->setHeaderTitle($mod_strings['LBL_TEMPLATE_MODULE_LIST']);
$lv->show_export_button = false;
$lv->processListView($focus->get_module_links(), "modules", "LINK");
echo "\n</p>\n";

if (is_admin($current_user)) {
	$rp = new ReportParameter();
	$rps = $rp->get_full_list();
	if (count($rps) > 0) {
	
		echo "\n<p/>\n";
		echo  get_form_header ($mod_strings['LBL_PARAM_LINK_NEW'], "", false);
	
		$param_select = array();
		foreach ($rps as $rp) {
			$param_select[$rp->id] = $rp->get_summary_text();
		}
		if (empty($_REQUEST['link_parameter_id'])) {
			$rp = $rps[0];
		} else {
			$rp->retrieve($_REQUEST['link_parameter_id']);
		}
		
		$link_name = $rp->default_name;
		$link_default_value = $rp->default_value;
		
		$xtpl->assign("TEMPLATE_ID", $focus->id);
		$xtpl->assign("LINK_PARAM_SELECTION", get_select_options_with_id($param_select, $_REQUEST['link_parameter_id']));
		$xtpl->assign("LINK_NAME", $link_name);
		$xtpl->assign("LINK_DEFAULT_VALUE", $link_default_value);
		$xtpl->assign("JAVASCRIPT", get_validate_js());
		
		$xtpl->parse("parameter_link");
		$xtpl->out("parameter_link");
	}
	
	$links = $focus->get_parameter_links();
	if (count($links) > 0) {
	
		echo "\n<p/>\n";
		echo  get_form_header ($mod_strings['LBL_TEMPLATE_MODULE_NEW'], "", false);
	
		$param_select = array();
		foreach ($links as $link) {
			$param_select[$link->id] = $link->get_summary_text();
		}
		
		$xtpl->assign("TEMPLATE_ID", $focus->id);
		$xtpl->assign("LINK_PARAM_SELECTION", get_select_options_with_id($param_select, $_REQUEST['module_parameterlink_id']));
		$xtpl->assign("LINK_MODULE_SELECTION", get_select_options_with_id($beanList, $_REQUEST['module_module_name']));
		$xtpl->assign("JAVASCRIPT", get_validate_js());
		
		$xtpl->parse("module_link");
		$xtpl->out("module_link");
	}	
	
}
?>
