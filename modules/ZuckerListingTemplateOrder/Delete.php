<?php

require_once('include/formbase.php');
require_once('modules/ZuckerListingTemplateOrder/ListingTemplateOrder.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

if (!empty($_REQUEST['record'])) {
	$order = new ListingTemplateOrder();
	$order->mark_deleted($_REQUEST['record']);
}

handleRedirect("", "");
?>