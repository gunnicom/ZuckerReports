<?php 
require_once("data/SugarBean.php");

function set_report_parameter_temp($name, $value) {
	$bean = new SugarBean();
	$bean->db->query("delete from zucker_reporttemp where name='".$name."'");
	$bean->db->query("insert into zucker_reporttemp(name, value) values('".$name."', '".$value."')");
}

?>
