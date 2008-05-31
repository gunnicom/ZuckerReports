<?php

require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReportModuleLink/ReportModuleLink.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

if (!empty($_REQUEST['record'])) {
	$link = new ReportModuleLink();
	$link->mark_deleted($_REQUEST['record']);
}

handleRedirect("", "");
?>