<?php

require_once('include/logging.php');
require_once('include/formbase.php');
require_once('modules/ZuckerListingTemplate/ListingTemplate.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

$template = new ListingTemplate();
if (!empty($_REQUEST['record'])) {
	$template->retrieve($_REQUEST['record']);
}

$orig_mainmodule = $template->mainmodule;
$template = populateFromPost("", $template);

if (!empty($orig_mainmodule) && $template->mainmodule != $orig_mainmodule) {
	ListingTemplate::mark_relationships_deleted($template->id);
}

$_REQUEST['return_id'] = $template->save();
$_REQUEST['return_action'] = "DetailView";
$_REQUEST['return_module'] = "ZuckerListingTemplate";
handleRedirect($return_id, "ZuckerListingTemplate");
?>
