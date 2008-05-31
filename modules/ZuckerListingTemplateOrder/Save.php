<?php

require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerListingTemplateOrder/ListingTemplateOrder.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

$order = new ListingTemplateOrder();
if (!empty($_REQUEST['record'])) {
	$order->retrieve($_REQUEST['record']);
}
$order = populateFromPost("order_", $order);

$return_id = $order->save();
handleRedirect($return_id, "ZuckerListingTemplate");
?>