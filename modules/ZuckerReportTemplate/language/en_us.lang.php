<?php

$mod_strings = array_merge(return_module_language("en_us", "ZuckerReports"),
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'New JasperReports Template',
	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Template Name',
	'LBL_REPORT_FILENAME' => 'Template File (*.jrxml)',
	'LBL_REPORT_DESCRIPTION' => 'Description',
	'LBL_REPORT_EXPORT_AS' => 'Allowed Formats',
	'LBL_SUBREPORTS' => 'Subreports',
	'LBL_SUBREPORT' => 'Upload Subreport',
	'LBL_SUBREPORT_HELP' => 'Subreports are saved in own files. For JasperReports to be able to access those files, please upload them here. If you have uploaded a subreport file before, you don\'t have to upload it againg.',
	'LBL_RESOURCES' => 'Other Resources',
	'LBL_RESOURCE' => 'Upload Resource',
	'LBL_RESOURCE_HELP' => 'Report pictures and scriptlets are saved in own files. For JasperReports to be able to access those files, please upload them here. If you have uploaded a resource file before, you don\'t have to upload it againg.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Only report design files (*.jrxml) are supported',
	)
);

$mod_list_strings = array_merge(return_mod_list_strings_language("en_us", "ZuckerReports"),
	array (
		  'REPORT_EXPORT_TYPES' =>
		  array (
			'PDF' => 'Adobe PDF (*.pdf)',
			'XLS' => 'Excel (*.xls)',
			'HTML' => 'HTML (*.html)',
			'XML' => 'XML (extern images, *.xml)',
			'XML_EMBED' => 'XML (embedded images, *.xml)',
		  ),
 	)
);


?>
