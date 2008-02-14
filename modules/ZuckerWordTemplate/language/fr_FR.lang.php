<?php

require_once("modules/ZuckerReports/language/fr_FR.lang.php");

$mod_strings = array_merge($mod_strings, 
	array(
	'LBL_WORD_TEMPLATE_NEW' => 'Nouveau modèle office',
	'LBL_WORD' => 'Modèle Word',
	'LBL_OPENOFFICE' => 'Modèle OpenOffice',
	'LBL_WORD_NAME' => 'Nom du modèle',
	'LBL_WORD_FILENAME' => 'Fichier modèle',
	'LBL_WORD_DESCRIPTION' => 'Description',
	'LBL_WORD_QUERY' => 'Requètes',

	'LBL_WORD_CREATE_WORD_TEMPLATE' => 'Nouveau lien avec un modèle Office',
	'LBL_WORD_WORD_TEMPLATES' => 'Lien avec le modèle office',

	'LBL_WORD_ONDEMAND_SAVE_PATH' => 'Sauver dans le répertoire',
	
	'ERR_TEMPLATE_INVALID_OFFICE_FILE' => 'Uniquement Word (*.doc) et OpenOffice/StarOffice (*.stw) sont gérés',

	'LBL_LOADER_SETUP' => 'Installer  <a href="modules/ZuckerReports/resources/ZuckerReportsLoaderSetup.msi"><strong>ZuckerReports Loader</strong></a> pour Microsoft Office et OpenOffice support.',

	)
);


$mod_list_strings = array_merge($mod_list_strings,
	array (
		  'WORD_EXPORT_TYPES' =>
		  array (
			'NewDocument' => 'Nouveau document',
			'Print' => 'Imprimer',
			'Mail' => 'Envoyer par email',
			'Fax' => 'Fax',
		  ),
		  'OPENOFFICE_EXPORT_TYPES' =>
		  array (
			'Print' => 'Imprimante',
			'File' => 'Sauvegarder dans un fichier',
		  ),
	)
);





		
?>
