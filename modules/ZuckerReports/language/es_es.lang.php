<?php


$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'ZuckerReports',
	'LBL_MODULE_TITLE' => 'ZuckerReports: Inicio',
	'LNK_TEMPLATE_LIST'=> 'Plantillas de Reportes y Consultas',
	'LNK_PARAMETER_LIST'=> 'Parametros de Reportes y Consultas',
	'LNK_REPORT_ONDEMAND'=> 'Reportes A-Petición',
	'LNK_RUNNABLE_REPORTS' => 'Programador de Reportes',
	'LNK_ARCHIVE_LIST'=> 'Almacén de Reportes',
	'LBL_MENU_ABOUT' => 'Acerca de',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	'LBL_ASSIGNED_TEAM' => 'Team:',

	'LBL_TEMPLATE_LIST_HEADER' => 'Lista de Plantillas',
	'LBL_TEMPLATE_LIST_NAME' => 'Nombre',
	'LBL_TEMPLATE_LIST_TYPE' => 'Tipo',
	'LBL_TEMPLATE_LIST_DESCRIPTION' => 'Descripción',
	
	'LBL_CREATED_BY'=> 'Creado por',
	'LBL_DATE_ENTERED'=> 'Fecha Creación',
	'LBL_DATE_MODIFIED'=> 'Fecha Modificación',
	'LBL_DELETED' => 'Borrado',
	'LBL_MODIFIED'=> 'Modificado por',

	'LBL_SUBREPORTS' => 'Reportes',
	'LBL_ZUCKERREPORT_NAME' => 'Nombre de Archivo',
	'LBL_ZUCKERREPORT_DESCRIPTION' => 'Descripción',
	'LBL_ZUCKERREPORT_PUBLISH' => 'Publicar Reporte',
	'LBL_ZUCKERREPORT_UNPUBLISH' => 'Des-Publicar Reporte',
	'LBL_ZUCKERREPORT_PUBLISHED' => 'Publicado',
	'LBL_ZUCKERREPORT_UNPUBLISHED' => 'No Publicado',
	'LBL_HOME_REPORTS' => 'Reportes',
	
	'LBL_CONTAINER' => 'Categoria',
	'LBL_SUBCONTAINERS' => 'Subcategoria',
	'LBL_CONTAINER_NEW' => 'Nueva Categoria',
	'LBL_CONTAINER_TOP' => 'Categoria Principal',
	'LBL_CONTAINER_SELECT' => 'Seleccionar',
	'LBL_CONTAINER_NAME' => 'Nombre',
	'LBL_CONTAINER_DESCRIPTION' => 'Descripción',
	'LBL_CONTAINER_UP' => 'Arriba',

	'LBL_RUNNABLEREPORT' => 'Scheduled Report',
	'LBL_RUNNABLEREPORT_NAME' => 'Name',
	'LBL_RUNNABLEREPORT_DESCRIPTION' => 'Description',
	'LBL_RUNNABLEREPORT_SETTINGS' => 'Settings (encoded)',
	'LBL_RUNNABLEREPORT_NEXTRUN' => 'Next Run',
	'LBL_RUNNABLEREPORT_START' => 'Schedule Start',
	'LBL_RUNNABLEREPORT_INTERVAL' => 'Schedule Interval',
	'LBL_RUNNABLEREPORT_LASTLOG' => 'Last Log',

	'LBL_PARAM_NEW' => 'Nuevo parámetro de Reporte',
	'LBL_PARAM_FRIENDLYNAME' => 'Nombre Amigable',
	'LBL_PARAM_DEFAULTNAME' => 'Nombre por omisión',
	'LBL_PARAM_DEFAULTVALUE' => 'Valor por omisión',
	'LBL_PARAM_DESCRIPTION' => 'Descripción',
	'LBL_PARAM_RANGE' => 'Selección',
	'LBL_PARAM_RANGE_LIST' => 'Lista definida por el usuario',
	'LBL_PARAM_RANGE_LIST_HELP' => 'Entre los valores para la lista, separados por una coma (",").',
	'LBL_PARAM_RANGE_DROPDOWN' => 'Drop-Down List',
	'LBL_PARAM_RANGE_INPUT' => 'Entrada Directa',
	'LBL_PARAM_RANGE_SQL' => 'Consulta Definida por el usuario',
	'LBL_PARAM_RANGE_SQL_HELP' => 'Entre la consulta SQL para construir la lista de selección de parámetro cuando se ejecute el reporte. El valor de la primera columna de resultados será manejada por el reporte, el valor de la segunda columna será mostrada al usuario para la selección.',
	'LBL_PARAM_RANGE_SQL_TEST' => 'Probar Consulta SQL',
	'LBL_PARAM_RANGE_SCRIPT' => 'PHP Script',
	'LBL_PARAM_RANGE_SCRIPT_DISABLED' => 'PHP Scripting has been disabled. Please enable it in modules/ZuckerReports/config.php.',
	'LBL_PARAM_RANGE_SCRIPT_HELP' => 'Please enter any PHP code you want. Finish with a "return"-statement.',
	


	'LBL_PARAM_LINK_LIST' => 'Enlaces de Parámetros',
	'LBL_PARAM_LINK_NEW' => 'Seleccion de Parámetros',
	'LBL_PARAM_LINK_NAME' => 'Nombre de Parámetro',
	'LBL_PARAM_LINK_DEFAULTVALUE' => 'Valor por Omisión',
	'LBL_PARAM_LINK_PARAM' => 'Parámetro',
	'LBL_PARAM_LINK_RANGE' => 'Seleccion',
	'LBL_PARAM_LINK_ATTACH' => 'Enlazar Parámetro',
	'LBL_PARAM_LINK_DETACH' => 'Desenlazar Parámetro',

	'LBL_TEMPLATE_MODULE_LIST' => 'Enlaces de Módulos',
	'LBL_TEMPLATE_MODULE_NEW' => 'Seleccion de Módulos',
	'LBL_TEMPLATE_MODULE_PARAM' => 'Parámetro Combinado',
	'LBL_TEMPLATE_MODULE_MOD' => 'Módulo',
	'LBL_TEMPLATE_MODULE_ATTACH' => 'Enlazar a Módulo',
	'LBL_TEMPLATE_MODULE_DETACH' => 'Desenlazar de Módulo',
	
	'LBL_ONDEMAND_REPORT_SELECTION' => 'Seleccion de Reporte',
	'LBL_ONDEMAND_FORMAT_SELECTION' => 'Preferencias de Formato',
	'LBL_ONDEMAND_ATTACH_SELECTION' => 'Attach',
	'LBL_ONDEMAND_PARAMETERS' => 'Parámetros',
	
	'LBL_ONDEMAND_TEMPLATE' => 'Reporte',
	'LBL_ONDEMAND_EXECUTE' => 'Ejecutar Reporte',
	'LBL_ADD_SCHEDULER' => 'Save for later execution',
	'LBL_ONDEMAND_OUTPUT' => 'Salida',
	'LBL_ONDEMAND_RESULT' => 'Report Result',
	'LBL_ONDEMAND_VIEW' => 'Ver Reporte',
	'LBL_ATTACH_TO' => 'Adjuntar Reporte a',
	'LBL_ARCHIVE_TO' => 'Almacenar Reporte en categoria',
	'LBL_ONDEMAND_ERROR' => 'Error al ejecutar reporte',
	'LBL_ONDEMAND_FORMAT' => 'Formato',
	'LBL_SEND_EMAIL' => 'Send as Email To',
	'LBL_SEND_EMAIL_HINTS' => '(separate multiple email recipients by using a ",")',
	'LBL_SEND_EMAIL_SUBJECT' => 'ZuckerReports Notification: %s',
	'LBL_SEND_EMAIL_BODY' => "Attached you can find an auto-generated report sent to you from ZuckerReports. \n\nCreated on: %s\nReport: %s\n",
	'LBL_SEND_EMAIL_OK' => 'Sent Email To %s',

	'LBL_ONDEMAND_BOUND' => 'Reportes, Consultas y Cartas',
	'LBL_ONDEMAND_BOUND_ATTACH' => 'Adjuntar resultado',
	'LBL_ONDEMAND_BOUND_RUN' => 'Ejecutar',
	
	'LBL_ARCHIVE_LIST'=> 'Listado de Reportes',
	
);

