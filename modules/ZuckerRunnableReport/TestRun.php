<?php
require_once('include/formbase.php');
require_once('modules/ZuckerRunnableReport/RunnableReport.php');

$runnable = new RunnableReport();
$runnable->retrieve($_REQUEST['record']);

$runnable->run(false);


$_REQUEST['return_id'] = $runnable->id;
$_REQUEST['return_action'] = "DetailView";
handleRedirect($runnable->id, "ZuckerRunnableReport");

?>
