<?php

require_once('include/logging.php');
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
		//$runnable->nextrun = gmdate('Y-m-d H:i:s', time());	
		$runnable->nextrun = $timedate->get_gmt_db_datetime();
	} else {
		$runnable->nextrun = $timedate->to_db_date($_REQUEST['schedule_start'], false)." 00:00:00";
	}
}

$_REQUEST['return_id'] = $runnable->save();
$_REQUEST['return_action'] = "DetailView";
handleRedirect($return_id, "ZuckerRunnableReport");

?>
