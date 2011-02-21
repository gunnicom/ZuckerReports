<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('modules/ZuckerReportParameter/Forms.php');
require_once('include/ListView/ListView.php');


$xtpl=new XTemplate ('modules/ZuckerReportParameter/ParameterView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("MODULE_DIR", $focus->module_dir);

if (!$skip_parameter_links) {
	echo "\n<p>\n";
	$lv = new ListView();
	$lv->setXTemplate($xtpl);
	$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
	$lv->setHeaderTitle($mod_strings['LBL_PARAM_LINK_LIST']);
	$lv->show_export_button = false;
	$lv->processListView($focus->get_parameter_links(), "parameters", "LINK");
	echo "\n</p>\n";
}

if (!$skip_module_links) {
	echo "\n<p>\n";
	$lv = new ListView();
	$lv->setXTemplate($xtpl);
	$lv->xTemplateAssign("DELETE_INLINE_PNG",  get_image($image_path.'delete_inline','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
	$lv->xTemplateAssign("TEMPLATE_ID",  $focus->id);
	$lv->setHeaderTitle($mod_strings['LBL_TEMPLATE_MODULE_LIST']);
	$lv->show_export_button = false;
	$lv->processListView($focus->get_module_links(), "modules", "LINK");
	echo "\n</p>\n";
}

if (is_admin($current_user)) {
	$rp = new ReportParameter();

	if (!$skip_parameter_links) {
		$rps = $rp->get_full_list();
		if (!empty($rps)) {
		
			echo "\n<p/>\n";
			echo  get_form_header ($mod_strings['LBL_PARAM_LINK_NEW'], "", false);
		
			$param_select = array();
			foreach ($rps as $rp) {
				$param_select[$rp->id] = $rp->get_summary_text();
			}
			asort($param_select);
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
	}
	
	if (!$skip_module_links) {
		$links = $focus->get_parameter_links();
		if (count($links) > 0) {
		
			echo "\n<p/>\n";
			echo  get_form_header ($mod_strings['LBL_TEMPLATE_MODULE_NEW'], "", false);
		
			$param_select = array();
			foreach ($links as $link) {
				$param_select[$link->id] = $link->get_summary_text();
			}
			asort($param_select);
			asort($beanList);
			
			$xtpl->assign("TEMPLATE_ID", $focus->id);
			$xtpl->assign("LINK_PARAM_SELECTION", get_select_options_with_id($param_select, $_REQUEST['module_parameterlink_id']));
			$xtpl->assign("LINK_MODULE_SELECTION", get_select_options_with_id($beanList, $_REQUEST['module_module_name']));
			$xtpl->assign("JAVASCRIPT", get_validate_js());
			
			$xtpl->parse("module_link");
			$xtpl->out("module_link");
		}
	}
}
?>
