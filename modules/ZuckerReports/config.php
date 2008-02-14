<?php

global $zuckerreports_config;

$zuckerreports_config = array(
	
	//Clicking on the "ZuckerReports" tab in Sugar will show this action
	//"index_include" => "modules/ZuckerReports/ReportOnDemand.php",
	//"index_include" => "modules/ZuckerReportContainer/DetailView.php",
	"index_include" => "modules/ZuckerReports/TemplateListView.php",
	
	//This is the list of supported report providers - don't change it unless you know what you are doing
	"providers" => array(
			array(
				"module" => "ZuckerListingTemplate",
				"class_name" => "ListingTemplate",
				"include" => "modules/ZuckerListingTemplate/ListingTemplate.php",
				"lang_key_new" => "LBL_LISTING_TEMPLATE_NEW",
				"menu_ext" => "no",
			),
			array(
				"module" => "ZuckerReportTemplate",
				"class_name" => "ReportTemplate",
				"include" => "modules/ZuckerReportTemplate/ReportTemplate.php",
				"lang_key_new" => "LBL_REPORT_TEMPLATE_NEW",
				"menu_ext" => "yes",
			),
			array(
				"module" => "ZuckerWordTemplate",
				"class_name" => "WordTemplate",
				"include" => "modules/ZuckerWordTemplate/WordTemplate.php",
				"lang_key_new" => "LBL_WORD_TEMPLATE_NEW",
				"menu_ext" => "yes",
			),
			array(
				"module" => "ZuckerQueryTemplate",
				"class_name" => "QueryTemplate",
				"include" => "modules/ZuckerQueryTemplate/QueryTemplate.php",
				"lang_key_new" => "LBL_QUERY_TEMPLATE_NEW",
				"menu_ext" => "no",
			),
		),

	
	//if you get the error "Value '0000-00-00' can not be represented as java.sql.Date", then uncomment this line and it may work
	//"jdbc_url_extension" => "?zeroDateTimeBehavior=convertToNull",	
	
	//set this to yes/no, if you want to enable/disable debug output when running a report
	"debug" => "no",
	
	//set this to yes/no, if you want to enable/disable php scripting for report parameters
	"param_script_enabled" => "yes",
		
	// Enter the path to your java executable here, if autodetection doesn't work
	
	//Windows Environment Default
	//"java_cmdline" => "javaw %ARGS% 2>&1",
		
	//For Java Web Start installations
	//"java_cmdline" => "javaws %ARGS% 2>&1",

	//Unix Environment Default
	//"java_cmdline" => "java -Djava.awt.headless=true %ARGS% 2>&1",		

	"release_descriptor" => "Version 1.6",
);

?>