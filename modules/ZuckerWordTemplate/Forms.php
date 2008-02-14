<?php
function get_validate_js () {

global $mod_strings;
global $app_strings;

$lbl_word_name = $mod_strings['LBL_WORD_NAME'];
$lbl_word_query = $mod_strings['LBL_WORD_QUERY'];
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

</script>

EOQ;

return $the_script;
}

?>
