<?php
$dictionary['zucker_reportcontainer_containers'] = array (
	'table' => 'zucker_reportcontainer',
 	  'relationships' => array (
 	  	'zucker_reportcontainer_containers' => array('lhs_module'=> 'ZuckerReportContainer', 'lhs_table'=> 'zucker_reportcontainer', 'lhs_key' => 'id',
								  'rhs_module'=> 'ZuckerReportContainer', 'rhs_table'=> 'zucker_reportcontainer', 'rhs_key' => 'parent_id',	
								  'relationship_type'=>'one-to-many'),
	),
);
$dictionary['zucker_reportcontainer_reports'] = array (
	'table' => 'zucker_reportcontainer',
 	  'relationships' => array (
 		'zucker_reportcontainer_reports' => array('lhs_module'=> 'ZuckerReportContainer', 'lhs_table'=> 'zucker_reportcontainer', 'lhs_key' => 'id',
								  'rhs_module'=> 'ZuckerReports', 'rhs_table'=> 'zucker_report', 'rhs_key' => 'container_id',	
								  'relationship_type'=>'one-to-many'),
	),
);




?>
