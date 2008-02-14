<?php
$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'ZuckerReports',
	'LBL_MODULE_TITLE' => 'ZuckerReports: Home',
	'LNK_TEMPLATE_LIST'=> 'Report and Query Templates',
	'LNK_PARAMETER_LIST'=> 'Report and Query Parameters',
	'LNK_REPORT_ONDEMAND'=> 'On-Demand Reporting',
	'LNK_REPORT_SCHEDULER'=> 'Report Scheduler',
	'LNK_ARCHIVE_LIST'=> 'Report Archive',
	'LBL_MENU_ABOUT' => 'About us',

	'LBL_TEMPLATE_LIST_HEADER' => 'Template List',
	'LBL_TEMPLATE_LIST_NAME' => 'Name',
	'LBL_TEMPLATE_LIST_TYPE' => 'Type',
	'LBL_TEMPLATE_LIST_DESCRIPTION' => 'Description',
	
	'LBL_REPORT_TEMPLATE_NEW' => 'New Report Template',
	'LBL_REPORT' => 'Report',
	'LBL_REPORT_NAME' => 'Template Name',
	'LBL_REPORT_FILENAME' => 'Template File',
	'LBL_REPORT_DESCRIPTION' => 'Description',
	'LBL_REPORT_EXPORT_AS' => 'Allowed Formats',
	'LBL_SUBREPORTS' => 'Subreports',
	'LBL_SUBREPORT' => 'Upload Subreport',
	'LBL_SUBREPORT_HELP' => 'Subreports are saved in own files. For ZuckerReports to be able to access those files, please upload them here. If you have uploaded a subreport file before, you don\'t have to upload it againg.',
	'LBL_RESOURCES' => 'Other Resources',
	'LBL_RESOURCE' => 'Upload Resource',
	'LBL_RESOURCE_HELP' => 'Report pictures and scriptlets are saved in own files. For ZuckerReports to be able to access those files, please upload them here. If you have uploaded a resource file before, you don\'t have to upload it againg.',

	'LBL_QUERY_TEMPLATE_NEW' => 'New Query Template',
	'LBL_QUERY' => 'Query',
	'LBL_QUERY_NAME' => 'Query Name',
	'LBL_QUERY_SQL' => 'Query',
	'LBL_QUERY_SQL_HELP' => 'Please enter the SQL query for this report. To include parameter selection, enter a "$" followed by the parameter name, and the value will be inserted at this position on report execution.',
	'LBL_QUERY_DESCRIPTION' => 'Description',
	'LBL_QUERY_CREATE_WORD_TEMPLATE' => 'Link new Office Template',
	'LBL_QUERY_WORD_TEMPLATES' => 'Linked Office Templates',

	'LBL_WORD_TEMPLATE_NEW' => 'New Office Template',
	'LBL_WORD' => 'Word Template',
	'LBL_OPENOFFICE' => 'OpenOffice Template',
	'LBL_WORD_NAME' => 'Template Name',
	'LBL_WORD_FILENAME' => 'Template File',
	'LBL_WORD_DESCRIPTION' => 'Description',
	'LBL_WORD_QUERY' => 'Query',

	'LBL_CREATED_BY'=> 'Created by',
	'LBL_DATE_ENTERED'=> 'Date Entered',
	'LBL_DATE_MODIFIED'=> 'Date Modified',
	'LBL_DELETED' => 'Deleted',
	'LBL_MODIFIED'=> 'Modified by',

	'LBL_SUBREPORTS' => 'Reports',
	'LBL_ZUCKERREPORT_NAME' => 'Filename',
	'LBL_ZUCKERREPORT_DESCRIPTION' => 'Description',
	'LBL_ZUCKERREPORT_PUBLISH' => 'Publish Report',
	'LBL_ZUCKERREPORT_UNPUBLISH' => 'Unpublish Report',
	'LBL_ZUCKERREPORT_PUBLISHED' => 'Published',
	'LBL_ZUCKERREPORT_UNPUBLISHED' => 'Not Published',
	'LBL_HOME_REPORTS' => 'Reports',
	
	'LBL_CONTAINER' => 'Category',
	'LBL_SUBCONTAINERS' => 'Subcategory',
	'LBL_CONTAINER_NEW' => 'New Category',
	'LBL_CONTAINER_TOP' => 'Root Category',
	'LBL_CONTAINER_SELECT' => 'Select',
	'LBL_CONTAINER_NAME' => 'Name',
	'LBL_CONTAINER_DESCRIPTION' => 'Description',
	'LBL_CONTAINER_UP' => 'Up',
	
	
	'LBL_PARAM_NEW' => 'New Report Parameter',
	'LBL_PARAM_FRIENDLYNAME' => 'Friendly Name',
	'LBL_PARAM_DEFAULTNAME' => 'Default Name',
	'LBL_PARAM_DEFAULTVALUE' => 'Default Value',
	'LBL_PARAM_DESCRIPTION' => 'Description',
	'LBL_PARAM_RANGE' => 'Selection',
	'LBL_PARAM_RANGE_LIST' => 'User-Defined List',
	'LBL_PARAM_RANGE_LIST_HELP' => 'Please enter the values for the list, separater by a colon (",").',
	'LBL_PARAM_RANGE_INPUT' => 'Direct Input',
	'LBL_PARAM_RANGE_SQL' => 'User-Defined Query',
	'LBL_PARAM_RANGE_SQL_HELP' => 'Please enter the SQL query for building the parameter selection list when executing the report. The value of the first column of the resultset will be handed to the report, the value of the second column will be shown to the user for selection.',
	'LBL_PARAM_RANGE_SQL_TEST' => 'Test SQL-Query',
	'LBL_PARAM_RANGE_MODULE' => 'SugarSuite Selection',
	


	'LBL_PARAM_LINK_LIST' => 'Parameter Bindings',
	'LBL_PARAM_LINK_NEW' => 'Parameter Selection',
	'LBL_PARAM_LINK_NAME' => 'Parameter Name',
	'LBL_PARAM_LINK_DEFAULTVALUE' => 'Default Value',
	'LBL_PARAM_LINK_PARAM' => 'Parameter',
	'LBL_PARAM_LINK_RANGE' => 'Selection',
	'LBL_PARAM_LINK_ATTACH' => 'Bind Parameter',
	'LBL_PARAM_LINK_DETACH' => 'Unbind Parameter',

	'LBL_TEMPLATE_MODULE_LIST' => 'Module Bindings',
	'LBL_TEMPLATE_MODULE_NEW' => 'Module Selection',
	'LBL_TEMPLATE_MODULE_PARAM' => 'Linked Parameter',
	'LBL_TEMPLATE_MODULE_MOD' => 'Module',
	'LBL_TEMPLATE_MODULE_ATTACH' => 'Bind to Module',
	'LBL_TEMPLATE_MODULE_DETACH' => 'Unbind from Module',
	
	'LBL_ONDEMAND_REPORT_SELECTION' => 'Report Selection',
	'LBL_ONDEMAND_FORMAT_SELECTION' => 'Format Preferences',
	'LBL_ONDEMAND_PARAMETERS' => 'Parameters',
	
	'LBL_ONDEMAND_TEMPLATE' => 'Report',
	'LBL_ONDEMAND_EXECUTE' => 'Run Report',
	'LBL_ONDEMAND_OUTPUT' => 'Output',
	'LBL_ONDEMAND_VIEW' => 'View Report',
	'LBL_ATTACH_TO' => 'Attach Report To',
	'LBL_ARCHIVE_TO' => 'Archive Report to category',
	'LBL_ONDEMAND_ERROR' => 'Error while running Report',
	'LBL_ONDEMAND_FORMAT' => 'Format',
	'LBL_ONDEMAND_COLUMN_DELIMITER' => 'Column Delimiter',
	'LBL_ONDEMAND_ROW_DELIMITER' => 'Row Delimiter',
	'LBL_ONDEMAND_INCLUDE_HEADER' => 'Include Header',

	'LBL_ONDEMAND_SAVE_PATH' => 'Save to folder',

	'LBL_ONDEMAND_BOUND' => 'Reports, Queries and Letters',
	'LBL_ONDEMAND_BOUND_ATTACH' => 'Attach result',
	'LBL_ONDEMAND_BOUND_RUN' => 'Run',
	
	
	'LBL_ARCHIVE_LIST'=> 'Reports Listing',
	
	//error messages
	'ERR_TEMPLATE_INVALID_FILE' => 'Only report design files (*.jrxml) are supported',
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Only Word (*.doc) and OpenOffice/StarOffice (*.stw) are supported',

	'LBL_LOADER_SETUP' => 'Please install the <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>ZuckerReports Loader</strong></a> for Microsoft Office and OpenOffice support.',
	
);

