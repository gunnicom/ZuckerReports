<?php
require_once('include/formbase.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');

$runnable = new RunnableReport();
if (!empty($_REQUEST['record'])) {
	$runnable->retrieve($_REQUEST['record']);
}
$runnable = populateFromPost("", $runnable);

if (empty($_REQUEST['schedule_interval'])) {
	$runnable->nextrun = "";
} else {
	global $timedate;
	if(empty($_REQUEST['schedule_start'])){
		$runnable->nextrun = date($timedate->get_date_time_format(), time());
	} else {
		$runnable->nextrun = date($timedate->get_date_time_format(), strtotime($_REQUEST['schedule_start']));
	}
}

$_REQUEST['return_id'] = $runnable->save();
$_REQUEST['return_action'] = "DetailView";
handleRedirect($return_id, "ZuckerRunnableReport");

?>
