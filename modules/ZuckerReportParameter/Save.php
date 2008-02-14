<?php

require_once('include/logging.php');
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}
$param = new ReportParameter();
if (!empty($_REQUEST['record'])) {
	$param->retrieve($_REQUEST['record']);
}
$param = populateFromPost("", $param);
$return_id = $param->save();

header("Location: index.php?action=ListView&module=ZuckerReportParameter");
exit;
?>