$mod_list_strings = array (
  'PARAM_RANGE_TYPES' =>
  array (
    'SIMPLE' => 'Direct Input',
    'SQL' => 'User-Defined Query',
    'LIST' => 'User-Defined List',
    #'MODULE' => 'SugarSuite Selection',
  ),
  'REPORT_EXPORT_TYPES' =>
  array (
    'PDF' => 'Adobe PDF (*.pdf)',
    'XLS' => 'Excel (*.xls)',
    //'CSV' => 'Comma Separated Values (*.csv)',
    'HTML' => 'HTML (*.html)',
    'XML' => 'XML (extern images, *.xml)',
    'XML_EMBED' => 'XML (embedded images, *.xml)',
  ),
  'QUERY_EXPORT_TYPES' =>
  array (
    'CSV' => 'Comma Separated Values (*.csv)',
    'HTML' => 'HTML (*.html)',
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
  'WORD_EXPORT_TYPES' =>
  array (
    'NewDocument' => 'New document',
    'Print' => 'Send to printer',
    'Mail' => 'Send as email',
    'Fax' => 'Send as fax (if supported by your enviroment)',
  ),
  'OPENOFFICE_EXPORT_TYPES' =>
  array (
    'Print' => 'Send to printer',
    'File' => 'Save as file',
  ),
);

?>
