<?php
$GLOBALS["dictionary"]['ZuckerReport'] = array(
	'table' => 'zucker_report',
	'fields' => array (
		'id' => array (
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

		'date_entered' => array (
				'name' => 'date_entered',
				'vname' => 'LBL_DATE_ENTERED',
				'type' => 'datetime',
				'required' => true,
				),
		'date_modified' => array (
				'name' => 'date_modified',
				'vname' => 'LBL_DATE_MODIFIED',
				'type' => 'datetime',
				'required' => true,
				),
		'modified_user_id' => array (
				'name' => 'modified_user_id',
				'rname' => 'user_name',
				'id_name' => 'modified_user_id',
				'vname' => 'LBL_MODIFIED',
				'type' => 'assigned_user_name',
				'table' => 'modified_user_id_users',
				'reportable'=>true,
				'isnull' => 'false',
				'dbType' => 'id',
				'required'=> true,
				'len' => 36,
				),
		'created_by' => array (
				'name' => 'created_by',
				'rname' => 'user_name',
				'id_name' => 'created_by',
				'vname' => 'LBL_CREATED',
				'type' => 'assigned_user_name',
				'table' => 'created_by_users',
				'isnull' => 'false',
				'dbType' => 'id',
				'len' => 36,
				),
		'container_id' => array (
			'name' => 'container_id',
			'type' => 'varchar',
			),
		'container_name' => array (
			'name' => 'container_name',
			'type' => 'varchar',
			'source' => 'non-db'
			),
		'filename' => array (
			'name' => 'filename',
			'type' => 'varchar',
			),
		'published' => array (
			'name' => 'published',
			'type' => 'varchar',
			),
		'published_text' => array (
			'name' => 'published_text',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'description' => array (
			'name' => 'description',
			'type' => 'varchar',
			),
		'icon_url' => array (
			'name' => 'icon_url',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		),
);
?>
