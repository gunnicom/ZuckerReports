<?php

$mod_strings = array_merge(return_module_language("ru_ru", "ZuckerReports"),
	array(
		'LBL_LISTING_TEMPLATE_NEW' => 'Новый список-отчет',
		'LBL_LISTING' => 'Список',
		'LBL_LISTING_NAME' => 'Название списка',
		'LBL_LISTING_MAINMODULE' => 'Категория',
		'LBL_LISTING_FILTERTYPE' => 'Тип фильтра',
		'LBL_LISTING_DESCRIPTION' => 'Описание',
		'LBL_LISTING_CUSTOMWHERE1' => 'Начинается на - ',
		'LBL_LISTING_CUSTOMWHERE2' => 'Оканчивается - ',

		'LBL_ASSIGNED_USER_ID' => 'Направление:',
		
		'LBL_LISTING_FILTER_LIST' => 'Фильтры',
		'LBL_LISTING_FILTER_MODULE' => 'Категория',
		'LBL_LISTING_FILTER_FIELD' => 'Поле',
		'LBL_LISTING_FILTER_COMPARATOR' => 'Сравнение',
		'LBL_LISTING_FILTER_VALUETYPE' => 'Тип',

		
		'LBL_LISTING_FILTER_VALUE' => 'Выберете значение фильтра',
		'LBL_LISTING_FILTER_FROM_PARAM' => 'из параметра',
		'LBL_LISTING_FILTER_FROM_ENUM' => 'или выберите',
		'LBL_LISTING_FILTER_FROM_INPUT' => 'или введите',
		
		'LBL_LISTING_FILTER_DESC' => 'Фильтр',
		'LBL_LISTING_FILTER_NEW' => 'Новый фильтр',
		'LBL_LISTING_FILTER_ADD' => 'Добавить фильтр',
		'LBL_LISTING_FILTER_DELETE' => 'Удалить фильтр',
		
		'LBL_LISTING_ORDER_LIST' => 'Критерии заказа',
		'LBL_LISTING_ORDER_MODULE' => 'Категория',
		'LBL_LISTING_ORDER_FIELD' => 'Поле',
		'LBL_LISTING_ORDER_ORDERTYPE' => 'Тип заказа',
		'LBL_LISTING_ORDER_DESC' => 'Фильтр',
		'LBL_LISTING_ORDER_NEW' => 'Новый критерий заказа',
		'LBL_LISTING_ORDER_ADD' => 'Добавить критерий заказа',
		'LBL_LISTING_ORDER_DELETE' => 'Удалить критерий заказа',
		
		'LBL_LISTING_ONDEMAND_TEMPLATE' => 'Шаблон',
		'LBL_LISTING_ONDEMAND_TEMPLATE_LV' => 'Список по умолчанию ',
		'LBL_LISTING_ONDEMAND_PROSPECTLISTNAME' => 'Название списка',	
		'LBL_LISTING_ONDEMAND_COLUMN_DELIMITER' => 'Разделитель строк',
		'LBL_LISTING_ONDEMAND_ROW_DELIMITER' => 'Разделитель  столбцов',
		'LBL_LISTING_ONDEMAND_INCLUDE_HEADER' => 'Включить заголовок',
		
		'LBL_LISTING_WARNING_CHANGE_MAINMODULE' => 'Внимание: изменение списка категорий удалит все фильтры, включая фильтры этой категории!',
		
		'ERR_LISTING_NO_TEMPLATE' => 'Нет шаблонов определенных для этой записи. Пожалуйста добавьте в /ZuckerListingTemplate/lists/config.php',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("ru_ru", "ZuckerReports"),
	array (
		'LISTING_FILTER_TYPES' =>
		  array (
			'AND' => 'Список элементов соответствует ВСЕМ из фильтра',
			'OR' => 'Список элементов соответствует ОДНОМУ из фильтра',
		  ),
		'LISTING_EXPORT_TYPES' =>
		  array (
			'TABLE' => 'Таблица',
			'CSV' => 'CSV (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
		  ),
		'LISTING_EXPORT_TYPES_TARGET_LISTS' =>
		  array (
			'TABLE' => 'Таблица',
			'CSV' => 'CSV (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
			'PROSPECTLIST' => 'Список',
		  ),
		  
		'LISTING_FILTER_COMPARATORS_TEXT' =>  
		  array(
			"=" => "равно",
			"!=" => "не равно",
			">" => "больше",
			">=" => "больше или равно",
			"<" => "меньше",
			"<=" => "меньше или равно",
			"like" => "like ('%'-подстановка)",
		  ),
		'LISTING_FILTER_COMPARATORS_NUMERIC' =>  
		  array(
			"=" => "равно",
			"!=" => "не равно",
			">" => "больше",
			">=" => "больше или равно",
			"<" => "меньше",
			"<=" => "меньше или равноl",
		  ),
		'LISTING_FILTER_COMPARATORS_DATE' =>  
		  array(
			">" => "больше",
			">=" => "больше или равно",
			"<" => "меньше",
			"<=" => "меньше или равно",
		  ),


	  'LISTING_ORDER_TYPES' =>  
		  array(
			"asc" => "по возрастанию",
			"desc" => "по убыванию",
		  ),
	)
);





		
?>

