<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');

if (!empty($_REQUEST['record'])) {
	$focus = new RunnableReport();
	$focus->mark_deleted($_REQUEST['record']);
}
header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);

?>
