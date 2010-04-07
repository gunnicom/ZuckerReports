<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReports/ZuckerReport.php');

if (isset($_REQUEST['record'])) {
	$focus = new ZuckerReport();
	$focus->retrieve($_REQUEST['record']);
	UploadFile::unlink_file($focus->id,$focus->filename);
	$focus->mark_deleted($_REQUEST['record']);
}
header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);

?>
