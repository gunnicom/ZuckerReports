<?php

require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReportParameter/ReportParameter.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

if (!empty($_REQUEST['record'])) {
	$template = new ReportParameter();
	$template->mark_deleted($_REQUEST['record']);
}
header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);
?>