<?php

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

if ($_REQUEST["range_name"] == "SCRIPT") {
	require_once("modules/ZuckerReports/config.php");
	if ($zuckerreports_config["param_script_enabled"] != "yes") {
		sugar_die($mod_strings["LBL_PARAM_RANGE_SCRIPT_DISABLED"]);
	}
}

$param = populateFromPost("", $param);
$return_id = $param->save();

header("Location: index.php?action=ListView&module=ZuckerReportParameter");
exit;
?>