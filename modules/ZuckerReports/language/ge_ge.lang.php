<?php
global $mod_strings;
global $mod_list_strings;

$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'ZuckerReports',
	'LBL_MODULE_TITLE' => 'ZuckerReports: Home',
	'LNK_TEMPLATE_LIST'=> 'Bericht- und Abfragevorlagen',
	'LNK_PARAMETER_LIST'=> 'Bericht- und Abfrageparameter',
	'LNK_REPORT_ONDEMAND'=> 'Bericht erstellen',
	'LNK_REPORT_SCHEDULER'=> 'Bericht-Scheduler',
	'LNK_ARCHIVE_LIST'=> 'Bericht-Archiv',
	'LBL_MENU_ABOUT' => '&Uuml;ber uns',

	'LBL_TEMPLATE_LIST_HEADER' => 'Alle Vorlagen',
	'LBL_TEMPLATE_LIST_NAME' => 'Name',
	'LBL_TEMPLATE_LIST_TYPE' => 'Typ',
	'LBL_TEMPLATE_LIST_DESCRIPTION' => 'Kommentar',

	'LBL_CREATED_BY'=> 'Created by',
	'LBL_DATE_ENTERED'=> 'Date Entered',
	'LBL_DATE_MODIFIED'=> 'Date Modified',
	'LBL_DELETED' => 'Deleted',
	'LBL_MODIFIED'=> 'Modified by',

	'LBL_SUBREPORTS' => 'Berichte',
	'LBL_ZUCKERREPORT_NAME' => 'Dateiname',
	'LBL_ZUCKERREPORT_DESCRIPTION' => 'Kommentar',
	'LBL_ZUCKERREPORT_PUBLISH' => 'Bericht publizieren',
	'LBL_ZUCKERREPORT_UNPUBLISH' => 'Bericht nicht publizieren',
	'LBL_ZUCKERREPORT_PUBLISHED' => 'Publiziert',
	'LBL_ZUCKERREPORT_UNPUBLISHED' => 'Nicht Publiziert',
	'LBL_HOME_REPORTS' => 'Berichte',
	
	'LBL_CONTAINER' => 'Kategorie',
	'LBL_SUBCONTAINERS' => 'Unterkategorie',
	'LBL_CONTAINER_NEW' => 'Neue Kategorie',
	'LBL_CONTAINER_TOP' => 'Top Kategorie',
	'LBL_CONTAINER_SELECT' => 'Auswählen',
	'LBL_CONTAINER_NAME' => 'Name',
	'LBL_CONTAINER_DESCRIPTION' => 'Kommentar',
	'LBL_CONTAINER_UP' => 'Hinauf',
	
	
	'LBL_PARAM_NEW' => 'Neuer Berichtparameter',
	'LBL_PARAM_FRIENDLYNAME' => 'Anzeigename',
	'LBL_PARAM_DEFAULTNAME' => 'Voreingestellter Name',
	'LBL_PARAM_DEFAULTVALUE' => 'Voreingestellter Wert',
	'LBL_PARAM_DESCRIPTION' => 'Kommentar',
	'LBL_PARAM_RANGE' => 'Auswahl',
	'LBL_PARAM_RANGE_LIST' => 'Liste eingeben',
	'LBL_PARAM_RANGE_LIST_HELP' => 'Bitte die möglichen Werte getrennt durch einen Beistrich (",") eingeben.',
	'LBL_PARAM_RANGE_INPUT' => 'Wert direkt eingeben',
	'LBL_PARAM_RANGE_SQL' => 'Abfrage definieren',
	'LBL_PARAM_RANGE_SQL_HELP' => 'Bitte geben Sie hier die SQL-Abfrage ein, aus welcher die Auswahlliste bei der Berichtausführung aufgebaut wird. Der Wert in der ersten Spalte des Resultsets wird an den Bericht übergeben, der Wert in der zweiten Spalte wird in der Auswahlliste angezeigt.',
	'LBL_PARAM_RANGE_SQL_TEST' => 'Abfrage testen',
	'LBL_PARAM_RANGE_SCRIPT' => 'PHP Skript',
	'LBL_PARAM_RANGE_SCRIPT_DISABLED' => 'PHP Scripting wurde deaktiviert. Bitte in modules/ZuckerReports/config.php aktivieren.',
	'LBL_PARAM_RANGE_SCRIPT_HELP' => 'Hier jeden beliebigen PHP code eingeben, und mit einem "return"-Statement abschließen.',

	'LBL_PARAM_LINK_LIST' => 'Berichtparameter',
	'LBL_PARAM_LINK_NEW' => 'Berichtparameter auswählen',
	'LBL_PARAM_LINK_NAME' => 'Parametername',
	'LBL_PARAM_LINK_DEFAULTVALUE' => 'Voreingestellter Wert',
	'LBL_PARAM_LINK_PARAM' => 'Parameter',
	'LBL_PARAM_LINK_RANGE' => 'Auswahl',
	'LBL_PARAM_LINK_ATTACH' => 'Zuordnen',
	'LBL_PARAM_LINK_DETACH' => 'Lösen',

	'LBL_TEMPLATE_MODULE_LIST' => 'Modulbindungen',
	'LBL_TEMPLATE_MODULE_NEW' => 'Modul auswählen',
	'LBL_TEMPLATE_MODULE_PARAM' => 'Verknüpfter Parameter',
	'LBL_TEMPLATE_MODULE_MOD' => 'Modul',
	'LBL_TEMPLATE_MODULE_ATTACH' => 'An Modul binden',
	'LBL_TEMPLATE_MODULE_DETACH' => 'Von Modul lösen',
	
	'LBL_ONDEMAND_REPORT_SELECTION' => 'Berichtauswahl',
	'LBL_ONDEMAND_FORMAT_SELECTION' => 'Formateinstellungen',
	'LBL_ONDEMAND_ATTACH_SELECTION' => 'Zuweisen',
	'LBL_ONDEMAND_PARAMETERS' => 'Parameter',
	
	'LBL_ONDEMAND_TEMPLATE' => 'Bericht',
	'LBL_ONDEMAND_EXECUTE' => 'Bericht erstellen',
	'LBL_ONDEMAND_OUTPUT' => 'Ausgabe',
	'LBL_ONDEMAND_RESULT' => 'Berichtausgabe',
	'LBL_ONDEMAND_VIEW' => 'Bericht im Browserfenster laden',
	'LBL_ATTACH_TO' => 'Bericht zuordnen zu',
	'LBL_ARCHIVE_TO' => 'Bericht archivieren in Kategorie',
 	'LBL_ONDEMAND_ERROR' => 'Fehler beim Erstellen des Berichtes',
	'LBL_ONDEMAND_FORMAT' => 'Format',
	
	'LBL_ONDEMAND_BOUND' => 'Berichte, Abfragen und Briefe',
	'LBL_ONDEMAND_BOUND_ATTACH' => 'Bericht zuweisen',
	'LBL_ONDEMAND_BOUND_RUN' => 'Erstellen',
	
	'LBL_ARCHIVE_LIST'=> 'Bericht-Auflistung',
	
);

$mod_list_strings = array (
  'PARAM_RANGE_TYPES' =>
  array (
    'SIMPLE' => 'Eingabe',
	'DATE' => 'Datumseingabe',
    'SQL' => 'Benutzerdefinierte Abfrage',
    'LIST' => 'Benutzerdefinierte Liste',
	'CURRENT_USER' => 'Aktueller Benutzer',
	'SCRIPT' => 'PHP Skript',
  ),
);

?>
