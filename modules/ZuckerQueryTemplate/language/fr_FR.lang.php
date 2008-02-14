<?php

require_once("modules/ZuckerReports/language/fr_FR.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Nouveau modèle Requètes',
	'LBL_QUERY' => 'Requètes',
	'LBL_QUERY_NAME' => 'Nom Requètes',
	'LBL_QUERY_SQL' => 'Requètes',
	'LBL_QUERY_SQL_HELP' => 'Saisir la requête SQL pour ce rapport. Saisir le nom du paramètres avec un $ devant, et la valeur associée sera insérée dans le rapport',
	'LBL_QUERY_DESCRIPTION' => 'Description',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Délimiteur Colonne',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Délimiteur ligne',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Inclure l\'en-tête',
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
