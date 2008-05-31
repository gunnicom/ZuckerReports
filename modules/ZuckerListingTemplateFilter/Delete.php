<?php
require_once('include/formbase.php');
require_once('modules/ZuckerListingTemplateFilter/ListingTemplateFilter.php');

if (!is_admin($current_user)) {
	sugar_die("only admin allowed");
}

if (!empty($_REQUEST['record'])) {
	$filter = new ListingTemplateFilter();
	$filter->retrieve($_REQUEST['record']);
	
	if ($filter->value_type == "parameter") {
		$rpl = new ReportParameterLink();
		$rpl->mark_deleted($filter->value);
	}
	$filter->mark_deleted($_REQUEST['record']);
}

handleRedirect("", "");
?>