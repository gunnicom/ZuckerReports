<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerQueryTemplate/QueryTemplate.php');

if (!empty($_REQUEST['record'])) {
	$template = new QueryTemplate();
	$template->retrieve($_REQUEST['record']);

	if(!$template->ACLAccess('Delete')){
		ACLController::displayNoAccess(true);
		sugar_cleanup(true);
	}
	$template->mark_deleted($_REQUEST['record']);
}
header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);

?>
