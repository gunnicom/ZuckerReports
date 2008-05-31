<?php

require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerListingTemplateFilter/ListingTemplateFilter.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

$filter = new ListingTemplateFilter();
if (!empty($_REQUEST['record'])) {
	$filter->retrieve($_REQUEST['record']);
}

$filter = populateFromPost("filter_", $filter);

$lt = new ListingTemplate();
$lt->retrieve($filter->listing_template_id);

if (!empty($_REQUEST["filter_value_param"])) {

	$rp = new ReportParameter();
	$rp->retrieve($_REQUEST["filter_value_param"]);
	
	$rpl = new ReportParameterLink();
	$rpl->template_id = $lt->id;
	$rpl->parameter_id = $rp->id;
	$rpl->name = $rp->default_name;
	$rpl->default_value = $rp->default_value;
	$rpl->save();
	
	$filter->value = $rpl->id;
	$filter->value_type = "parameter";
	
} else if (!empty($_REQUEST["filter_value_enum"])) {
	$filter->value = $_REQUEST["filter_value_enum"];
	$filter->value_type = "text";
} else if (!empty($_REQUEST["filter_value_input"])) {
	$filter->value = $_REQUEST["filter_value_input"];
	$filter->value_type = "text";
}
$return_id = $filter->save();


handleRedirect($return_id, "ZuckerListingTemplate");
?>