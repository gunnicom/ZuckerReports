<?php


$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'ZuckerReports',
	'LBL_MODULE_TITLE' => 'ZuckerReports: Accueil',
	'LNK_TEMPLATE_LIST'=> 'Modèles des rapports et interrogations ',
	'LNK_PARAMETER_LIST'=> 'Paramètres des rapports et interrogations',
	'LNK_REPORT_ONDEMAND'=> 'Rapport à la demande',
	'LNK_REPORT_SCHEDULER'=> 'Programmateur de rapport',
	'LNK_ARCHIVE_LIST'=> 'Archives des rapports',
	'LBL_MENU_ABOUT' => 'A propos',

	'LBL_TEMPLATE_LIST_HEADER' => 'Liste des modèles',
	'LBL_TEMPLATE_LIST_NAME' => 'Nom',
	'LBL_TEMPLATE_LIST_TYPE' => 'Type',
	'LBL_TEMPLATE_LIST_DESCRIPTION' => 'Description',
	
	'LBL_CREATED_BY'=> 'Créé par',
	'LBL_DATE_ENTERED'=> 'Date création',
	'LBL_DATE_MODIFIED'=> 'Date Modification',
	'LBL_DELETED' => 'Supprimé',
	'LBL_MODIFIED'=> 'Modifié par',

	'LBL_SUBREPORTS' => 'Rapports',
	'LBL_ZUCKERREPORT_NAME' => 'Nom du fichier',
	'LBL_ZUCKERREPORT_DESCRIPTION' => 'Description',
	'LBL_ZUCKERREPORT_PUBLISH' => 'Publier le rapport',
	'LBL_ZUCKERREPORT_UNPUBLISH' => 'Ne pas publier le rapport',
	'LBL_ZUCKERREPORT_PUBLISHED' => 'Publié',
	'LBL_ZUCKERREPORT_UNPUBLISHED' => 'Non Publié',
	'LBL_HOME_REPORTS' => 'Rapports',
	
	'LBL_CONTAINER' => 'Categorie',
	'LBL_SUBCONTAINERS' => 'Souscategorie',
	'LBL_CONTAINER_NEW' => 'Nouvelle Categorie',
	'LBL_CONTAINER_TOP' => 'Categorie Racine',
	'LBL_CONTAINER_SELECT' => 'Selection',
	'LBL_CONTAINER_NAME' => 'Nom',
	'LBL_CONTAINER_DESCRIPTION' => 'Description',
	'LBL_CONTAINER_UP' => 'Monter',
	
	
	'LBL_PARAM_NEW' => 'Nouveau Paramètre du rapport',
	'LBL_PARAM_FRIENDLYNAME' => 'Nom affiché',
	'LBL_PARAM_DEFAULTNAME' => 'Nom par défaut',
	'LBL_PARAM_DEFAULTVALUE' => 'Valeur par défaut',
	'LBL_PARAM_DESCRIPTION' => 'Description',
	'LBL_PARAM_RANGE' => 'Sélection',
	'LBL_PARAM_RANGE_LIST' => 'Liste utilisateur',
	'LBL_PARAM_RANGE_LIST_HELP' => 'Saisir les valeurs de la liste séparées par une virgule (",").',
	'LBL_PARAM_RANGE_DROPDOWN' => 'Drop-Down List',
	'LBL_PARAM_RANGE_INPUT' => 'Saisie directe',
	'LBL_PARAM_RANGE_SQL' => 'Requètes utilisateur',
	'LBL_PARAM_RANGE_SQL_HELP' => 'Saisir la requète SQL. la valeur de la 1ere colonne est gérée par le rapport, la seconde par l\'utilisateur.',
	'LBL_PARAM_RANGE_SQL_TEST' => 'Tester la requête SQL',
	'LBL_PARAM_RANGE_SCRIPT' => 'PHP Script',
	'LBL_PARAM_RANGE_SCRIPT_DISABLED' => 'PHP Scripting has been disabled. Please enable it in modules/ZuckerReports/config.php.',
	'LBL_PARAM_RANGE_SCRIPT_HELP' => 'Please enter any PHP code you want. Finish with a "return"-statement.',
	


	'LBL_PARAM_LINK_LIST' => 'Lien des paramètres',
	'LBL_PARAM_LINK_NEW' => 'Paramètres sélection',
	'LBL_PARAM_LINK_NAME' => 'Paramètres Nom',
	'LBL_PARAM_LINK_DEFAULTVALUE' => 'Valeur par défaut',
	'LBL_PARAM_LINK_PARAM' => 'Paramètre',
	'LBL_PARAM_LINK_RANGE' => 'Sélection',
	'LBL_PARAM_LINK_ATTACH' => 'Lier un paramètre',
	'LBL_PARAM_LINK_DETACH' => 'Délier un paramètre',

	'LBL_TEMPLATE_MODULE_LIST' => 'Liens modules',
	'LBL_TEMPLATE_MODULE_NEW' => 'Sélections module',
	'LBL_TEMPLATE_MODULE_PARAM' => 'Paramètres liés',
	'LBL_TEMPLATE_MODULE_MOD' => 'Module',
	'LBL_TEMPLATE_MODULE_ATTACH' => 'Lié à un Module',
	'LBL_TEMPLATE_MODULE_DETACH' => 'Délié d\'un Module',
	
	'LBL_ONDEMAND_REPORT_SELECTION' => 'Sélection Rapport',
	'LBL_ONDEMAND_FORMAT_SELECTION' => 'Préferences Formats',
	'LBL_ONDEMAND_ATTACH_SELECTION' => 'Attach',
	'LBL_ONDEMAND_PARAMETERS' => 'Paramètres',
	
	'LBL_ONDEMAND_TEMPLATE' => 'Rapport',
	'LBL_ONDEMAND_EXECUTE' => 'Lancer Report',
	'LBL_ONDEMAND_OUTPUT' => 'Sortie',
	'LBL_ONDEMAND_RESULT' => 'Report Result',
	'LBL_ONDEMAND_VIEW' => 'Voir Rapport',
	'LBL_ATTACH_TO' => 'Attacher Rapport à',
	'LBL_ARCHIVE_TO' => 'Archiver Rapport',
	'LBL_ONDEMAND_ERROR' => 'Erreur lors de l\exécution du rapport',
	'LBL_ONDEMAND_FORMAT' => 'Format',

	'LBL_ONDEMAND_BOUND' => 'Rapports, Requètes et lettres',
	'LBL_ONDEMAND_BOUND_ATTACH' => 'Attacher résultats',
	'LBL_ONDEMAND_BOUND_RUN' => 'Lancer',
	
	
	'LBL_ARCHIVE_LIST'=> 'Liste des Rapports',
);

$mod_list_strings = array (
  'PARAM_RANGE_TYPES' =>
  array (
    'SIMPLE' => 'Saisie directe',
	'DATE' => 'Date Input',
    'SQL' => 'Requètes définie par l\'utilisateur',
    'LIST' => 'Liste définie par l\'utilisateur',
	'DROPDOWN' => 'Drop-Down List',
	'CURRENT_USER' => 'Current User',
	'SCRIPT' => 'PHP Script',
  ),
);

?>
