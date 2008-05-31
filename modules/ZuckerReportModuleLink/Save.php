<?php

require_once('include/formbase.php');
require_once('modules/ZuckerReportModuleLink/ReportModuleLink.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

$link = new ReportModuleLink();
if (!empty($_REQUEST['record'])) {
	$link->retrieve($_REQUEST['record']);
}
$link = populateFromPost("module_", $link);
$link->save();

handleRedirect();
?>