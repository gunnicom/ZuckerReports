<?php

global $zuckerreports_config;
global $sugar_config;

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
	"param_script_enabled" => "no",

	//enter your encoding here, if different from sugar default. see http://www.php.net/htmlentities for supported encodings
	//"charset" => "UTF-8"

	
	// Enter the path to your java executable here, if autodetection doesn't work
	
	//Windows Environment Default
	//"java_cmdline" => "javaw %ARGS% 2>&1",
		
	//For Java Web Start installations
	//"java_cmdline" => "javaws %ARGS% 2>&1",

	//Unix Environment Default
	//"java_cmdline" => "java -Djava.awt.headless=true %ARGS% 2>&1",		

	
	//enter the path to your "zip" executable here. if not present, you may use the zip utility integreated in your Java installation instead
	
	//If set to "java", the zip utility integrated in your Java installation will be used
	//"zip_cmdline" => "java",

	//zip.exe included in ZuckerReports (only working on Windows!!!!) or the plain old "zip" command on Linux/Unix
	"zip_cmdline" => "zip",

	//Linux/Unix zip
	//"zip_cmdline" => "cd \"%DIR%\" && zip \"%FILE%\" *  2>&1",
	
	//Freezip
	//"zip_cmdline" => "cd \"%DIR%\" && \"C:\\Winnt\\system32\\unknown\\zip\" \"%FILE%\" *",
	
	//7-Zip
	//"zip_cmdline" => "cd \"%DIR%\" && \"C:\\Program Files\\7-Zip\\7z\" a -tzip \"%FILE%\" *",
	
	"team_implementation" => "auto",
	//"team_implementation" => "sugar",
	//"team_implementation" => "simple",
	//"team_implementation" => "none",
	
	"teams" => array(
		"teamchris" => array(
			"name" => "Team Chris",
			"users" => array("chris", "admin"),
		),
		"teamadmin" => array(
			"name" => "Team Admin",
			"users" => array("admin"),
		),
	),
);

?>