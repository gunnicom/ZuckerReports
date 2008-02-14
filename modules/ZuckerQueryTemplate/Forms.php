<?php
function get_validate_js () {

global $mod_strings;
global $app_strings;

$lbl_query_name = $mod_strings['LBL_QUERY_NAME'];
$lbl_query = $mod_strings['LBL_QUERY_SQL'];
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

</script>

EOQ;

return $the_script;
}

?>
