<?php

$mod_strings = array_merge(return_module_language("nb_no", "ZuckerReports"),
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'Ny spørringsmal',
	'LBL_QUERY' => 'Egendefinert spørring',
	'LBL_QUERY_NAME' => 'Navn på spørring',
	'LBL_QUERY_SQL' => 'Spørring',
	'LBL_QUERY_SQL_HELP' => 'Vennligs skriv inn SQL spørringen for denne rapporten. For å inkludere parametervalg, skriv inn en "$" fulgt av parameternavnet, og verdien vil bli lagt inn på denne posisjonen når rapporten kjøres.<br/><br/>The following placeholders are supported as well: <br/><b>$SUGAR_USER_ID</b> - contains the ID of the currently logged on user<br/><b>$SUGAR_USER_NAME</b> - contains the name of the currently logged on user<br/><b>$SUGAR_SESSION_ID</b> - contains the ID of the current session',
	'LBL_QUERY_DESCRIPTION' => 'Beskrivelse',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	
	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Kolonneskilletegn',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Radskilletegn',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Inkluder header',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("nb_no", "ZuckerReports"),
	array (
		  'QUERY_EXPORT_TYPES' =>
		  array (
			'CSV' => 'Kommaseparerte verdier (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Enkel HTML (*.html)',
			'TABLE' => 'Inline tabell',
		  ),
		  'COL_DELIMS' =>
		  array (
			',' => 'Kolon (,)',
			';' => 'Semikolon (;)',
			'tab' => 'Tab (\t)',
			'.' => 'Punktum (.)',
		  ),
		  'ROW_DELIMS' =>
		  array (
			'newline' => 'Linjeskift (\n)',
		  ),
	)
);

	
?>
