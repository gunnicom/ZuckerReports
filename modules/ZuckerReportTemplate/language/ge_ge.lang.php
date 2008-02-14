<?php
require_once("modules/ZuckerReports/language/ge_ge.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Neue JasperReports-Vorlage',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Vorlagenname',
	'LBL_REPORT_FILENAME' => 'Berichtdatei',
	'LBL_REPORT_DESCRIPTION' => 'Kommentar',
	'LBL_REPORT_EXPORT_AS' => 'Mögliche Formate',
	'LBL_SUBREPORTS' => 'Subreports',
	'LBL_SUBREPORT' => 'Subreport hinzufügen',
	'LBL_SUBREPORT_HELP' => 'Subreports werden in einer eigenen Datei gespeichert. Um JasperReports den Zugriff darauf zu ermöglichen, geben Sie bitte diese Dateien hier an. Wenn Sie diese schon einmal hinaufgeladen haben, brauchen Sie das nicht mehr zu machen.',
	'LBL_RESOURCES' => 'Weitere Resourcen',
	'LBL_RESOURCE' => 'Resource hinzufügen',
	'LBL_RESOURCE_HELP' => 'Bilder und Scriptlets eines Berichtes werden in eigenen Dateien gespeichert. Um JasperReports den Zugriff darauf zu ermöglichen, geben Sie bitte diese Dateien hier an. Wenn Sie diese schon einmal hinaufgeladen haben, brauchen Sie das nicht mehr zu machen.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Es werden nur Bericht-Design-Dateien (*.jrxml) unterstützt',
	)
);

$mod_list_strings = array_merge($mod_list_strings,
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
