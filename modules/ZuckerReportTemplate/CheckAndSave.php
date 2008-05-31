<?php
require_once('include/formbase.php');
require_once('include/upload_file.php');
require_once('modules/ZuckerReportTemplate/ReportTemplate.php');

$template = new ReportTemplate();
if (!empty($_REQUEST['record'])) {
	$template = $template->retrieve($_REQUEST['record']);
	if ($template == null) { echo "no access"; exit; }
}
$template = populateFromPost("", $template);
if(!$template->ACLAccess('Save')){
	ACLController::displayNoAccess(true);
	sugar_cleanup(true);
}
	
$template->set_export_from_checkboxes();

$upload_file = new UploadFile('reportfile');

$errors = array();

$success = TRUE;
if (isset($_FILES['reportfile']) && $upload_file->confirm_upload()) {
	$success = $template->set_reportfile($_FILES['reportfile']['tmp_name'], $upload_file->original_file_name);
	if (!$success) {
		$errors[] = "error compiling report ".$upload_file->original_file_name." - ".$template->report_output;
	}
}

for ($i = 0; $i < 5; $i++) {
	$paramName = "subreport".$i;
	$upload_file = new UploadFile($paramName);
	if (isset($_FILES[$paramName]) && $upload_file->confirm_upload()) {
		$success = $template->add_subreportfile($_FILES[$paramName]['tmp_name'], $upload_file->original_file_name);
		if (!$success) {
			$errors[] = "error compiling subreport ".$upload_file->original_file_name." - ".$template->report_output;
		}
	}
}

for ($i = 0; $i < 5; $i++) {
	$paramName = "resource".$i;
	$upload_file = new UploadFile($paramName);
	if (isset($_FILES[$paramName]) && $upload_file->confirm_upload()) {
		$template->add_resource_file($_FILES[$paramName]['tmp_name'], $upload_file->original_file_name);
	}
}

if (empty($errors)) {
	$return_id = $template->save();
	handleRedirect("", "");
} else {
	$_REQUEST["ZR_ERROR_MSG"] = join("<br/>", $errors);
	include("modules/ZuckerReportTemplate/EditView.php");
}
?>
