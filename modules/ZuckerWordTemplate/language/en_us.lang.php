<?php

$mod_strings = array_merge(return_module_language("en_us", "ZuckerReports"),
	array(
	
	'LBL_WORD_TEMPLATE_NEW' => 'New Office Template',
	'LBL_WORD' => 'Word Template',
	'LBL_OPENOFFICE' => 'OpenOffice Template',
	'LBL_WORD_NAME' => 'Template Name',
	'LBL_WORD_FILENAME' => 'Template File',
	'LBL_WORD_DESCRIPTION' => 'Description',
	'LBL_WORD_QUERY' => 'Query',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	
	'LBL_WORD_CREATE_WORD_TEMPLATE' => 'Link new Office Template',
	'LBL_WORD_WORD_TEMPLATES' => 'Linked Office Templates',

	'LBL_WORD_ONDEMAND_SAVE_PATH' => 'Save to folder',
	
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Only Word (*.doc) and OpenOffice/StarOffice (*.stw) are supported',

	'LBL_LOADER_SETUP' => 'Please install the <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>ZuckerReports Loader</strong></a> for Microsoft Office and OpenOffice support.',

	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("en_us", "ZuckerReports"),
	array (
		'WORD_EXPORT_TYPES' =>
		  array (
			'NewDocument' => 'New document',
			'Print' => 'Send to printer',
			'Mail' => 'Send as email',
			'Fax' => 'Send as fax (if supported by your enviroment)',
		  ),
		'OPENOFFICE_EXPORT_TYPES' =>
		  array (
			'Print' => 'Send to printer',
			'File' => 'Save as file',
		  ),
	)
);





		
?>
