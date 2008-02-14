<?php
global $mod_strings;
global $mod_list_strings;

require_once("modules/ZuckerReports/language/fr_FR.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_REPORT_TEMPLATE_NEW' => 'Nouveau modèle de JasperReports',
	'LBL_REPORT' => 'JasperReports',
	'LBL_REPORT_NAME' => 'Nom du modèle',
	'LBL_REPORT_FILENAME' => 'Fichier du modèle',
	'LBL_REPORT_DESCRIPTION' => 'Description',
	'LBL_REPORT_EXPORT_AS' => 'Formats autorisés',
	'LBL_SUBREPORTS' => 'Sous-rapport',
	'LBL_SUBREPORT' => 'Charger Sous-rapport',
	'LBL_SUBREPORT_HELP' => 'Les sous-rapports sont sauvegardés dans leur propres fichiers. Pour que JasperReports puisse les charger, mettez les ici. Si vous avez déjà chargé les rapports, il n\'est pas nécessaire de les recharger.',
	'LBL_RESOURCES' => 'Autres Ressources',
	'LBL_RESOURCE' => 'Charger Ressources',
	'LBL_RESOURCE_HELP' => 'Les images et les scriptlets sont sauvegardés dans leur propres fichiers. Pour que JasperReports puisse les charger, mettez les ici. Si vous avez déjà chargé les rapports, il n\st pas nécessaire de les recharger.',

	'ERR_TEMPLATE_INVALID_FILE' => 'Seul les rapports (*.jrxml) sont gérés',
	)
);

$mod_list_strings = array_merge($mod_list_strings,
	array (
		  'REPORT_EXPORT_TYPES' =>
		  array (
			'PDF' => 'Adobe PDF (*.pdf)',
			'XLS' => 'Excel (*.xls)',
			'HTML' => 'HTML (*.html)',
			'XML' => 'XML (images externes, *.xml)',
			'XML_EMBED' => 'XML (images imbriquées, *.xml)',
		  ),
 	)
);


?>
