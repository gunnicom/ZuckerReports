<?php

$mod_strings = array_merge(return_module_language("fr_FR", "ZuckerReports"),
	array(
		'LBL_LISTING_TEMPLATE_NEW' => 'New Listing Template',
		'LBL_LISTING' => 'Listing',
		'LBL_LISTING_NAME' => 'Listing Name',
		'LBL_LISTING_MAINMODULE' => 'Listing Module',
		'LBL_LISTING_FILTERTYPE' => 'Filter Type',
		'LBL_LISTING_DESCRIPTION' => 'Description',
		'LBL_LISTING_CUSTOMWHERE1' => 'Custom "where"-Clause (Prefix)',
		'LBL_LISTING_CUSTOMWHERE2' => 'Custom "where"-Clause (Suffix)',

		'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
		
		'LBL_LISTING_FILTER_LIST' => 'Filters',
		'LBL_LISTING_FILTER_MODULE' => 'Module',
		'LBL_LISTING_FILTER_FIELD' => 'Field',
		'LBL_LISTING_FILTER_COMPARATOR' => 'Comparator',
		'LBL_LISTING_FILTER_VALUETYPE' => 'Type',

		
		'LBL_LISTING_FILTER_VALUE' => 'Select Filter Value',
		'LBL_LISTING_FILTER_FROM_PARAM' => 'from Parameter',
		'LBL_LISTING_FILTER_FROM_ENUM' => 'or select',
		'LBL_LISTING_FILTER_FROM_INPUT' => 'or enter',
		
		'LBL_LISTING_FILTER_DESC' => 'Filter',
		'LBL_LISTING_FILTER_NEW' => 'New Filter',
		'LBL_LISTING_FILTER_ADD' => 'Add Filter',
		'LBL_LISTING_FILTER_DELETE' => 'Delete Filter',
		
		'LBL_LISTING_ORDER_LIST' => 'Order Criterias',
		'LBL_LISTING_ORDER_MODULE' => 'Module',
		'LBL_LISTING_ORDER_FIELD' => 'Field',
		'LBL_LISTING_ORDER_ORDERTYPE' => 'Order Type',
		'LBL_LISTING_ORDER_DESC' => 'Filter',
		'LBL_LISTING_ORDER_NEW' => 'New Order Criteria',
		'LBL_LISTING_ORDER_ADD' => 'Add Order Criteria',
		'LBL_LISTING_ORDER_DELETE' => 'Delete Order Criteria',
		
		'LBL_LISTING_ONDEMAND_TEMPLATE' => 'Template',
		'LBL_LISTING_ONDEMAND_TEMPLATE_LV' => 'Default ListView from ',
		'LBL_LISTING_ONDEMAND_PROSPECTLISTNAME' => 'Prospectlist Name',	
		'LBL_LISTING_ONDEMAND_COLUMN_DELIMITER' => 'Column Delimiter',
		'LBL_LISTING_ONDEMAND_ROW_DELIMITER' => 'Row Delimiter',
		'LBL_LISTING_ONDEMAND_INCLUDE_HEADER' => 'Include Header',
		
		'LBL_LISTING_WARNING_CHANGE_MAINMODULE' => 'Attention: changing the listing module will delete all filters, as filters are module specific!',
		
		'ERR_LISTING_NO_TEMPLATE' => 'No output template defined for this listing. Please add one to modules/ZuckerListingTemplate/lists/config.php',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("fr_FR", "ZuckerReports"),
	array (
		'LISTING_FILTER_TYPES' =>
		  array (
			'AND' => 'List items matching ALL of the filters',
			'OR' => 'List items matching ONE of the filters',
		  ),
		'LISTING_EXPORT_TYPES' =>
		  array (
			'TABLE' => 'Inline Table',
			'CSV' => 'Comma Separated Values (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
		  ),
		'LISTING_EXPORT_TYPES_TARGET_LISTS' =>
		  array (
			'TABLE' => 'Inline Table',
			'CSV' => 'Comma Separated Values (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
			'PROSPECTLIST' => 'Prospectlist',
		  ),
		  
		'LISTING_FILTER_COMPARATORS_TEXT' =>  
		  array(
			"=" => "equals",
			"!=" => "not equals",
			">" => "greater",
			">=" => "greater or equal",
			"<" => "less",
			"<=" => "less or equal",
			"like" => "like ('%'-globbing)",
		  ),
		'LISTING_FILTER_COMPARATORS_NUMERIC' =>  
		  array(
			"=" => "equals",
			"!=" => "not equals",
			">" => "greater",
			">=" => "greater or equal",
			"<" => "less",
			"<=" => "less or equal",
		  ),
		'LISTING_FILTER_COMPARATORS_DATE' =>  
		  array(
			">" => "greater",
			">=" => "greater or equal",
			"<" => "less",
			"<=" => "less or equal",
		  ),


	  'LISTING_ORDER_TYPES' =>  
		  array(
			"asc" => "ascending",
			"desc" => "descending",
		  ),
	)
);





		
?>

