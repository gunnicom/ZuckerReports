<?php

require_once('include/logging.php');
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

$template = new QueryTemplate();
if (!empty($_REQUEST['record'])) {
	$template->retrieve($_REQUEST['record']);
}
$template = populateFromPost("", $template);
$template->sql1 = $_REQUEST['sql'];
$_REQUEST['return_id'] = $template->save();
$_REQUEST['return_action'] = "DetailView";
$_REQUEST['return_module'] = "ZuckerQueryTemplate";
handleRedirect($return_id, "ZuckerQueryTemplate");

?>
