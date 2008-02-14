<?


$zuckerreports_config = array(
	
	"providers" => array(
			array(
				"module" => "ZuckerReportTemplate",
				"class_name" => "ReportTemplate",
				"include" => "modules/ZuckerReportTemplate/ReportTemplate.php",
				"lang_key_new" => "LBL_REPORT_TEMPLATE_NEW",
			),
		),

	// Enter the path to your java executable here, if autodetection doesn't work
	
	//Windows Environment Default
	//"java_cmdline" => "javaw %ARGS% 2>&1",
		
	//For Java Web Start installations
	//"java_cmdline" => "javaws %ARGS% 2>&1",

	//Unix Environment Default
	//"java_cmdline" => "java -Djava.awt.headless=true %ARGS% 2>&1",		



	
	"release_descriptor" => "Community Edition, Version 1.5",
);

?>