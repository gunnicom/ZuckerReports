<?php

$mod_strings = array_merge(return_module_language("es_es", "ZuckerReports"),
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Nueva Plantilla de Consulta',
	'LBL_QUERY' => 'Consulta',
	'LBL_QUERY_NAME' => 'Nombre Consulta',
	'LBL_QUERY_SQL' => 'Consulta',
	'LBL_QUERY_SQL_HELP' => 'Por favor escriba la consulta SQL para este reporte. Para incluir una selección de parametro, escriba "$" seguido del nombre del parámetro, y su valor será insertado en esta posición al ejecutar el reportee.<br/><br/>The following placeholders are supported as well: <br/><b>$SUGAR_USER_ID</b> - contains the ID of the currently logged on user<br/><b>$SUGAR_USER_NAME</b> - contains the name of the currently logged on user<br/><b>$SUGAR_SESSION_ID</b> - contains the ID of the current session',
	'LBL_QUERY_DESCRIPTION' => 'Descripción',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Separador de Columna',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Seperador de fila',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Incluir Encabezado',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("es_es", "ZuckerReports"),
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
