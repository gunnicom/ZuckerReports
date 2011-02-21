<?php

$mod_strings = array_merge(return_module_language("ru_ru", "ZuckerReports"),
	array(
	
	'LBL_WORD_TEMPLATE_NEW' => 'Новый отчет Office',
	'LBL_WORD' => 'Word отчет',
	'LBL_OPENOFFICE' => 'OpenOffice отчет',
	'LBL_WORD_NAME' => 'Имя отчета',
	'LBL_WORD_FILENAME' => 'Файл отчета',
	'LBL_WORD_DESCRIPTION' => 'Описание',
	'LBL_WORD_QUERY' => 'Запрос',

	'LBL_ASSIGNED_USER_ID' => 'Направление:',
	
	'LBL_WORD_CREATE_WORD_TEMPLATE' => 'Список новых Office отчетов',
	'LBL_WORD_WORD_TEMPLATES' => 'Список Office отчетов',

	'LBL_WORD_ONDEMAND_SAVE_PATH' => 'Сохранить в папку',
	
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Поддерживаются только Word (*.doc) и OpenOffice/StarOffice (*.stw)',

	'LBL_LOADER_SETUP' => 'Пожалуйста установите <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>ZuckerReports Loader</strong></a> для Microsoft Office и OpenOffice поддержки.',

	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("ru_ru", "ZuckerReports"),
	array (
		'WORD_EXPORT_TYPES' =>
		  array (
			'NewDocument' => 'Новый документ',
			'Print' => 'На печать',
			'Mail' => 'На email',
			'Fax' => 'Послать по факсу (если поддерживается Вашим оборудованием)',
		  ),
		'OPENOFFICE_EXPORT_TYPES' =>
		  array (
			'Print' => 'На печать',
			'File' => 'Сохранить в файл',
		  ),
	)
);





		
?>
