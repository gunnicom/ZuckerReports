<?php

$mod_strings = array_merge(return_module_language("en_us", "ZuckerReports"),
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'New Query Template',
	'LBL_QUERY' => 'Custom Query',
	'LBL_QUERY_NAME' => 'Query Name',
	'LBL_QUERY_SQL' => 'Query',
	'LBL_QUERY_SQL_HELP' => 'Please enter the SQL query for this report. To include parameter selection, enter a "$" followed by the parameter name, and the value will be inserted at this position on report execution.<br/><br/>The following placeholders are supported as well: <br/><b>$SUGAR_USER_ID</b> - contains the ID of the currently logged on user<br/><b>$SUGAR_USER_NAME</b> - contains the name of the currently logged on user<br/><b>$SUGAR_SESSION_ID</b> - contains the ID of the current session',
	'LBL_QUERY_DESCRIPTION' => 'Description',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Column Delimiter',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Row Delimiter',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Include Header',
	)
);


$mod_list_strings = array_merge(return_mod_list_strings_language("en_us", "ZuckerReports"),
	array (
		  'QUERY_EXPORT_TYPES' =>
		  array (
			'CSV' => 'Comma Separated Values (*.csv)',
			'HTML' => 'HTML (*.html)',
			'SIMPLEHTML' => 'Simple HTML (*.html)',
			'TABLE' => 'Inline Table',
		  ),
		  'COL_DELIMS' =>
		  array (
			',' => 'Colon (,)',
			';' => 'Semicolon (;)',
			'tab' => 'Tab (\t)',
			'.' => 'Dot (.)',
		  ),
		  'ROW_DELIMS' =>
		  array (
			'newline' => 'Newline (\n)',
		  ),
	)
);

	
?>
