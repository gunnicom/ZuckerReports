<?php

$GLOBALS["dictionary"]['ListingTemplateFilter'] = array(
	'table' => 'zucker_listingtemplatefilter',
	'fields' => array (
		'id' => array (
			'name' => 'id',
			'vname' => 'LBL_ID',
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

		'listing_template_id' => array (
			'name' => 'listing_template_id',
			'required' => true,
			'type' => 'id',
			'reportable'=>false,
		),
		'module_name' => array (
			'name' => 'module_name',
			'vname' => 'LBL_LISTING_FILTER_MODULE',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
		),
		'field_name' => array (
			'name' => 'field_name',
			'vname' => 'LBL_LISTING_FILTER_FIELD',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
		),
		'comparator' => array (
			'name' => 'comparator',
			'vname' => 'LBL_LISTING_FILTER_COMPARATOR',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
		),
		'value_type' => array (
			'name' => 'value_type',
			'vname' => 'LBL_LISTING_FILTER_VALUETYPE',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
		),
		'value' => array (
			'name' => 'value',
			'vname' => 'LBL_LISTING_FILTER_VALUE',
			'required' => true,
			'type' => 'varchar',
			'len' => 255,
		),
		'module_desc' => array (
			'name' => 'module_desc',
			'type' => 'varchar',
			'source' => 'non-db',
			),
		'filter_desc' => array (
			'name' => 'filter_desc',
			'type' => 'varchar',
			'source' => 'non-db',
			),
	),
	'indices' => array(
		array(
			'name' =>'zucker_listingtemplatefilter_primary_key_index',
			'type' =>'primary',
			'fields'=>array('id')
		),
	),
	
);

?>
