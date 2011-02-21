<?php

$mod_strings = array_merge(return_module_language("ru_ru", "ZuckerReports"),
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Новый Jasper отчет',
	'LBL_ASSIGNED_USER_ID' => 'Направление:',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Имя шаблона',
	'LBL_REPORT_FILENAME' => 'Файл шаблона (*.jrxml)',
	'LBL_REPORT_DESCRIPTION' => 'Описание',
	'LBL_REPORT_EXPORT_AS' => 'Поддерживаемые форматы',
	'LBL_SUBREPORTS' => 'Под-отчеты',
	'LBL_SUBREPORT' => 'Загрузить под-отчет',
	'LBL_SUBREPORT_HELP' => 'Под-отчеты хранятся в собственных файлах. Что бы иметь возможность доступа к ним для JasperReports, пожалуйста загрузите их здесь. Если Вы уже загрузили под-отчет, не загружайте его снова.',
	'LBL_RESOURCES' => 'Другие файлы',
	'LBL_RESOURCE' => 'Загрузить файл',
	'LBL_RESOURCE_HELP' => 'Рисунки для отчетов хранятся в собственных файлах. Что бы JasperReports имел возможность доступа к ним, пожалуйста загрузите их здесь. Если Вы уже загрузили картинки, не загружайте их снова.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Поддерживаются только файлы (*.jrxml)',
	)
);

$mod_list_strings = array_merge(return_mod_list_strings_language("ru_ru", "ZuckerReports"),
	array (
		  'REPORT_EXPORT_TYPES' =>
		  array (
			'PDF' => 'Adobe PDF (*.pdf)',
			'XLS' => 'Excel (*.xls)',
			'HTML' => 'HTML (*.html)',
			'XML' => 'XML (внешние рисунки, *.xml)',
			'XML_EMBED' => 'XML (включая рисунки, *.xml)',
		  ),
 	)
);


?>
