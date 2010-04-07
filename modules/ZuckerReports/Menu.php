<?php 
global $mod_strings;
global $current_user;

$module_menu = Array( 
	Array("index.php?module=ZuckerReports&action=ReportOnDemand", $mod_strings['LNK_REPORT_ONDEMAND'], "ZuckerReportOnDemand"),
	Array("index.php?module=ZuckerRunnableReport&action=ListView", $mod_strings['LNK_RUNNABLE_REPORTS'], "ZuckerReportOnDemand"),
	Array("index.php?module=ZuckerReportContainer&action=DetailView&record=root", $mod_strings['LNK_ARCHIVE_LIST'], "ZuckerReportContainer"),
	Array("index.php?module=ZuckerReports&action=TemplateListView", $mod_strings['LNK_TEMPLATE_LIST'], "ZuckerReports"),
	Array("index.php?module=ZuckerReportParameter&action=ListView", $mod_strings['LNK_PARAMETER_LIST'], "ZuckerReportParameter"),
	Array("http://www.zuckerfriends.com", "ZuckerFriends", "ZuckerReportAbout"),
	Array("index.php?module=ZuckerReports&action=About", $mod_strings['LBL_MENU_ABOUT'], "ZuckerReportAbout"),
)
;
?>
