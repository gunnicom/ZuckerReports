<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');
require_once('include/ListView/ListView.php');
require_once('modules/ZuckerListingTemplate/Forms.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$current_module_strings = return_module_language($current_language, "ZuckerListingTemplate");
$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerListingTemplate");

$focus =& new ListingTemplate();

if(isset($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
}

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

echo "\n<p>\n";
echo get_module_title("ZuckerListingTemplate", $current_module_strings['LBL_MODULE_NAME'].": ".$focus->name, false); 
echo "\n</p>\n";



$xtpl=new XTemplate ('modules/ZuckerListingTemplate/DetailView.html');
$xtpl->assign("MOD", $current_module_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("ID", $focus->id);
$xtpl->assign("NAME",$focus->name);
$xtpl->assign("MAINMODULE", $app_list_strings["moduleList"][$focus->mainmodule]);
$xtpl->assign("FILTERTYPE", $mod_list_strings["LISTING_FILTER_TYPES"][$focus->filtertype]);
$xtpl->assign("DESCRIPTION",$focus->description);
$xtpl->assign("CUSTOMWHERE1",$focus->customwhere1);
$xtpl->assign("CUSTOMWHERE2",$focus->customwhere2);
$xtpl->assign('assigned_user_name', $focus->assigned_user_name);
$xtpl->assign('TEAM', $focus->team_name);

if ($focus->ACLAccess('edit')) $xtpl->parse("main.edit");
if ($focus->ACLAccess('delete')) $xtpl->parse("main.delete");

$xtpl->parse("main");
$xtpl->out("main");

if (file_exists("modules/ZuckerWordTemplate/SubPanelView.php")) include("modules/ZuckerWordTemplate/SubPanelView.php");

echo "\n<p>\n";
$lv = new ListView();
$lv->setXTemplate($xtpl);
$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
$lv->setHeaderTitle($current_module_strings['LBL_LISTING_FILTER_LIST']);
$lv->show_export_button = false;
$lv->processListView($focus->get_filters(), "filters", "FILTER");
echo "\n</p>\n";

echo "\n<p>\n";
$lv = new ListView();
$lv->setXTemplate($xtpl);
$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
$lv->setHeaderTitle($current_module_strings['LBL_LISTING_ORDER_LIST']);
$lv->show_export_button = false;
$lv->processListView($focus->get_orders(), "orders", "ORDER");
echo "\n</p>\n";

if (is_admin($current_user)) {
	

	$field_select = $focus->get_full_fields_list();
	asort($field_select);

	$rp = new ReportParameter();
	$rps = $rp->get_full_list();
	$param_select = array("" => "");
	if (!empty($rps)) {
		foreach ($rps as $rp) {
			$param_select[$rp->id] = $rp->get_summary_text();
		}
	}
	$options_select = $focus->get_field_options_list($_REQUEST["filter_field_name"]);
	
	echo "\n<p/>\n";
	echo  get_form_header ($current_module_strings['LBL_LISTING_FILTER_NEW'], "", false);
	
	$xtpl->assign("TEMPLATE_ID", $focus->id);
	$xtpl->assign("TEMPLATE_MODULE", $focus->mainmodule);
	$xtpl->assign("FILTER_FIELD_SELECTION", get_select_options_with_id($field_select, $_REQUEST["filter_field_name"]));
	$filter_comparator = $focus->get_full_comparator_list($_REQUEST["filter_field_name"]);
	asort($filter_comparator);
	$xtpl->assign("FILTER_COMPARATOR_SELECTION", get_select_options_with_id($filter_comparator, $_REQUEST["filter_comparator"]));
	
	asort($param_select);
	$xtpl->assign("FILTER_PARAM_SELECTION", get_select_options_with_id($param_select, $_REQUEST["filter_value_param"]));
	$xtpl->assign("FILTER_VALUE_INPUT", $_REQUEST["filter_value_input"]);
	
	$xtpl->assign("JAVASCRIPT", get_validate_js());

	$xtpl->parse("filter_add.filter_add_param");
	if (!empty($options_select)) {
		asort($options_select);
		$xtpl->assign("FILTER_ENUM_SELECTION", get_select_options_with_id($options_select, $_REQUEST["filter_value_enum"]));
		$xtpl->parse("filter_add.filter_add_enum");
	}
	$xtpl->parse("filter_add.filter_add_input");
	
	$xtpl->parse("filter_add");
	$xtpl->out("filter_add");

	echo "\n<p/>\n";
	echo  get_form_header ($current_module_strings['LBL_LISTING_ORDER_NEW'], "", false);

	$xtpl->assign("TEMPLATE_ID", $focus->id);
	$xtpl->assign("TEMPLATE_MODULE", $focus->mainmodule);
	$xtpl->assign("ORDER_FIELD_SELECTION", get_select_options_with_id($field_select, $_REQUEST["order_field_name"]));
	asort($mod_list_strings["LISTING_ORDER_TYPES"]);
	$xtpl->assign("ORDER_TYPE_SELECTION", get_select_options_with_id($mod_list_strings["LISTING_ORDER_TYPES"], $_REQUEST["order_order_type"]));
	$xtpl->assign("JAVASCRIPT", get_validate_js());
		
	$xtpl->parse("order_add");
	$xtpl->out("order_add");
	

}

$skip_parameter_links = true;
include("modules/ZuckerReportParameter/ParameterView.php");

?>
