<?php

$mod_strings = array_merge(return_module_language("ge_ge", "ZuckerReports"),
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Neue Abfragenvorlage',
	'LBL_QUERY' => 'Abfrage',
	'LBL_QUERY_NAME' => 'Abfragenname',
	'LBL_QUERY_SQL' => 'SQL-Abfrage',
	'LBL_QUERY_SQL_HELP' => 'Bitte geben Sie hier die SQL-Abfrage ein. Um eine Parameter-Auswahl in die Abfrage zu &uuml;bernehmen, geben Sie bitte das "$"-Zeichen gefolgt von dem Parameter-Namen ein - an dieser Position wird bei der Berichtsausf&uuml;hrung der Parameterwert inkludiert.<br/><br/>Auﬂerdem werden folgende Platzhalter unterst&uuml;tzt: <br/><b>$SUGAR_USER_ID</b> - ID des angemeldeten Benutzers<br/><b>$SUGAR_USER_NAME</b> - Name des angemeldeten Benutzers<br/><b>$SUGAR_SESSION_ID</b> - ID der aktuellen Sitzung',
	'LBL_QUERY_DESCRIPTION' => 'Kommentar',

	'LBL_ASSIGNED_USER_ID' => 'Zugewiesen zu:',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Spaltentrennzeichen',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Zeilentrennzeichen',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Kopfzeile',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("ge_ge", "ZuckerReports"),
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
