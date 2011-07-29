<?php

$mod_strings = array_merge(return_module_language("fr_FR", "ZuckerReports"),
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Nouveau mod�le de JasperReports',
	'LBL_ASSIGNED_USER_ID' => 'Assigned To:',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Nom du mod�le',
	'LBL_REPORT_FILENAME' => 'Fichier du mod�le',
	'LBL_REPORT_DESCRIPTION' => 'Description',
	'LBL_REPORT_EXPORT_AS' => 'Formats autoris�s',
	'LBL_SUBREPORTS' => 'Sous-rapport',
	'LBL_SUBREPORT' => 'Charger Sous-rapport',
	'LBL_SUBREPORT_HELP' => 'Les sous-rapports sont sauvegard�s dans leur propres fichiers. Pour que JasperReports puisse les charger, mettez les ici. Si vous avez d�j� charg� les rapports, il n\'est pas n�cessaire de les recharger.',
	'LBL_RESOURCES' => 'Autres Ressources',
	'LBL_RESOURCE' => 'Charger Ressources',
	'LBL_RESOURCE_HELP' => 'Les images et les scriptlets sont sauvegard�s dans leur propres fichiers. Pour que JasperReports puisse les charger, mettez les ici. Si vous avez d�j� charg� les rapports, il n\st pas n�cessaire de les recharger.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Seul les rapports (*.jrxml) sont g�r�s',
	)
);

$mod_list_strings = array_merge(return_mod_list_strings_language("fr_FR", "ZuckerReports"),
	array (
		  'REPORT_EXPORT_TYPES' =>
		  array (
			'PDF' => 'Adobe PDF (*.pdf)',
			'XLS' => 'Excel (*.xls)',
			'HTML' => 'HTML (*.html)',
			'XML' => 'XML (images externes, *.xml)',
			'XML_EMBED' => 'XML (images imbriqu�es, *.xml)',
		  ),
 	)
);


?>
