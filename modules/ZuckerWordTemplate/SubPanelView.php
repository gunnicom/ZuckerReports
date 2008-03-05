<?php
require_once('XTemplate/xtpl.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');
require_once('modules/ZuckerWordTemplate/WordTemplate.php');
require_once('include/ListView/ListView.php');

global $app_strings;
global $app_list_strings;
global $current_user;
global $current_language;

$mod_strings = return_module_language($current_language, "ZuckerWordTemplate");

$seed = new WordTemplate();
$wordlist = $seed->get_by_query($focus->id);
if (!is_array($wordlist)) {
	$wordlist = array();
}
echo "\n<p>\n";

$button = "";
if (is_admin($current_user)) {
	$button .= "<form action='index.php' method='post'>\n";
	$button .= "<input type='hidden' name='module' value='ZuckerWordTemplate'>\n";
	$button .= "<input type='hidden' name='action' value='EditView'>\n";
	$button .= "<input type='hidden' name='return_module' value='".($focus->module_dir)."'>\n";
	$button .= "<input type='hidden' name='return_action' value='DetailView'>\n";
	$button .= "<input type='hidden' name='return_id' value='".($focus->id)."'>\n";
	$button .= "<input type='hidden' name='querytemplate_id' value='".($focus->id)."'>\n";
	$button .= "<input class='button' type='submit' value=' ".$mod_strings['LBL_WORD_CREATE_WORD_TEMPLATE']."  '>\n";
	$button .= "</form>\n";
}

$lv = new ListView();
$lv->initNewXTemplate("modules/ZuckerWordTemplate/SubPanelView.html", $mod_strings);
$lv->setHeaderTitle($mod_strings['LBL_WORD_WORD_TEMPLATES']);
$lv->setHeaderText($button);
$lv->show_export_button = false;
$lv->processListView($wordlist, "wordtemplates", "WORD");


?>