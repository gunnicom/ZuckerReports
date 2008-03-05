<?php
$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'ZuckerReports',
	'LBL_MODULE_TITLE' => 'ZuckerReports: Home',
	'LNK_TEMPLATE_LIST'=> 'Report and Query Templates',
	'LNK_PARAMETER_LIST'=> 'Report and Query Parameters',
	'LNK_REPORT_ONDEMAND'=> 'On-Demand Reporting',
	'LNK_RUNNABLE_REPORTS' => 'Report Scheduler',
	'LNK_ARCHIVE_LIST'=> 'Report Archive',
	'LBL_MENU_ABOUT' => 'About us',

	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	'LBL_ASSIGNED_TEAM' => 'Team:',
	
	'LBL_TEMPLATE_LIST_HEADER' => 'Template List',
	'LBL_TEMPLATE_LIST_NAME' => 'Name',
	'LBL_TEMPLATE_LIST_TYPE' => 'Type',
	'LBL_TEMPLATE_LIST_DESCRIPTION' => 'Description',
	
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
	
	'LBL_RUNNABLEREPORT' => 'Scheduled Report',
	'LBL_RUNNABLEREPORT_NAME' => 'Name',
	'LBL_RUNNABLEREPORT_DESCRIPTION' => 'Description',
	'LBL_RUNNABLEREPORT_SETTINGS' => 'Settings (encoded)',
	'LBL_RUNNABLEREPORT_NEXTRUN' => 'Next Run',
	'LBL_RUNNABLEREPORT_START' => 'Schedule Start',
	'LBL_RUNNABLEREPORT_INTERVAL' => 'Schedule Interval',
	'LBL_RUNNABLEREPORT_LASTLOG' => 'Last Log',
	'LBL_RUNNABLEREPORT_TESTRUN' => 'Test Schedule',
	
	'LBL_PARAM_NEW' => 'New Report Parameter',
	'LBL_PARAM_FRIENDLYNAME' => 'Friendly Name',
	'LBL_PARAM_DEFAULTNAME' => 'Default Name',
	'LBL_PARAM_DEFAULTVALUE' => 'Default Value',
	'LBL_PARAM_DESCRIPTION' => 'Description',
	'LBL_PARAM_RANGE' => 'Selection',
	'LBL_PARAM_RANGE_LIST' => 'User-Defined List',
	'LBL_PARAM_RANGE_LIST_HELP' => 'Please enter the values for the list, separater by a colon (",").',
	'LBL_PARAM_RANGE_DROPDOWN' => 'Drop-Down List',
	'LBL_PARAM_RANGE_INPUT' => 'Direct Input',
	'LBL_PARAM_RANGE_SQL' => 'User-Defined Query',
	'LBL_PARAM_RANGE_SQL_HELP' => 'Please enter the SQL query for building the parameter selection list when executing the report. The value of the first column of the resultset will be handed to the report, the value of the second column will be shown to the user for selection.',
	'LBL_PARAM_RANGE_SQL_TEST' => 'Test SQL-Query',
	'LBL_PARAM_RANGE_SCRIPT' => 'PHP Script',
	'LBL_PARAM_RANGE_SCRIPT_DISABLED' => 'PHP Scripting has been disabled. Please enable it in modules/ZuckerReports/config.php.',
	'LBL_PARAM_RANGE_SCRIPT_HELP' => 'Please enter any PHP code you want. Finish with a "return"-statement.',

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
	'LBL_ONDEMAND_ATTACH_SELECTION' => 'Attach',
	'LBL_ONDEMAND_PARAMETERS' => 'Parameters',
	
	'LBL_ONDEMAND_TEMPLATE' => 'Report',
	'LBL_ONDEMAND_EXECUTE' => 'Run Report',
	'LBL_ADD_SCHEDULER' => 'Save for later execution',
	'LBL_ONDEMAND_OUTPUT' => 'Output',
	'LBL_ONDEMAND_RESULT' => 'Report Result',
	'LBL_ONDEMAND_VIEW' => 'View Report',
	'LBL_ATTACH_TO' => 'Attach Report To',
	'LBL_ARCHIVE_TO' => 'Archive Report to category',
	'LBL_ONDEMAND_ERROR' => 'Error while running Report',
	'LBL_ONDEMAND_FORMAT' => 'Format',
	'LBL_SEND_EMAIL' => 'Send as Email To',
	'LBL_SEND_EMAIL_HINTS' => '(separate multiple email recipients by using a ",")',
	'LBL_SEND_EMAIL_SUBJECT' => 'ZuckerReports Notification: %s',
	'LBL_SEND_EMAIL_BODY' => "Attached you can find an auto-generated report sent to you from ZuckerReports. \n\nCreated on: %s\nReport: %s\n",
	'LBL_SEND_EMAIL_OK' => 'Sent Email To %s',
	
	
	'LBL_ONDEMAND_BOUND' => 'Reports, Queries and Letters',
	'LBL_ONDEMAND_BOUND_ATTACH' => 'Attach result',
	'LBL_ONDEMAND_BOUND_RUN' => 'Run',
	
	'LBL_ARCHIVE_LIST'=> 'Reports Listing',

	
);

$mod_list_strings = array (
  'PARAM_RANGE_TYPES' =>
  array (
    'SIMPLE' => 'Direct Input',
	'DATE' => 'Date Input',
	'DATE_NOW' => 'Current Time and Date',
	'DATE_ADD' => 'Future Timestamp',
	'DATE_SUB' => 'Past Timestamp',
    'SQL' => 'User-Defined Query',
    'LIST' => 'User-Defined List',
	'DROPDOWN' => 'Drop-Down List',
	'CURRENT_USER' => 'Current User',
	'SCRIPT' => 'PHP Script',
  ),
  'PARAM_DATE_TYPES' =>
  array (
	'MINUTE' => 'Minute(s)',
	'HOUR' => 'Hour(s)',
	'DAY' => 'Day(s)',
	'WEEK' => 'Week(s)',
	'MONTH' => 'Month(s)',
	'YEAR' => 'Year(s)',
  ),
  'SCHEDULE_INTERVALS'=>array(
 	''=>'Inactive',
 	'3600'=>'Hourly',
 	'21600'=>'Every 6 Hours',
 	'43200'=>'Every 12 Hours',
 	'86400'=>'Daily',
 	'604800'=>'Weekly',
 	'1209600'=>'Every 2 Weeks',
 	'2419200'=>'Every 4 Weeks',
 	),
  
  
  
);

?>
