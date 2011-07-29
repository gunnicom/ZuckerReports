<?php

require_once("modules/ZuckerReports/language/fr_FR.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Nouveau mod�le Requ�tes',
	'LBL_QUERY' => 'Requ�tes',
	'LBL_QUERY_NAME' => 'Nom Requ�tes',
	'LBL_QUERY_SQL' => 'Requ�tes',
	'LBL_QUERY_SQL_HELP' => 'Saisir la requ�te SQL pour ce rapport. Saisir le nom du param�tres avec un $ devant, et la valeur associ�e sera ins�r�e dans le rapport',
	'LBL_QUERY_DESCRIPTION' => 'Description',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'D�limiteur Colonne',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'D�limiteur ligne',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Inclure l\'en-t�te',
	)
);


$mod_list_strings = array_merge($mod_list_strings,
	array (
		  'QUERY_EXPORT_TYPES' =>
		  array (
			'CSV' => 'Liste CSV avec virgules (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
			'TABLE' => 'Inline Table',
		  ),
		  'COL_DELIMS' =>
		  array (
			',' => 'Colonne (,)',
			';' => 'Semicolonne (;)',
			'tab' => 'Tab (\t)',
			'.' => 'Dot (.)',
		  ),
		  'ROW_DELIMS' =>
		  array (
			'newline' => 'Nouvelle ligne (\n)',
		  ),
);

	
?>
