<?php
require_once('XTemplate/xtpl.php');
require_once('data/Tracker.php');
require_once('modules/ZuckerReports/config.php');
require_once('modules/ZuckerReports/Report.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');
require_once('include/ListView/ListView.php');
require_once('modules/Notes/Note.php');
require_once('include/upload_file.php');
require_once('include/JSON.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;

$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");

$focus = NULL;

if (isset($_REQUEST['record'])) {
	foreach ($zuckerreports_config["providers"] as $provider) {
		if (!empty($provider["include"])) require_once($provider["include"]);
		
		$seed = new $provider["class_name"];
		if (empty($seed)) continue;
		$focus = $seed->retrieve($_REQUEST['record']);
		if ($focus) break;
	}
}

if (isset($focus)) {
    $title = $mod_strings['LNK_REPORT_ONDEMAND'].": ".$focus->name;
} else {
    $title = $mod_strings['LNK_REPORT_ONDEMAND'];
}




echo "\n<p>\n";
echo get_module_title("ZuckerReports", $title, false); 
echo "\n</p>\n";

global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');

$xtpl=new XTemplate ('modules/ZuckerReports/ReportOnDemand.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);


$templates = array();
foreach ($zuckerreports_config["providers"] as $provider) {
	if (!empty($provider["include"])) require_once($provider["include"]);
	
	$seed = new $provider["class_name"];
	if (empty($seed)) continue;
	$templates1 = $seed->get_full_list("name");
	if (is_array($templates1)) $templates = array_merge($templates, $templates1);
}

if (count($templates) > 0) {

	$template_select = array("" => "");
	foreach ($templates as $template) {
		$template_select[$template->id] = $template->get_summary_text();
	}
		
	$xtpl->assign("REPORT_SELECTION_HEADER", get_form_header ($mod_strings["LBL_ONDEMAND_REPORT_SELECTION"], "", false));
	$xtpl->assign("TEMPLATE_SELECTION", get_select_options_with_id($template_select, $focus->id));


	
	
	if (!empty($focus->id)) {	

		if ($focus->can_attach_to_parent()) {
			$types = parse_list_modules($app_list_strings['record_type_display']);
			$types = array_merge(array("" => ""), $types);
		
			$xtpl->assign("TYPE_OPTIONS", get_select_options_with_id($types, $_REQUEST['parent_module']));
		
			//$change_parent_button = "<input title='".$app_strings['LBL_CHANGE_BUTTON_TITLE']."' type='button' class='button' value='".$app_strings['LBL_CHANGE_BUTTON_LABEL']."' name='parent_button' onclick='return window.open(\"index.php?module=\"+ document.EditView.parent_module.value + \"&action=Popup&html=Popup_picker&form=TasksEditView\",\"test\",\"width=600,height=400,resizable=1,scrollbars=1\");'>";
			//$xtpl->assign("CHANGE_PARENT_BUTTON", $change_parent_button);
			$popup_request_data = array(
				'call_back_function' => 'set_return',
				'form_name' => 'EditView',
				'field_to_name_array' => array(
					'id' => 'parent_id',
					'name' => 'parent_name',
				),
			);
			$json = new JSON(JSON_LOOSE_TYPE);
			$encoded_popup_request_data = $json->encode($popup_request_data);
			$xtpl->assign('encoded_popup_request_data', $encoded_popup_request_data);
			$xtpl->assign("PARENT_ID", $_REQUEST['parent_id']);
			$xtpl->assign("PARENT_NAME", $_REQUEST['parent_name']);	
			$xtpl->parse("report_selection.attach_to_parent");
		}
		if ($focus->can_attach_to_container()) {
			$xtpl->assign("CAT_OPTIONS", get_select_options_with_id(ReportContainer::get_category_select_options(), $_REQUEST['parent_category']));
			$xtpl->parse("report_selection.attach_to_container");
		}
	}	
		
	$xtpl->parse("report_selection");
	$report_selection = $xtpl->text("report_selection");
	
	if (!empty($focus->id)) {
	
		$xtpl->assign("FORMAT_SELECTION_HEADER", get_form_header ($mod_strings["LBL_ONDEMAND_FORMAT_SELECTION"], "", false));
	
/*		$focus->handle_format_selection(&$xtpl);
		
		$focus->handle_format_parameters(&$xtpl);
*/
		$focus->handle_format_selection($xtpl);
		
		$focus->handle_format_parameters($xtpl);

		$xtpl->parse("format_selection");			
		$format_selection = $xtpl->text("format_selection");
	}

	if (!empty($focus->id)) {

		$links = $focus->get_parameter_links();
		if (count($links) > 0) {
			foreach ($links as $link) {
				$link->fill_in_additional_detail_fields();
				$selected_val = $link->default_value;
				if (!empty($_REQUEST[$link->name])) {
					$selected_val = $_REQUEST[$link->name];
				}
	
				$xtpl1=new XTemplate ('modules/ZuckerReports/ParameterFill.html');
				$xtpl1->assign("MOD", $mod_strings);
				$xtpl1->assign("APP", $app_strings);
				$xtpl1->assign("THEME", $theme);
				$xtpl1->assign("IMAGE_PATH", $image_path);
				if ($link->parameter->range == 'SQL') {
					$param_table = $link->parameter->get_sql_table();
					if (is_array($param_table)) {
						$xtpl1->assign("PARAM_FRIENDLY_NAME", $link->friendly_name);
						$xtpl1->assign("PARAM_NAME", $link->name);
						$xtpl1->assign("PARAM_SELECTION", get_select_options_with_id($param_table, $selected_val));
						$xtpl1->parse("SQL");
						$parameter_html .= $xtpl1->text("SQL");
	
					} else {
						$parameter_html .= $param_table."<br/>";
					}
	
				} else if ($link->parameter->range == 'LIST') {
	
					$list = $link->parameter->get_list_table();
					$xtpl1->assign("PARAM_FRIENDLY_NAME", $link->friendly_name);
					$xtpl1->assign("PARAM_NAME", $link->name);
					$xtpl1->assign("PARAM_SELECTION", get_select_options_with_id($list, $selected_val));
					$xtpl1->parse("LIST");
					$parameter_html .= $xtpl1->text("LIST");
	
				} else if ($link->parameter->range == 'SIMPLE') {
					$xtpl1->assign("PARAM_FRIENDLY_NAME", $link->friendly_name);
					$xtpl1->assign("PARAM_NAME", $link->name);
					$xtpl1->assign("PARAM_VALUE", $selected_val);
					$xtpl1->parse("SIMPLE");
					$parameter_html .= $xtpl1->text("SIMPLE");
			
				}
			}
			$xtpl->assign("PARAMETER_HEADER", get_form_header ($mod_strings["LBL_ONDEMAND_PARAMETERS"], "", false));
			$xtpl->assign("PARAMETERS", $parameter_html);
			
			$xtpl->parse("parameters");			
			$parameters = $xtpl->text("parameters");

		}
	}

	if (!empty($focus->id)) {
		$xtpl->parse("execbutton");			
		$execbutton = $xtpl->text("execbutton");
	}
	
	if (!empty($report_selection)) $xtpl->assign("REPORT_SELECTION", $report_selection);
	if (!empty($format_selection)) $xtpl->assign("FORMAT_SELECTION", $format_selection);
	if (!empty($parameters)) $xtpl->assign("PARAMETERS", $parameters);
	if (!empty($execbutton)) $xtpl->assign("EXEC_BUTTON", $execbutton);
	
	$xtpl->parse("main");
	$xtpl->out("main");
}

if (!empty($focus->id) && $_REQUEST['run'] == "true") {

	$parameter_values = array();

	$links = $focus->get_parameter_links();
	foreach ($links as $link) {
		$parameter_values[$link->name] = $_REQUEST[$link->name];
	}
	$success = $focus->execute_request($parameter_values);
		
	if ($success) {
		if (!empty($_REQUEST['parent_category'])) {
			$report = new ZuckerReport();
			$report->container_id = $_REQUEST['parent_category'];
			$report->description = $focus->report_output;
			$report->filename = $focus->outfile;
			$report->published = 0;
			$report->save();
			
			$uf = new UploadFile("upload");
			$uf->set_for_soap($focus->outfile, file_get_contents($focus->report_outfile));
			$uf->stored_file_name = $uf->create_stored_filename();
			$uf->final_move($report->id);
			$cat_url = "index.php?action=ReportDetailView&module=ZuckerReports&record=".($report->id);
		} 
		if (!empty($_REQUEST['parent_module'])) {
		
			$note = new Note();
			$note->name = $focus->name;
			$note->description = $focus->report_output;
			$note->filename = $focus->outfile;
			if ($_REQUEST['parent_module'] == 'Contacts') {
				$note->contact_id = $_REQUEST['parent_id'];
			} else {
				$note->parent_type = $_REQUEST['parent_module'];
				$note->parent_id = $_REQUEST['parent_id'];
			}
			$note->save();
		
			$uf = new UploadFile("upload");
			$uf->set_for_soap($focus->outfile, file_get_contents($focus->report_outfile));
			$uf->stored_file_name = $uf->create_stored_filename();
			$uf->final_move($note->id);
				
			$note_url = "index.php?action=DetailView&module=Notes&record=".($note->id)."&return_module=ZuckerReports&return_action=ReportOnDemand";
		}

		if (!empty($note_url)) {
			header("Location: ".$note_url);
		} else if (!empty($cat_url)) {
			header("Location: ".$cat_url);
		} else {
			header("Location: ".($focus->report_outfile));
		}
		sugar_die();
	} else {
		echo "\n<p>\n";
		echo  	get_form_header ($mod_strings['LBL_ONDEMAND_OUTPUT'], "", false);
		echo "\n</p>\n";
		echo $mod_strings['LBL_ONDEMAND_ERROR'];
		$xtpl->assign("REPORT_OUTPUT", $focus->report_output);
		$xtpl->parse("runerror");
		$xtpl->out("runerror");
	}
}
		




?>
