<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');

$template = new QueryTemplate();
if (!empty($_REQUEST['record'])) {
	$template->retrieve($_REQUEST['record']);
	$template = $template->retrieve($_REQUEST['record']);
	if ($template == null) { echo "no access"; exit; }
}
$template = populateFromPost("", $template);
if(!$template->ACLAccess('Save')){
	ACLController::displayNoAccess(true);
	sugar_cleanup(true);
}

$template->sql1 = $_REQUEST['sql'];
$_REQUEST['return_id'] = $template->save();
$_REQUEST['return_action'] = "DetailView";
$_REQUEST['return_module'] = "ZuckerQueryTemplate";
handleRedirect($return_id, "ZuckerQueryTemplate");

?>
