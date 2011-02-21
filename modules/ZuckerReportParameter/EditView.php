<?php
require_once('XTemplate/xtpl.php');
require_once('include/formbase.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');
require_once('modules/ZuckerReportParameter/Forms.php');

global $app_strings;
global $app_list_strings;
global $mod_strings;
global $current_user;
global $current_language;

echo get_set_focus_js();

$mod_list_strings = return_mod_list_strings_language($current_language, "ZuckerReports");


$focus = new ReportParameter();

if(isset($_REQUEST['record']) && !empty($_REQUEST['record'])) {
    $focus->retrieve($_REQUEST['record']);
	$friendly_name = $focus->friendly_name;
	$default_name = $focus->default_name;
	$default_value = $focus->default_value;
	$description = $focus->description;
	$range_name = $focus->range_name;
	$range_options = $focus->range_options;

	$title = $mod_strings['LBL_MODULE_NAME'].": ".$focus->default_name;
} else {
	$title = $mod_strings['LBL_PARAM_NEW'];
}

if (!empty($_REQUEST['friendly_name'])) {
	$friendly_name = $_REQUEST['friendly_name'];
}
if (!empty($_REQUEST['default_name'])) {
	$default_name = $_REQUEST['default_name'];
}
if (!empty($_REQUEST['default_value'])) {
	$default_value = $_REQUEST['default_value'];
}
if (!empty($_REQUEST['description'])) {
	$description = $_REQUEST['description'];
}
if (!empty($_REQUEST['range_name'])) {
	$range_name = $_REQUEST['range_name'];
}
if (!empty($_REQUEST['range_options'])) {
	$range_options = $_REQUEST['range_options'];
}


global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";
require_once($theme_path.'layout_utils.php');


echo "\n<p>\n";
echo get_module_title("ZuckerReportParameter", $title, false); 
echo "\n</p>\n";



$xtpl=new XTemplate ('modules/ZuckerReportParameter/EditView.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);
$xtpl->assign("JAVASCRIPT", get_validate_js());
$xtpl->assign("ID", $focus->id);
$xtpl->assign("FRIENDLY_NAME", $friendly_name);
$xtpl->assign("DEFAULT_NAME", $default_name);
$xtpl->assign("DEFAULT_VALUE", $default_value);
$xtpl->assign("DESCRIPTION", $description);

asort($mod_list_strings["PARAM_RANGE_TYPES"]);
$xtpl->assign("RANGE_SELECTION", get_select_options_with_id($mod_list_strings["PARAM_RANGE_TYPES"], $range_name));

if ($range_name == 'SQL') {
	$xtpl->assign("RANGE_OPTIONS", $range_options);
	if ($_REQUEST['sqltest'] == 'true') {
		if (is_admin($GLOBALS['current_user'])) {
			$table = $focus->get_sql_table(html_entity_decode($range_options), 20);		
			if (is_array($table)) {			
				$text = "<table><tr><th>KEY</th><th>VALUE</th></tr>";			
				foreach ($table as $key => $value) {				
					$text .= "<tr><td>".$key."</td><td>".$value."</td></tr>";			
				}			
				$text .= "</table>";		
			} else {			
				$text = $table;		
			}
		} else {
			$text = "only admin allowed";
		}
		$xtpl->assign('SQL_RESULT', $text);	
	}
	$xtpl->parse('main.SQL');
}
if ($range_name == 'LIST') {
	$xtpl->assign("RANGE_OPTIONS", $range_options);
	
	$xtpl->parse('main.LIST');
}

if ($range_name == 'DROPDOWN') {
	$options = array();
	foreach (array_keys($app_list_strings) as $app_list_key) {
		$options[$app_list_key] = $app_list_key;
	}
	asort($options);
	$xtpl->assign("DROPDOWN_OPTIONS", get_select_options_with_id($options, $range_options));
	
	$xtpl->parse('main.DROPDOWN');
}


if ($range_name == 'SCRIPT') {
	require_once("modules/ZuckerReports/config.php");
	
	if ($zuckerreports_config["param_script_enabled"] == "yes") {
		$xtpl->assign("RANGE_OPTIONS", $range_options);
		$xtpl->parse('main.SCRIPT');
	} else {
		$xtpl->parse('main.SCRIPTDISABLED');
	}
}

if (is_admin($current_user)) {
	$xtpl->parse("main.save");
	if (!empty($focus->id)) {
		$xtpl->parse("main.delete");
	}
}

$xtpl->parse("main");
$xtpl->out("main");
?>
