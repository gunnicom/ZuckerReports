<?php

$mod_strings = array_merge(return_module_language("ge_ge", "ZuckerReports"),
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Neue JasperReports-Vorlage',
	'LBL_ASSIGNED_USER_ID' => 'Zugewiesen an:',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Vorlagenname',
	'LBL_REPORT_FILENAME' => 'Berichtdatei',
	'LBL_REPORT_DESCRIPTION' => 'Kommentar',
	'LBL_REPORT_EXPORT_AS' => 'M&ouml;gliche Formate',
	'LBL_SUBREPORTS' => 'Subreports',
	'LBL_SUBREPORT' => 'Subreport hinzuf&uuml;gen',
	'LBL_SUBREPORT_HELP' => 'Subreports werden in einer eigenen Datei gespeichert. Um JasperReports den Zugriff darauf zu erm&ouml;glichen, geben Sie bitte diese Dateien hier an. Wenn Sie diese schon einmal hinaufgeladen haben, brauchen Sie das nicht mehr zu machen.',
	'LBL_RESOURCES' => 'Weitere Resourcen',
	'LBL_RESOURCE' => 'Resource hinzuf&uuml;gen',
	'LBL_RESOURCE_HELP' => 'Bilder und Scriptlets eines Berichtes werden in eigenen Dateien gespeichert. Um JasperReports den Zugriff darauf zu erm&ouml;glichen, geben Sie bitte diese Dateien hier an. Wenn Sie diese schon einmal hinaufgeladen haben, brauchen Sie das nicht mehr zu machen.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Es werden nur Bericht-Design-Dateien (*.jrxml) unterst&uuml;tzt',
	)
);

$mod_list_strings = array_merge(return_mod_list_strings_language("ge_ge", "ZuckerReports"),
	array (
	  'REPORT_EXPORT_TYPES' =>
	  array (
		'PDF' => 'Adobe PDF (*.pdf)',
		'XLS' => 'Excel (*.xls)',
		'HTML' => 'HTML (*.html)',
		'XML' => 'XML (extern images, *.xml)',
		'XML_EMBED' => 'XML (embedded images, *.xml)',
	  ),
 	)
);


?>
