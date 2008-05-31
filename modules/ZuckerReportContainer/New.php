<?php
require_once('include/formbase.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');


$container = new ReportContainer();
$container = populateFromPost("", $container);
$container->assigned_user_id = $current_user->id;
if (!empty($_REQUEST["parent_id"])) {
	$parent_container = new ReportContainer();
	$parent_container->retrieve($_REQUEST["parent_id"]);
	$container->parent_id = $parent_container->id;
	$container->team_id = $parent_container->team_id;
}

$_REQUEST['return_id'] = $container->save();
$_REQUEST['return_action'] = "DetailView";
handleRedirect(null, "ZuckerReportContainer");

?>
