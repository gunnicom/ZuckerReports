<?php
global $mod_strings;
global $mod_list_strings;

require_once("modules/ZuckerReports/language/en_us.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Nueva Plantilla de Consulta',
	'LBL_QUERY' => 'Consulta',
	'LBL_QUERY_NAME' => 'Nombre Consulta',
	'LBL_QUERY_SQL' => 'Consulta',
	'LBL_QUERY_SQL_HELP' => 'Por favor escriba la consulta SQL para este reporte. Para incluir una selecci�n de parametro, escriba "$" seguido del nombre del par�metro, y su valor ser� insertado en esta posici�n al ejecutar el reportee.',
	'LBL_QUERY_DESCRIPTION' => 'Descripci�n',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Separador de Columna',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Seperador de fila',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Incluir Encabezado',
	)
);


$mod_list_strings = array_merge($mod_list_strings,
	array (
		  'QUERY_EXPORT_TYPES' =>
		  array (
			'CSV' => 'Valores separados por comas (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
			'TABLE' => 'Inline Table',
		  ),
		  'COL_DELIMS' =>
		  array (
			',' => 'Coma (,)',
			';' => 'Punto y Coma (;)',
			'tab' => 'Tabulador (\t)',
			'.' => 'Punto (.)',
		  ),
		  'ROW_DELIMS' =>
		  array (
			'newline' => 'Nueva Linea (\n)',
		  ),
	)
);

	
?>
