<?php

$mod_strings = array_merge(return_module_language("es_es", "ZuckerReports"),
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Nueva Plantilla de JasperReports',
	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Nombre de Plantilla',
	'LBL_REPORT_FILENAME' => 'Archivo de Plantilla',
	'LBL_REPORT_DESCRIPTION' => 'Descripción',
	'LBL_REPORT_EXPORT_AS' => 'Formatos Permitidos',
	'LBL_SUBREPORTS' => 'Subreportes',
	'LBL_SUBREPORT' => 'Cargar Subreporte',
	'LBL_SUBREPORT_HELP' => 'Los Subreportes son guardados en sus propios archivos. Para que JasperReports pueda accesar esos archivos, por favor carguelos acá. Si usted ha cargado un archivo de Subreporte antes, usted no tiene que cargarlo nuevamente.',
	'LBL_RESOURCES' => 'Otros Recursos',
	'LBL_RESOURCE' => 'Cargar Recursos',
	'LBL_RESOURCE_HELP' => 'Las imagenes de los reportes y los scripts son guardados en sus propios archivos. Para que JasperReports pueda acceder a esos archivos, debe cargarlos acá. Si ha cargado un archivo de recursos antes, no tiene que hacerlo nuevamente.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Solo archivos de diseño de reportes (*.jrxml) son soportados',
	)
);

$mod_list_strings = array_merge(return_mod_list_strings_language("es_es", "ZuckerReports"),
	array (
		  'REPORT_EXPORT_TYPES' =>
		  array (
			'PDF' => 'Adobe PDF (*.pdf)',
			'XLS' => 'Excel (*.xls)',
			'HTML' => 'HTML (*.html)',
			'XML' => 'XML (imagenes externas, *.xml)',
			'XML_EMBED' => 'XML (imagenes incorporadas, *.xml)',
		  ),
 	)
);


?>
