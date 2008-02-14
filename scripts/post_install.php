<?php


function post_install( ) {
	
	//** Includes **//
	require_once("include/utils.php");
	require_once("include/utils/file_utils.php");
	require_once($_REQUEST['unzip_dir'] . "/manifest.php");
	include_once('config.php');
	require_once('include/database/PearDatabase.php');

	$sugar_home_dir = getCwd();

	if (is_file('modules/ZuckerReportContainer/ReportContainer.php')) {
		require_once('modules/ZuckerReportContainer/ReportContainer.php');

		$seed = new ReportContainer();
		$seed->name = "My Reports";
		$seed->save();
		
		$seed = new ReportContainer();
		$seed->name = "Other Reports";
		$seed->save();
	}
	if (is_file('modules/ZuckerReportParameter/ReportParameter.php')) {
		require_once('modules/ZuckerReportParameter/ReportParameter.php');

		$seed = new ReportParameter();
		$seed->friendly_name = "Account";
		$seed->default_name = "ACCOUNT_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range = "SQL";
		$seed->range_options = 'select id, name from accounts where deleted = 0 order by name';
		$seed->save();
		
		$seed = new ReportParameter();
		$seed->friendly_name = "Contact";
		$seed->default_name = "CONTACT_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range = "SQL";
		$seed->range_options = 'select id, concat(last_name, concat(\" \", first_name)) as name from contacts where deleted = 0 order by last_name';
		$seed->save();

		$seed = new ReportParameter();
		$seed->friendly_name = "Meeting";
		$seed->default_name = "MEETING_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range = "SQL";
		$seed->range_options = 'select id, concat(name, \" (\", date_start, \" \", time_start, \")\") from meetings where deleted = 0 order by name, date_start, time_start';
		$seed->save();

		$seed = new ReportParameter();
		$seed->friendly_name = "Project";
		$seed->default_name = "PROJECT_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range = "SQL";
		$seed->range_options = 'select id, name from project where deleted = 0 order by name';
		$seed->save();
		
		
	}

}

?>
