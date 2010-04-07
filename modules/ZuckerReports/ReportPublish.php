<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReports/ZuckerReport.php');

if (isset($_REQUEST['record'])) {
	$report = new ZuckerReport();
	$report->retrieve($_REQUEST['record']);
	$report->published = 1;
	$return_id = $report->save();
	handleRedirect($return_id, "ZuckerReports");
}
?>