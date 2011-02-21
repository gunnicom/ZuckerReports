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
		$seed->name = "2007";
		$seed->save();

		for ($i = 1; $i <= 4; $i++) {
			$qseed = new ReportContainer();
			$qseed->name = "Q".$i." 2007";
			$qseed->parent_id = $seed->id;
			$qseed->save();
		}

		$seed = new ReportContainer();
		$seed->name = "2008";
		$seed->save();

		for ($i = 1; $i <= 4; $i++) {
			$qseed = new ReportContainer();
			$qseed->name = "Q".$i." 2008";
			$qseed->parent_id = $seed->id;
			$qseed->save();
		}

		
		$seed = new ReportContainer();
		$seed->name = "Archive";
		$seed->save();
	}
	if (is_file('modules/ZuckerReportParameter/ReportParameter.php')) {
		require_once('modules/ZuckerReportParameter/ReportParameter.php');

		$seed = new ReportParameter();
		$seed->friendly_name = "Account";
		$seed->default_name = "ACCOUNT_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range_name = "SQL";
		$seed->range_options = 'select id, name from accounts where deleted = 0 order by name';
		$seed->save();
		
		$seed = new ReportParameter();
		$seed->friendly_name = "Contact";
		$seed->default_name = "CONTACT_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range_name = "SQL";
		$seed->range_options = 'select id, concat(last_name, concat(" ", first_name)) as name from contacts where deleted = 0 order by last_name';
		$seed->save();

		$seed = new ReportParameter();
		$seed->friendly_name = "Meeting";
		$seed->default_name = "MEETING_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range_name = "SQL";
		$seed->range_options = 'select id, concat(name, " (", date_start, " ", time_start, ")") from meetings where deleted = 0 order by name, date_start, time_start';
		$seed->save();

		$seed = new ReportParameter();
		$seed->friendly_name = "Project";
		$seed->default_name = "PROJECT_ID";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range_name = "SQL";
		$seed->range_options = 'select id, name from project where deleted = 0 order by name';
		$seed->save();
		
		$seed = new ReportParameter();
		$seed->friendly_name = "Current User";
		$seed->default_name = "CURRENT_USER";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range_name = "CURRENT_USER";
		$seed->save();

		$seed = new ReportParameter();
		$seed->friendly_name = "My Script";
		$seed->default_name = "MY_SCRIPT";
		$seed->default_value = "";
		$seed->description = "";
		$seed->range_name = "SCRIPT";
		$seed->range_options = "return '%';";
		$seed->save();
		
	}
	if (is_file('modules/ZuckerReports/config.php')) {
		echo "<h3>Note: Please remember to check your Java and/or ZIP installation - you may configure it in the file modules/ZuckerReports/config.php! This is not an error message, but a reminder to check your environment according to the ZuckerReports manual.</h3><br/>";
		echo "<h3>Note: If you plan to use time-triggered reporting, there are additional steps involved - please follow the steps described in the ZuckerReports manual available at <a href=\"http://www.zuckerfriends.com\" target=\"_blank\">ZuckerFriends</a>.</h3><br/>";
		echo "<h2>ZuckerReports is free for Sugar Open Source users. Commercial licenses including support and upgrades are available, please contact us at <a href=\"mailto:office@zuckerfriends.com\">office@zuckerfriends.com</a>.</h3><br/>";
	}
}

?>
