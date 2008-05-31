<?php
require_once('include/formbase.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');

$container = new ReportContainer();
if (!empty($_REQUEST['record'])) {
	$container->retrieve($_REQUEST['record']);
}
$container = populateFromPost("", $container);
$container->parent_id = (!empty($_REQUEST["parent_id"]) ? $_REQUEST["parent_id"] : "");
$_REQUEST['return_id'] = $container->save();
$_REQUEST['return_action'] = "DetailView";
handleRedirect($return_id, "ZuckerReportContainer");

?>
