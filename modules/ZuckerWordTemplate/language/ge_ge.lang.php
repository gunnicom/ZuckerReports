<?php

$mod_strings = array_merge(return_module_language("ge_ge", "ZuckerReports"),
	array(
	'LBL_WORD_TEMPLATE_NEW' => 'Neue Office-Vorlage',
	'LBL_WORD' => 'Word-Vorlage',
	'LBL_OPENOFFICE' => 'OpenOffice Vorlage',
	'LBL_WORD_NAME' => 'Vorlagenname',
	'LBL_WORD_FILENAME' => 'Vorlagendatei',
	'LBL_WORD_DESCRIPTION' => 'Kommentar',
	'LBL_WORD_QUERY' => 'Abfrage',

	'LBL_ASSIGNED_USER_ID' => 'Zugewiesen zu:',

	'LBL_WORD_CREATE_WORD_TEMPLATE' => 'Neue Office-Vorlage',
	'LBL_WORD_WORD_TEMPLATES' => 'Office-Vorlagen',

	'LBL_WORD_ONDEMAND_SAVE_PATH' => 'Speichern in Verzeichnis',
	
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Es werden nur Word (*.doc) und OpenOffice/StarOffice (*.stw) Dateien unterst&uuml;tzt',
	
	'LBL_LOADER_SETUP' => 'F&uuml;r Microsoft Office und OpenOffice Unterst&uuml;tzung installieren Sie bitte den <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>ZuckerReports Loader</strong></a>.',

	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("ge_ge", "ZuckerReports"),
	array (
		  'WORD_EXPORT_TYPES' =>
		  array (
			'NewDocument' => 'Neues Dokument',
			'Print' => 'An Drucker senden',
			'Mail' => 'Als E-Mail versenden',
			'Fax' => 'Als Fax versenden (wenn von Ihrer Umgebung unterst&uuml;tzt)',
		  ),
		  'OPENOFFICE_EXPORT_TYPES' =>
		  array (
			'Print' => 'An Drucker senden',
			'File' => 'Als Datei speichern',
		  ),
	)
);





		
?>
