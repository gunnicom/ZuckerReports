<?php
$dictionary['ReportContainer'] = array(
	'table' => 'zucker_reportcontainer',
	'fields' => array (
		'id' => array (
			'name' => 'id',
			'vname' => 'LBL_CONTAINER_ID',
			'required' => true,
			'type' => 'id',
			'reportable'=>false,
			'name' => 'id',
			'type' => 'id',
		),
        'deleted' =>
                array (
                        'name' => 'deleted',
                        'vname' => 'LBL_DELETED',
                        'type' => 'bool',
                        'required' => true,
                        'reportable'=>false,
                        'default' => '0',
                        'Importable' => false
                ),
		'date_entered' => array(
			'name' => 'date_entered',
			'vname' => 'LBL_DATE_ENTERED',
			'type' => 'datetime',
			'required' => true,
		),
		'date_modified' => array(
			'name' => 'date_modified',
			'vname' => 'LBL_DATE_MODIFIED',
			'type' => 'datetime',
			'required' => true,
		),
		'modified_user_id' => array(
			'name' => 'modified_user_id',
			'rname' => 'user_name',
			'id_name' => 'modified_user_id',
			'vname' => 'LBL_MODIFIED_USER_ID',
			'type' => 'assigned_user_name',
			'table' => 'users',
			'isnull' => 'false',
			'dbType' => 'id',
			'reportable'=>true,
		),
		'created_by' => array(
			'name' => 'created_by',
			'rname' => 'user_name',
			'id_name' => 'modified_user_id',
			'vname' => 'LBL_CREATED_BY',
			'type' => 'assigned_user_name',
			'table' => 'users',
			'isnull' => 'false',
			'dbType' => 'id',
			'reportable'=>true,
		),

		'name' => array (
			'name' => 'name',
			'vname' => 'LBL_CONTAINER_NAME',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
			),
		'description' => array (
			'name' => 'description',
			'vname' => 'LBL_CONTAINER_DESCRIPTION',
			'required' => false,
			'type' => 'text',
			),
		'parent_id' => array (
			'name' => 'parent_id',
			'vname' => 'LBL_CONTAINER_PARENT_ID',
			'required' => false,
			'type' => 'id',
			'reportable'=>false,
			),
		'parent_name' => array (
			'name' => 'parent_name',
			'vname' => 'LBL_CONTAINER_PARENT_NAME',
   			'source' => 'non-db',
			),
  		'containers' => 
  			array (
  			'name' => 'containers',
    			'type' => 'link',
    			'relationship' => 'zucker_reportcontainer_containers',
    			'source'=>'non-db',
			'vname'=>'LBL_CONTAINER_CONTAINERS',
  		),
  		'reports' => 
  			array (
  			'name' => 'reports',
    			'type' => 'link',
    			'relationship' => 'zucker_reportcontainer_reports',
    			'source'=>'non-db',
			'vname'=>'LBL_CONTAINER_REPORTS',
  		),
	),

	'indices' => array(
		array(
			'name' =>'zucker_reportcontainer_primary_key_index',
			'type' =>'primary',
			'fields'=>array('id')
		),
	),
	
	 'relationships' => array (	
		'zucker_reportcontainer_containers' => array('lhs_module'=> 'ZuckerReportContainer', 'lhs_table'=> 'zucker_reportcontainer', 'lhs_key' => 'id',
								  'rhs_module'=> 'ZuckerReportContainer', 'rhs_table'=> 'zucker_reportcontainer', 'rhs_key' => 'parent_id',	
								  'relationship_type'=>'one-to-many'),
		'zucker_reportcontainer_reports' => array('lhs_module'=> 'ZuckerReportContainer', 'lhs_table'=> 'zucker_reportcontainer', 'lhs_key' => 'id',
								  'rhs_module'=> 'ZuckerReports', 'rhs_table'=> 'zucker_report', 'rhs_key' => 'container_id',	
								  'relationship_type'=>'one-to-many'),
	),

);

?>
