<?php
function get_validate_js () {

global $mod_strings;
global $app_strings;

$lbl_report_name = $mod_strings['LBL_REPORT_NAME'];
$lbl_query_name = $mod_strings['LBL_QUERY_NAME'];
$lbl_query = $mod_strings['LBL_QUERY_SQL'];
$lbl_word_name = $mod_strings['LBL_WORD_NAME'];
$lbl_word_query = $mod_strings['LBL_WORD_QUERY'];
$lbl_param_friendlyname = $mod_strings['LBL_PARAM_FRIENDLYNAME'];
$lbl_param_defaultname = $mod_strings['LBL_PARAM_DEFAULTNAME'];
$lbl_paramlink_name = $mod_strings['LBL_PARAM_LINK_NAME'];
$lbl_container_name = $mod_strings['LBL_CONTAINER_NAME'];
$lbl_runnablereport_name = $mod_strings['LBL_RUNNABLEREPORT_NAME'];
$lbl_runnablereport_interval = $mod_strings['LBL_RUNNABLEREPORT_INTERVAL'];


$err_missing_required_fields = $app_strings['ERR_MISSING_REQUIRED_FIELDS'];

$the_script  = <<<EOQ

<script type="text/javascript" language="Javascript">
function trim(s) {
	while (s.substring(0,1) == " ") {
		s = s.substring(1, s.length);
	}
	while (s.substring(s.length-1, s.length) == ' ') {
		s = s.substring(0,s.length-1);
	}

	return s;
}

function verify_report_template_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_report_name";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function verify_query_template_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_query_name";
	}
	if (trim(form.sql.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_query";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function verify_word_template_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_word_name";
	}
	if (trim(form.querytemplate_id.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_word_query";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}



function verify_container_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_container_name";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function verify_runnablereport_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_runnablereport_name";
	}


	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function verify_param_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.friendly_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_param_friendlyname";
	}
	if (trim(form.default_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_param_defaultname";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function verify_paramlink_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.link_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_paramlink_name";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	return true;
}

function verify_modulelink_data(form) {
	return true;
}
</script>

EOQ;

return $the_script;
}

?>
