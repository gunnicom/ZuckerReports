<?php
global $mod_strings;
global $mod_list_strings;

require_once("modules/ZuckerReports/language/es_es.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Nueva Plantilla de JasperReports',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Nombre de Plantilla',
	'LBL_REPORT_FILENAME' => 'Archivo de Plantilla',
	'LBL_REPORT_DESCRIPTION' => 'Descripci�n',
	'LBL_REPORT_EXPORT_AS' => 'Formatos Permitidos',
	'LBL_SUBREPORTS' => 'Subreportes',
	'LBL_SUBREPORT' => 'Cargar Subreporte',
	'LBL_SUBREPORT_HELP' => 'Los Subreportes son guardados en sus propios archivos. Para que JasperReports pueda accesar esos archivos, por favor carguelos ac�. Si usted ha cargado un archivo de Subreporte antes, usted no tiene que cargarlo nuevamente.',
	'LBL_RESOURCES' => 'Otros Recursos',
	'LBL_RESOURCE' => 'Cargar Recursos',
	'LBL_RESOURCE_HELP' => 'Las imagenes de los reportes y los scripts son guardados en sus propios archivos. Para que JasperReports pueda acceder a esos archivos, debe cargarlos ac�. Si ha cargado un archivo de recursos antes, no tiene que hacerlo nuevamente.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Solo archivos de dise�o de reportes (*.jrxml) son soportados',
	)
);

$mod_list_strings = array_merge($mod_list_strings,
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
