<?php

require_once('include/formbase.php');
require_once('modules/ZuckerWordTemplate/WordTemplate.php');

if (isset($_REQUEST['record'])) {
	$template = new WordTemplate();
	$template->retrieve($_REQUEST['record']);

	if(!$template->ACLAccess('Delete')){
		ACLController::displayNoAccess(true);
		sugar_cleanup(true);
	}
	$template->unlink_all_files();
	$template->mark_deleted($_REQUEST['record']);
}
header("Location: index.php?module=".$_REQUEST['return_module']."&action=".$_REQUEST['return_action']."&record=".$_REQUEST['return_id']);

?>
