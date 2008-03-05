<?php

$mod_strings = array_merge(return_module_language("nb_no", "ZuckerReports"),
	array(
	
	'LBL_WORD_TEMPLATE_NEW' => 'Ny Office-mal',
	'LBL_WORD' => 'Word-mal',
	'LBL_OPENOFFICE' => 'OpenOffice-mal',
	'LBL_WORD_NAME' => 'Navn på mal',
	'LBL_WORD_FILENAME' => 'Mal-fil',
	'LBL_WORD_DESCRIPTION' => 'Beskrivelse',
	'LBL_WORD_QUERY' => 'Spørring',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	
	'LBL_WORD_CREATE_WORD_TEMPLATE' => 'Link en ny Office-mal',
	'LBL_WORD_WORD_TEMPLATES' => 'Linket Office-mal',

	'LBL_WORD_ONDEMAND_SAVE_PATH' => 'Lagre til katalog',
	
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Kun Word (*.doc) og OpenOffice/StarOffice (*.stw) er støttet.',

	'LBL_LOADER_SETUP' => 'Vennligst installer <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>ZuckerReports Loader</strong></a> for å få Microsoft Office og OpenOffice støtte.',

	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("nb_no", "ZuckerReports"),
	array (
		'WORD_EXPORT_TYPES' =>
		  array (
			'NewDocument' => 'Nytt dokument',
			'Print' => 'Send til printer',
			'Mail' => 'Send som email',
			'Fax' => 'Send som fax (om det er støttet)',
		  ),
		'OPENOFFICE_EXPORT_TYPES' =>
		  array (
			'Print' => 'Send til printer',
			'File' => 'Lagre som fil',
		  ),
	)
);





		
?>
