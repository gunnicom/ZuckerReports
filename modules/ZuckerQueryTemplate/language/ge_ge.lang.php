<?php
global $mod_strings;
global $mod_list_strings;

require_once("modules/ZuckerReports/language/ge_ge.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Neue Abfragenvorlage',
	'LBL_QUERY' => 'Abfrage',
	'LBL_QUERY_NAME' => 'Abfragenname',
	'LBL_QUERY_SQL' => 'SQL-Abfrage',
	'LBL_QUERY_SQL_HELP' => 'Bitte geben Sie hier die SQL-Abfrage ein. Um eine Parameter-Auswahl in die Abfrage zu übernehmen, geben Sie bitte das "$"-Zeichen gefolgt von dem Parameter-Namen ein - an dieser Position wird bei der Berichtsausführung der Parameterwert inkludiert.',
	'LBL_QUERY_DESCRIPTION' => 'Kommentar',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Spaltentrennzeichen',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Zeilentrennzeichen',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Kopfzeile',
	)
);


$mod_list_strings = array_merge($mod_list_strings,
	array (
		  'QUERY_EXPORT_TYPES' =>
		  array (
			'CSV' => 'Comma Separated Values (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Einfachstes HTML (*.html)',
			'TABLE' => 'Online Tabelle',
		  ),
		  'COL_DELIMS' =>
		  array (
			',' => 'Beistrich (,)',
			';' => 'Strichpunkt (;)',
			'tab' => 'Tabulator (\t)',
			'.' => 'Punkt (.)',
		  ),
		  'ROW_DELIMS' =>
		  array (
			'newline' => 'Zeilenumbruch (\n)',
		  ),
	)
);

	
?>
