<?php

$mod_strings = array_merge(return_module_language("ge_ge", "ZuckerReports"),
	array(
		'LBL_LISTING_TEMPLATE_NEW' => 'Neue Listenvorlage',
		'LBL_LISTING' => 'Liste',
		'LBL_LISTING_NAME' => 'Listenname',
		'LBL_LISTING_MAINMODULE' => 'Listen-Modul',
		'LBL_LISTING_FILTERTYPE' => 'Filtereinstellung',
		'LBL_LISTING_DESCRIPTION' => 'Beschreibung',
		'LBL_LISTING_CUSTOMWHERE1' => 'Zus&auml;tzliche "where"-Klausel (Prefix)',
		'LBL_LISTING_CUSTOMWHERE2' => 'Zus&auml;tzliche "where"-Klausel (Suffix)',

		'LBL_ASSIGNED_USER_ID' => 'Zugewiesen zu:',
		
		'LBL_LISTING_FILTER_LIST' => 'Filterkriterien',
		'LBL_LISTING_FILTER_MODULE' => 'Modul',
		'LBL_LISTING_FILTER_FIELD' => 'Feld',
		'LBL_LISTING_FILTER_COMPARATOR' => 'Vergleichsoperation',
		'LBL_LISTING_FILTER_VALUETYPE' => 'Typ',

		'LBL_LISTING_FILTER_VALUE' => 'Filterwert ausw&auml;hlen',
		'LBL_LISTING_FILTER_FROM_PARAM' => 'aus Parameter',
		'LBL_LISTING_FILTER_FROM_ENUM' => 'oder ausw&auml;hlen',
		'LBL_LISTING_FILTER_FROM_INPUT' => 'oder eingeben',
		
		'LBL_LISTING_FILTER_DESC' => 'Filterkriterium',
		'LBL_LISTING_FILTER_NEW' => 'Neuer Filter',
		'LBL_LISTING_FILTER_ADD' => 'Filter hinzuf&uuml;gen',
		'LBL_LISTING_FILTER_DELETE' => 'Filter l&ouml;schen',
		
		'LBL_LISTING_ORDER_LIST' => 'Sortierkriterien',
		'LBL_LISTING_ORDER_MODULE' => 'Modul',
		'LBL_LISTING_ORDER_FIELD' => 'Feld',
		'LBL_LISTING_ORDER_ORDERTYPE' => 'Sortierrichtung',
		'LBL_LISTING_ORDER_DESC' => 'Sortierkriterium',
		'LBL_LISTING_ORDER_NEW' => 'Neues Sortierkriterium',
		'LBL_LISTING_ORDER_ADD' => 'Sortierkriterium hinzuf&uuml;gen',
		'LBL_LISTING_ORDER_DELETE' => 'Sortierkriterium l&ouml;schen',
		
		'LBL_LISTING_ONDEMAND_TEMPLATE' => 'Listenvorlage',
		'LBL_LISTING_ONDEMAND_TEMPLATE_LV' => 'Standard ListView aus ',
		'LBL_LISTING_ONDEMAND_PROSPECTLISTNAME' => 'Prospektlisten-Name',	
		'LBL_LISTING_ONDEMAND_COLUMN_DELIMITER' => 'Spaltentrennzeichen',
		'LBL_LISTING_ONDEMAND_ROW_DELIMITER' => 'Zeilentrennzeichen',
		'LBL_LISTING_ONDEMAND_INCLUDE_HEADER' => 'Kopfzeile',
		
		'LBL_LISTING_WARNING_CHANGE_MAINMODULE' => 'Achtung: Ändern des Listen-Moduls f&uuml;hrt zur automatischen Entfernung aller f&uuml;r diese Listenvorlage momentan definierten Filter- und Sortierkriterien!',
		
		'ERR_LISTING_NO_TEMPLATE' => 'F&uuml;r diese Listenvorlage wurden keine Ausgabevorlagen gefunden. Bitte nehmen Sie die notwendigen Einstellungen vor in modules/ZuckerListingTemplate/lists/config.php',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("ge_ge", "ZuckerReports"),
	array (
		'LISTING_FILTER_TYPES' =>
		  array (
			'AND' => 'ALLE Filter m&uuml;ssen zutreffen',
			'OR' => 'EINER der Filter muß zutreffen',
		  ),
		'LISTING_EXPORT_TYPES' =>
		  array (
			'TABLE' => 'Online Tabelle',
			'CSV' => 'Comma Separated Values (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Einfachstes HTML (*.html)',
		  ),
		'LISTING_EXPORT_TYPES_TARGET_LISTS' =>
		  array (
			'TABLE' => 'Online Tabelle',
			'CSV' => 'Comma Separated Values (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Einfachstes HTML (*.html)',
			'PROSPECTLIST' => 'Prospektliste',
		  ),
		'LISTING_FILTER_COMPARATORS_TEXT' =>  
		  array(
			"=" => "gleich",
			"!=" => "ungleich",
			">" => "gr&ouml;ßer",
			">=" => "gr&ouml;ßer oder gleich",
			"<" => "kleiner",
			"<=" => "kleiner oder gleich",
			"like" => "like ('%'-globbing)",
		  ),
		'LISTING_FILTER_COMPARATORS_NUMERIC' =>  
		  array(
			"=" => "gleich",
			"!=" => "ungleich",
			">" => "gr&ouml;ßer",
			">=" => "gr&ouml;ßer oder gleich",
			"<" => "kleiner",
			"<=" => "kleiner oder gleich",
		  ),
		'LISTING_FILTER_COMPARATORS_DATE' =>  
		  array(
			">" => "gr&ouml;ßer",
			">=" => "gr&ouml;ßer oder gleich",
			"<" => "kleiner",
			"<=" => "kleiner oder gleich",
		  ),


	  'LISTING_ORDER_TYPES' =>  
		  array(
			"asc" => "aufsteigend",
			"desc" => "absteigend",
		  ),
	)
);





		
?>