<?php
$GLOBALS["dictionary"]['ReportModuleLink'] = array(
	'table' => 'zucker_reportmodulelink',
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
		'parameterlink_id' => array (
			'name' => 'parameterlink_id',
			'required' => true,
			'type' => 'id',
			'reportable'=>false,
			),
		'module_name' => array (
			'name' => 'module_name',
			'vname' => 'LBL_TEMPLATE_MODULE_MOD',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
			),

		'parameterlink_name' => array (
			'name' => 'parameterlink_name',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'parameterlink_friendly_name' => array (
			'name' => 'parameterlink_friendly_name',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		),
		
	'indices' => array(
		array(
			'name' =>'zucker_reportmodulelink_primary_key_index',
			'type' =>'primary',
			'fields'=>array('id')
		),
	),
		
);
?>
