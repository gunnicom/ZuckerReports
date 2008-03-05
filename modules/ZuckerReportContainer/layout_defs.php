<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['ReportContainer'] = array(
	// list of what Subpanels to show in the DetailView
	'subpanel_setup' => array(
         'containers' => array(
            'top_buttons' => array( 
			    array('widget_class' => 'SubPanelTopButtonQuickCreate'),
			),
			'order' => 10,
			//'sort_order' => 'desc',
			//'sort_by' => 'name',
			'module' => 'ZuckerReportContainer',
			'subpanel_name' => 'default',
			'title_key' => 'LBL_PROJECT_TASKS_SUBPANEL_TITLE',
			'get_subpanel_data' => 'containers',
		),
	),
);
?>
