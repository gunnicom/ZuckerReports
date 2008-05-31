<?php

require_once('include/formbase.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

$template = new ListingTemplate();
if (!empty($_REQUEST['record'])) {
	$template = $template->retrieve($_REQUEST['record']);
	if ($template == null) { echo "no access"; exit; }
}

$orig_mainmodule = $template->mainmodule;
$template = populateFromPost("", $template);
if(!$template->ACLAccess('Save')){
	ACLController::displayNoAccess(true);
	sugar_cleanup(true);
}

if (!empty($orig_mainmodule) && $template->mainmodule != $orig_mainmodule) {
	$template->mark_relationships_deleted($template->id);
}

$_REQUEST['return_id'] = $template->save();
$_REQUEST['return_action'] = "DetailView";
$_REQUEST['return_module'] = "ZuckerListingTemplate";
handleRedirect($return_id, "ZuckerListingTemplate");
?>
