<?php

$mod_strings = array_merge(return_module_language("es_es", "ZuckerReports"),
	array(

	'LBL_WORD_TEMPLATE_NEW' => 'Nueva Plantilla de Office',
	'LBL_WORD' => 'Plantilla de Word',
	'LBL_OPENOFFICE' => 'Plantilla de OpenOffice',
	'LBL_WORD_NAME' => 'Nombre de Plantilla',
	'LBL_WORD_FILENAME' => 'Archivo de Plantilla',
	'LBL_WORD_DESCRIPTION' => 'Descripción',
	'LBL_WORD_QUERY' => 'Consulta',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	
	'LBL_WORD_CREATE_WORD_TEMPLATE' => 'Combinar nueva Plantilla de Office',
	'LBL_WORD_WORD_TEMPLATES' => 'Plantillas de Office Combinadas',

	'LBL_WORD_ONDEMAND_SAVE_PATH' => 'Guardar en carpeta',
	
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Solo archivos de Word (*.doc) y OpenOffice/StarOffice (*.stw) son soportados',

	'LBL_LOADER_SETUP' => 'Por favor instale <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>Cargador ZuckerReports</strong></a> para soporte de Microsoft Office y OpenOffice.',

	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("es_es", "ZuckerReports"),
	array (
		  'WORD_EXPORT_TYPES' =>
		  array (
			'NewDocument' => 'Nuevo Documento',
			'Print' => 'Enviar a impresora',
			'Mail' => 'Enviar como e-mail',
			'Fax' => 'Enviar como Fax (si su entorno lo permite)',
		  ),
		  'OPENOFFICE_EXPORT_TYPES' =>
		  array (
			'Print' => 'Enviar a la impresora',
			'File' => 'Guardar como un archivo',
		  ),
	)
);





		
?>
