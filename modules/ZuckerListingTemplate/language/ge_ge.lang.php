<?php
global $mod_strings;
global $mod_list_strings;

require_once("modules/ZuckerReports/language/ge_ge.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
		'LBL_LISTING_TEMPLATE_NEW' => 'Neue Listenvorlage',
		'LBL_LISTING' => 'Liste',
		'LBL_LISTING_NAME' => 'Listenname',
		'LBL_LISTING_MAINMODULE' => 'Listen-Modul',
		'LBL_LISTING_FILTERTYPE' => 'Filtereinstellung',
		'LBL_LISTING_DESCRIPTION' => 'Beschreibung',
		
		'LBL_LISTING_FILTER_LIST' => 'Filterkriterien',
		'LBL_LISTING_FILTER_MODULE' => 'Modul',
		'LBL_LISTING_FILTER_FIELD' => 'Feld',
		'LBL_LISTING_FILTER_COMPARATOR' => 'Vergleichsoperation',
		'LBL_LISTING_FILTER_VALUETYPE' => 'Typ',

		'LBL_LISTING_FILTER_VALUE' => 'Filterwert ausw�hlen',
		'LBL_LISTING_FILTER_FROM_PARAM' => 'aus Parameter',
		'LBL_LISTING_FILTER_FROM_ENUM' => 'oder ausw�hlen',
		'LBL_LISTING_FILTER_FROM_INPUT' => 'oder eingeben',
		
		'LBL_LISTING_FILTER_DESC' => 'Filterkriterium',
		'LBL_LISTING_FILTER_NEW' => 'Neuer Filter',
		'LBL_LISTING_FILTER_ADD' => 'Filter hinzuf�gen',
		'LBL_LISTING_FILTER_DELETE' => 'Filter l�schen',
		
		'LBL_LISTING_ORDER_LIST' => 'Sortierkriterien',
		'LBL_LISTING_ORDER_MODULE' => 'Modul',
		'LBL_LISTING_ORDER_FIELD' => 'Feld',
		'LBL_LISTING_ORDER_ORDERTYPE' => 'Sortierrichtung',
		'LBL_LISTING_ORDER_DESC' => 'Sortierkriterium',
		'LBL_LISTING_ORDER_NEW' => 'Neues Sortierkriterium',
		'LBL_LISTING_ORDER_ADD' => 'Sortierkriterium hinzuf�gen',
		'LBL_LISTING_ORDER_DELETE' => 'Sortierkriterium l�schen',
		
		'LBL_LISTING_ONDEMAND_TEMPLATE' => 'Listenvorlage',
		'LBL_LISTING_ONDEMAND_PROSPECTLISTNAME' => 'Prospektlisten-Name',	
		'LBL_LISTING_ONDEMAND_COLUMN_DELIMITER' => 'Spaltentrennzeichen',
		'LBL_LISTING_ONDEMAND_ROW_DELIMITER' => 'Zeilentrennzeichen',
		'LBL_LISTING_ONDEMAND_INCLUDE_HEADER' => 'Kopfzeile',
		
		'LBL_LISTING_WARNING_CHANGE_MAINMODULE' => 'Achtung: �ndern des Listen-Moduls f�hrt zur automatischen Entfernung aller f�r diese Listenvorlage momentan definierten Filter- und Sortierkriterien!',
		
		'ERR_LISTING_NO_TEMPLATE' => 'F�r diese Listenvorlage wurden keine Ausgabevorlagen gefunden. Bitte nehmen Sie die notwendigen Einstellungen vor in modules/ZuckerListingTemplate/lists/config.php',
	)
);


$mod_list_strings = array_merge($mod_list_strings,
	array (
		'LISTING_FILTER_TYPES' =>
		  array (
			'AND' => 'ALLE Filter m�ssen zutreffen',
			'OR' => 'EINER der Filter mu� zutreffen',
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
			">" => "gr��er",
			">=" => "gr��er oder gleich",
			"<" => "kleiner",
			"<=" => "kleiner oder gleich",
			"like" => "like ('%'-globbing)",
		  ),
		'LISTING_FILTER_COMPARATORS_NUMERIC' =>  
		  array(
			"=" => "gleich",
			"!=" => "ungleich",
			">" => "gr��er",
			">=" => "gr��er oder gleich",
			"<" => "kleiner",
			"<=" => "kleiner oder gleich",
		  ),
		'LISTING_FILTER_COMPARATORS_DATE' =>  
		  array(
			">" => "gr��er",
			">=" => "gr��er oder gleich",
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