$mod_list_strings = array (
  'PARAM_RANGE_TYPES' =>
  array (
    'SIMPLE' => 'Entrada Directa',
	'DATE' => 'Date Input',
	'DATE_NOW' => 'Current Time and Date',
	'DATE_ADD' => 'Future Timestamp',
	'DATE_SUB' => 'Past Timestamp',
    'SQL' => 'Consulta definida por el usuario',
    'LIST' => 'Lista definida por el usuario',
	'DROPDOWN' => 'Drop-Down List',
	'CURRENT_USER' => 'Current User',
	'SCRIPT' => 'PHP Script',
  ),
  'PARAM_DATE_TYPES' =>
  array (
	'MINUTE' => 'Minute(s)',
	'HOUR' => 'Hour(s)',
	'DAY' => 'Day(s)',
	'WEEK' => 'Week(s)',
	'MONTH' => 'Month(s)',
	'YEAR' => 'Year(s)',
  ),
  'SCHEDULE_INTERVALS'=>array(
 	''=>'Inactive',
 	'3600'=>'Hourly',
 	'21600'=>'Every 6 Hours',
 	'43200'=>'Every 12 Hours',
 	'86400'=>'Daily',
 	'604800'=>'Weekly',
 	'1209600'=>'Every 2 Weeks',
 	'2419200'=>'Every 4 Weeks',
 	),
);

?>
