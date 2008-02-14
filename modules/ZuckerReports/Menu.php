<?php 
global $mod_strings;
global $current_user;

$module_menu = Array( 
	Array("index.php?module=ZuckerReports&action=ReportOnDemand", $mod_strings['LNK_REPORT_ONDEMAND'], "ZuckerReports"),
	Array("index.php?module=ZuckerReportContainer&action=DetailView&record=root", $mod_strings['LNK_ARCHIVE_LIST'], "ZuckerReports"),
	Array("index.php?module=ZuckerReports&action=TemplateListView", $mod_strings['LNK_TEMPLATE_LIST'], "ZuckerReports"),
	Array("index.php?module=ZuckerReportParameter&action=ListView", $mod_strings['LNK_PARAMETER_LIST'], "ZuckerReports"),
	Array("index.php?module=ZuckerReports&action=About", $mod_strings['LBL_MENU_ABOUT'], "ZuckerReports"),
)
;
?>
