<?php
require_once('include/formbase.php');
require_once('modules/ZuckerReportParameterLink/ReportParameterLink.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

if (!empty($_REQUEST['record'])) {
	$link = new ReportParameterLink();
	$link->mark_deleted($_REQUEST['record']);
}

handleRedirect("", "");
?>