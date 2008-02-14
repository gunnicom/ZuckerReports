<?PHP

// manifest file for information regarding application of new code
$manifest = array(
    // only install on the following regex sugar versions (if empty, no check)
    'acceptable_sugar_versions' => array('4.2.*'),

    // name of new code
    'name' => 'ZuckerReports',

    // description of new code
    'description' => 'ZuckerReports Community Edition',

    // author of new code
    'author' => 'go-mobile IT GmbH',

    // date published
    'published_date' => '2006/07/17',

    // version of code
    'version' => '1.5',

    // type of code (valid choices are: full, langpack, module, patch, theme )
    'type' => 'module',

    // icon for displaying in UI (path to graphic contained within zip package)
    'icon' => '',
	
	
	// is_uninstallable
	'is_uninstallable' => 'true',
);



$installdefs = array(

	'id'=> 'ZuckerReports',
	//'image_dir'=>'<basepath>/images',
	'copy' => array(
			array('from'=> '<basepath>/modules/ZuckerReportContainer',
		  	'to'=> 'modules/ZuckerReportContainer',
			),
			array('from'=> '<basepath>/modules/ZuckerReportModuleLink',
		  	'to'=> 'modules/ZuckerReportModuleLink',
			),
			array('from'=> '<basepath>/modules/ZuckerReportParameter',
		  	'to'=> 'modules/ZuckerReportParameter',
			),
			array('from'=> '<basepath>/modules/ZuckerReportParameterLink',
		  	'to'=> 'modules/ZuckerReportParameterLink',
			),
			array('from'=> '<basepath>/modules/ZuckerReports',
		  	'to'=> 'modules/ZuckerReports',
			),
			array('from'=> '<basepath>/modules/ZuckerReportTemplate',
		  	'to'=> 'modules/ZuckerReportTemplate',
			),
	),
	
	'language'=> array(
			array('from'=> '<basepath>/application/app_strings.en_us.lang.php', 
			'to_module'=> 'application',
			'language'=>'en_us'
			),
			array('from'=> '<basepath>/application/app_strings.ge_ge.lang.php', 
			'to_module'=> 'application',
			'language'=>'ge_ge'
			),
			array('from'=> '<basepath>/application/app_strings.es_es.lang.php', 
			'to_module'=> 'application',
			'language'=>'es_es'
			),
			array('from'=> '<basepath>/application/app_strings.fr_FR.lang.php', 
			'to_module'=> 'application',
			'language'=>'fr_FR'
			),
		),
	'beans'=> array(
			array('module'=> 'ZuckerReports',
				  'class'=> 'ZuckerReport',
				  'path'=> 'modules/ZuckerReports/Report.php',
				  'tab'=> true,
			),
			array('module'=> 'ZuckerReportContainer',
				  'class'=> 'ReportContainer',
				  'path'=> 'modules/ZuckerReportContainer/ReportContainer.php',
				  'tab'=> false,
			),
			array('module'=> 'ZuckerReportModuleLink',
				  'class'=> 'ReportModuleLink',
				  'path'=> 'modules/ZuckerReportModuleLink/ReportModuleLink.php',
				  'tab'=> false,
			),
			array('module'=> 'ZuckerReportParameter',
				  'class'=> 'ReportParameter',
				  'path'=> 'modules/ZuckerReportParameter/ReportParameter.php',
				  'tab'=> false,
			),
			array('module'=> 'ZuckerReportParameterLink',
				  'class'=> 'ReportParameterLink',
				  'path'=> 'modules/ZuckerReportParameterLink/ReportParameterLink.php',
				  'tab'=> false,
			),
			array('module'=> 'ZuckerReportTemplate',
				  'class'=> 'ReportTemplate',
				  'path'=> 'modules/ZuckerReportTemplate/ReportTemplate.php',
				  'tab'=> false,
			),
	),
	'relationships'=>array(
					array(
						'module'=> 'ZuckerReportContainer',
						'meta_data'=>'<basepath>/zuckerreports_MetaData.php',
						'module_vardefs'=>'<basepath>/modules/ZuckerReportContainer/vardefs.php',
					),
	)
					  
)
?>
