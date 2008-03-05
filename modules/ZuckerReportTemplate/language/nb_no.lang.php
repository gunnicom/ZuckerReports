<?php

$mod_strings = array_merge(return_module_language("no_nb", "ZuckerReports"),
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Ny JasperReportsmal',
	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Navn på mal',
	'LBL_REPORT_FILENAME' => 'Template fil (*.jrxml)',
	'LBL_REPORT_DESCRIPTION' => 'Beskrivelse',
	'LBL_REPORT_EXPORT_AS' => 'Tillatte formater',
	'LBL_SUBREPORTS' => 'Subrapporter',
	'LBL_SUBREPORT' => 'Last opp subrapporter',
	'LBL_SUBREPORT_HELP' => 'Subrapporter er lagret i egne filer. For at JasperReports skal kunne ha adgang til filene må du laste dem her. Hvis du har lastet opp en subrapport før, trenger du ikke laste den opp på nytt.',
	'LBL_RESOURCES' => 'Andre ressurser',
	'LBL_RESOURCE' => 'Last opp ressurs',
	'LBL_RESOURCE_HELP' => 'Rapport bilder og scriptlets blir lagret i egne filer. For at JasperReports skal kunne ha adgang til filene må du laste dem her. Hvis du har lastet opp en subrapport før, trenger du ikke laste den opp på nytt.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Kun rapportdesignfiler (*.jrxml) er støttet.',
	)
);

$mod_list_strings = array_merge(return_mod_list_strings_language("nb_no", "ZuckerReports"),
	array (
		  'REPORT_EXPORT_TYPES' =>
		  array (
			'PDF' => 'Adobe PDF (*.pdf)',
			'XLS' => 'Excel (*.xls)',
			'HTML' => 'HTML (*.html)',
			'XML' => 'XML (eksterne bilder, *.xml)',
			'XML_EMBED' => 'XML (innesluttet bilder, *.xml)',
		  ),
 	)
);


?>
