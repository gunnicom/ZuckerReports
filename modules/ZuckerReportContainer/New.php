<?php

require_once('include/logging.php');
require_once('include/formbase.php');
require_once('modules/ZuckerReportContainer/ReportContainer.php');

$container = new ReportContainer();
$container = populateFromPost("", $container);
$container->parent_id = (!empty($_REQUEST["parent_id"]) ? $_REQUEST["parent_id"] : "");

$_REQUEST['return_id'] = $container->save();
$_REQUEST['return_action'] = "DetailView";
handleRedirect(null, "ZuckerReportContainer");

?>
