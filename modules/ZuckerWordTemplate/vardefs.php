<?php

$dictionary['WordTemplate'] = array(
	'table' => 'zucker_wordtemplates',
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
			'vname' => 'LBL_WORD_NAME',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
			),
		'filename' => array (
			'name' => 'filename',
			'vname' => 'LBL_WORD_FILENAME',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
			),
		'description' => array (
			'name' => 'description',
			'vname' => 'LBL_WORD_DESCRIPTION',
			'required' => false,
			'type' => 'text',
			),
		'querytemplate_id' => array (
			'name' => 'querytemplate_id',
			'required' => true,
			'type' => 'id',
			'reportable'=>false,
			),
		'querytemplate_name' => array (
			'name' => 'querytemplate_name',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'querytemplate_link' => array (
			'name' => 'querytemplate_link',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'template_url' => array (
			'name' => 'template_url',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'image_html' => array (
			'name' => 'image_html',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'action_module' => array (
			'name' => 'action_module',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'type_desc' => array (
			'name' => 'type_desc',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		),

	'indices' => array(
		array(
			'name' =>'zucker_wordtemplate_primary_key_index',
			'type' =>'primary',
			'fields'=>array('id')
		),
	),

);

?>
