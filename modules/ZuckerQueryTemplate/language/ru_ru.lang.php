<?php

$mod_strings = array_merge(return_module_language("ru_ru", "ZuckerReports"),
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Новый запрос SQL',
	'LBL_QUERY' => 'Запрос',
	'LBL_QUERY_NAME' => 'Название запроса',
	'LBL_QUERY_SQL' => 'SQL запрос',
	'LBL_QUERY_SQL_HELP' => 'Пожалуйста введите SQL запрос для этого отчета. Чтобы включить параметр в запрос, введите "$" затем имя параметра, и его значение появится в выполненном отчете.<br/><br/>Примеры: <br/><b>$SUGAR_USER_ID</b> - ID текущего пользователя<br/><b>$SUGAR_USER_NAME</b> - имя текущего пользователя<br/><b>$SUGAR_SESSION_ID</b> - ID текущей сессии',
	'LBL_QUERY_DESCRIPTION' => 'Описание',

	'LBL_ASSIGNED_USER_ID' => 'Направление:',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Разделитель строк',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Разделитель  столбцов',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Включить заголовок',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("ru_ru", "ZuckerReports"),
	array (
		  'QUERY_EXPORT_TYPES' =>
		  array (
			'CSV' => 'CSV (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
			'TABLE' => 'Таблица',
		  ),
		  'COL_DELIMS' =>
		  array (
			',' => 'Запятая (,)',
			';' => 'Точка с запятой (;)',
			'tab' => 'Табуляция (\t)',
			'.' => 'Точка (.)',
		  ),
		  'ROW_DELIMS' =>
		  array (
			'newline' => 'Перевод строки (\n)',
		  ),
	)
);

	
?>
