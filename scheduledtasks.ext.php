<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$job_strings[] = 'ZuckerReportsScheduler';

function ZuckerReportsScheduler() {
	require_once("modules/ZuckerRunnableReport/RunnableReport.php");
	RunnableReport::scheduler_run_all();
	return true;
}

?>
