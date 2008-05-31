<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

$link = new ReportParameterLink();
if (!empty($_REQUEST['record'])) {
	$link->retrieve($_REQUEST['record']);
}
$link = populateFromPost("link_", $link);
$return_id = $link->save();

handleRedirect();
?>