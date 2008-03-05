<?php

$mod_strings = array_merge(return_module_language("nb_no", "ZuckerReports"),
	array(
		'LBL_LISTING_TEMPLATE_NEW' => 'Ny Listemal',
		'LBL_LISTING' => 'Lister',
		'LBL_LISTING_NAME' => 'Listenavn',
		'LBL_LISTING_MAINMODULE' => 'Listemodul',
		'LBL_LISTING_FILTERTYPE' => 'Filtertype',
		'LBL_LISTING_DESCRIPTION' => 'Beskrivelse',
		'LBL_LISTING_CUSTOMWHERE1' => 'Custom "where"-Clause (Prefix)',
		'LBL_LISTING_CUSTOMWHERE2' => 'Custom "where"-Clause (Suffix)',
		
		'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
		
		'LBL_LISTING_FILTER_LIST' => 'Filtere',
		'LBL_LISTING_FILTER_MODULE' => 'Modul',
		'LBL_LISTING_FILTER_FIELD' => 'Felt',
		'LBL_LISTING_FILTER_COMPARATOR' => 'Komparator',
		'LBL_LISTING_FILTER_VALUETYPE' => 'Type',

		
		'LBL_LISTING_FILTER_VALUE' => 'Velg filter verdi',
		'LBL_LISTING_FILTER_FROM_PARAM' => 'fra parameter',
		'LBL_LISTING_FILTER_FROM_ENUM' => 'eller velg',
		'LBL_LISTING_FILTER_FROM_INPUT' => 'eller fyll ut',
		
		'LBL_LISTING_FILTER_DESC' => 'Filter',
		'LBL_LISTING_FILTER_NEW' => 'Nytt filter',
		'LBL_LISTING_FILTER_ADD' => 'Legg til filter',
		'LBL_LISTING_FILTER_DELETE' => 'Fjern filter',
		
		'LBL_LISTING_ORDER_LIST' => 'Stokkekriterier',
		'LBL_LISTING_ORDER_MODULE' => 'Modul',
		'LBL_LISTING_ORDER_FIELD' => 'Felt',
		'LBL_LISTING_ORDER_ORDERTYPE' => 'Stokketype',
		'LBL_LISTING_ORDER_DESC' => 'Filter',
		'LBL_LISTING_ORDER_NEW' => 'Nytt stokkekriterie',
		'LBL_LISTING_ORDER_ADD' => 'Legg til stokkekriterie',
		'LBL_LISTING_ORDER_DELETE' => 'Fjern stokkekriterie',
		
		'LBL_LISTING_ONDEMAND_TEMPLATE' => 'Mal',
		'LBL_LISTING_ONDEMAND_TEMPLATE_LV' => 'Default ListView from ',
		'LBL_LISTING_ONDEMAND_PROSPECTLISTNAME' => 'Prospektlistenavn',	
		'LBL_LISTING_ONDEMAND_COLUMN_DELIMITER' => 'Kolonneskilletegn',
		'LBL_LISTING_ONDEMAND_ROW_DELIMITER' => 'Radskilletegn',
		'LBL_LISTING_ONDEMAND_INCLUDE_HEADER' => 'Inkluder header',
		
		'LBL_LISTING_WARNING_CHANGE_MAINMODULE' => 'Bemerk at alle filterene vil fjernes når listemodulen endres, siden filterene er knyttet til modulen!',
		
		'ERR_LISTING_NO_TEMPLATE' => 'Ingen output maler er definert for denne listen. Vennligst legg til en i modules/ZuckerListingTemplate/lists/config.php',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("en_us", "ZuckerReports"),
	array (
		'LISTING_FILTER_TYPES' =>
		  array (
			'AND' => 'List objekter som passer til ALLE filterene',
			'OR' => 'List objekter som passer til ETT av filterene',
		  ),
		'LISTING_EXPORT_TYPES' =>
		  array (
			'TABLE' => 'Inline Tabell',
			'CSV' => 'Kommaseparerte verdier (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Enkel HTML (*.html)',
		  ),
		'LISTING_EXPORT_TYPES_TARGET_LISTS' =>
		  array (
			'TABLE' => 'Inline Tabell',
			'CSV' => 'Kommaseparerte verdier (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Enkel HTML (*.html)',
			'PROSPECTLIST' => 'Prospektliste',
		  ),
		  
		'LISTING_FILTER_COMPARATORS_TEXT' =>  
		  array(
			"=" => "lik",
			"!=" => "ikke lik",
			">" => "større enn",
			">=" => "større enn eller lik",
			"<" => "mindre enn",
			"<=" => "mindre enn eller lik",
			"like" => "likner ('%'-globbing)",
		  ),
		'LISTING_FILTER_COMPARATORS_NUMERIC' =>  
		  array(
			"=" => "lik",
			"!=" => "ikke lik",
			">" => "større enn",
			">=" => "større enn eller lik",
			"<" => "mindre enn",
			"<=" => "mindre enn eller lik",
		  ),
		'LISTING_FILTER_COMPARATORS_DATE' =>  
		  array(
			">" => "større enn",
			">=" => "større enn eller lik",
			"<" => "mindre enn",
			"<=" => "mindre enn eller lik",
		  ),


	  'LISTING_ORDER_TYPES' =>  
		  array(
			"asc" => "stigende",
			"desc" => "synkende",
		  ),
	)
);





		
?>
