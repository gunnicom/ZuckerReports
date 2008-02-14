<?php 
	require_once("modules/ZuckerReports/config.php");
	
	if (!empty($zuckerreports_config["index_include"])) {
		include($zuckerreports_config["index_include"]);
	} else {
		include("modules/ZuckerReportContainer/DetailView.php");
	}
?>
