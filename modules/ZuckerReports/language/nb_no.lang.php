<?php
$mod_strings = array (
	//module
	'LBL_MODULE_NAME' => 'ZuckerReports',
	'LBL_MODULE_TITLE' => 'ZuckerReports: Hjem',
	'LNK_TEMPLATE_LIST'=> 'Rapport og Spørringsmaler',
	'LNK_PARAMETER_LIST'=> 'Rapport og Spørringsparametre',
	'LNK_REPORT_ONDEMAND'=> 'Anfordringsrapportering',
	'LNK_REPORT_SCHEDULER'=> 'Rapportplanlegger',
	'LNK_ARCHIVE_LIST'=> 'Rapportarkiv',
	'LBL_MENU_ABOUT' => 'Om oss',

	'LBL_TEMPLATE_LIST_HEADER' => 'Mal-liste',
	'LBL_TEMPLATE_LIST_NAME' => 'Navn',
	'LBL_TEMPLATE_LIST_TYPE' => 'Type',
	'LBL_TEMPLATE_LIST_DESCRIPTION' => 'Beskrivelse',
	
	'LBL_CREATED_BY'=> 'Laget av',
	'LBL_DATE_ENTERED'=> 'Laget dato',
	'LBL_DATE_MODIFIED'=> 'Sist modifisert',
	'LBL_DELETED' => 'Slettet',
	'LBL_MODIFIED'=> 'Modifisert av',

	'LBL_SUBREPORTS' => 'Rapporter',
	'LBL_ZUCKERREPORT_NAME' => 'Filenavn',
	'LBL_ZUCKERREPORT_DESCRIPTION' => 'Beskrivelse',
	'LBL_ZUCKERREPORT_PUBLISH' => 'Utgi rapport',
	'LBL_ZUCKERREPORT_UNPUBLISH' => 'Trekk tilbake rapport',
	'LBL_ZUCKERREPORT_PUBLISHED' => 'Utgitt',
	'LBL_ZUCKERREPORT_UNPUBLISHED' => 'Ikke utgitt',
	'LBL_HOME_REPORTS' => 'Rapporter',
	
	'LBL_CONTAINER' => 'Kategori',
	'LBL_SUBCONTAINERS' => 'Subkategori',
	'LBL_CONTAINER_NEW' => 'Ny kategori',
	'LBL_CONTAINER_TOP' => 'Topkategori',
	'LBL_CONTAINER_SELECT' => 'Velg',
	'LBL_CONTAINER_NAME' => 'Navn',
	'LBL_CONTAINER_DESCRIPTION' => 'Beskrivelse',
	'LBL_CONTAINER_UP' => 'Opp',
	
	
	'LBL_PARAM_NEW' => 'Ny rapportparameter',
	'LBL_PARAM_FRIENDLYNAME' => 'Vennlig navn',
	'LBL_PARAM_DEFAULTNAME' => 'Standardnavn',
	'LBL_PARAM_DEFAULTVALUE' => 'Standardverdi',
	'LBL_PARAM_DESCRIPTION' => 'Beskrivelse',
	'LBL_PARAM_RANGE' => 'Valg',
	'LBL_PARAM_RANGE_LIST' => 'Brukerdefinert liste',
	'LBL_PARAM_RANGE_LIST_HELP' => 'Vennligst skriv inn verdien til listen, separert med kolon (",").',
	'LBL_PARAM_RANGE_INPUT' => 'Direkteinnlegg',
	'LBL_PARAM_RANGE_SQL' => 'Brukerdefinert spørring',
	'LBL_PARAM_RANGE_SQL_HELP' => 'Vennligst skriv inn SQL spørring som benyttes for a lage parametervalglisten når rapporten skjøres. Verdien til den første kolonnen i resultatet vil bli levert til rapporten, verdien til den andre kolonnen vil bli vist til brukeren for valg.',
	'LBL_PARAM_RANGE_SQL_TEST' => 'Test SQL-spørring',
	'LBL_PARAM_RANGE_SCRIPT' => 'PHP script',
	'LBL_PARAM_RANGE_SCRIPT_DISABLED' => 'PHP scripting er skrudd av. Vennligst skru det på i modules/ZuckerReports/config.php.',
	'LBL_PARAM_RANGE_SCRIPT_HELP' => 'Vennligst skriv inn PHP koden du ønsker. Avslutt med en "return"-statement.',

	'LBL_PARAM_LINK_LIST' => 'Parameterforbindelser',
	'LBL_PARAM_LINK_NEW' => 'Parametervalg',
	'LBL_PARAM_LINK_NAME' => 'Parameternavn',
	'LBL_PARAM_LINK_DEFAULTVALUE' => 'Standardverdi',
	'LBL_PARAM_LINK_PARAM' => 'Parameter',
	'LBL_PARAM_LINK_RANGE' => 'Valg',
	'LBL_PARAM_LINK_ATTACH' => 'Bind parameter',
	'LBL_PARAM_LINK_DETACH' => 'Fjern parameterforbindelse',

	'LBL_TEMPLATE_MODULE_LIST' => 'Modulforbindelse',
	'LBL_TEMPLATE_MODULE_NEW' => 'Modulvalg',
	'LBL_TEMPLATE_MODULE_PARAM' => 'Linket parameter',
	'LBL_TEMPLATE_MODULE_MOD' => 'Modul',
	'LBL_TEMPLATE_MODULE_ATTACH' => 'Bind til modul',
	'LBL_TEMPLATE_MODULE_DETACH' => 'Fjern modulforbindelse',
	
	'LBL_ONDEMAND_REPORT_SELECTION' => 'Rapportvalg',
	'LBL_ONDEMAND_FORMAT_SELECTION' => 'Formatpreferanser',
	'LBL_ONDEMAND_ATTACH_SELECTION' => 'Vedlegg',
	'LBL_ONDEMAND_PARAMETERS' => 'Parametre',
	
	'LBL_ONDEMAND_TEMPLATE' => 'Rapport',
	'LBL_ONDEMAND_EXECUTE' => 'Kjør Rapport',
	'LBL_ONDEMAND_OUTPUT' => 'Output',
	'LBL_ONDEMAND_RESULT' => 'Rapportresultat',
	'LBL_ONDEMAND_VIEW' => 'Les rapport',
	'LBL_ATTACH_TO' => 'Legg ved rapport',
	'LBL_ARCHIVE_TO' => 'Arkiver rapport i kategori',
	'LBL_ONDEMAND_ERROR' => 'Feil under kjøring av rapporten',
	'LBL_ONDEMAND_FORMAT' => 'Format',

	'LBL_ONDEMAND_BOUND' => 'Rapporter, spørringer og brev',
	'LBL_ONDEMAND_BOUND_ATTACH' => 'Legg ved resultat',
	'LBL_ONDEMAND_BOUND_RUN' => 'Kjør',
	
	'LBL_ARCHIVE_LIST'=> 'Rapportliste',
	
);

$mod_list_strings = array (
  'PARAM_RANGE_TYPES' =>
  array (
    'SIMPLE' => 'Direkteinput',
	'DATE' => 'Datoinput',
    'SQL' => 'Brukerdefinert spørring',
    'LIST' => 'Brukerdefinert liste',
	'CURRENT_USER' => 'Aktuell bruker',
	'SCRIPT' => 'PHP script',
  ),
);

?>
