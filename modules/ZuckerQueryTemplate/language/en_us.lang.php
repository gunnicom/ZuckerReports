<?php
global $mod_strings;
global $mod_list_strings;

require_once("modules/ZuckerReports/language/en_us.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_QUERY_TEMPLATE_NEW' => 'New Query Template',
	'LBL_QUERY' => 'Custom Query',
	'LBL_QUERY_NAME' => 'Query Name',
	'LBL_QUERY_SQL' => 'Query',
	'LBL_QUERY_SQL_HELP' => 'Please enter the SQL query for this report. To include parameter selection, enter a "$" followed by the parameter name, and the value will be inserted at this position on report execution.',
	'LBL_QUERY_DESCRIPTION' => 'Description',

	'LBL_QUERY_ONDEMAND_COLUMN_DELIMITER' => 'Column Delimiter',
	'LBL_QUERY_ONDEMAND_ROW_DELIMITER' => 'Row Delimiter',
	'LBL_QUERY_ONDEMAND_INCLUDE_HEADER' => 'Include Header',
	)
);


$mod_list_strings = array_merge($mod_list_strings,
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
