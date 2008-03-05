<?php
$fields_array['ReportTemplate'] = array (
	'column_fields' => array(
		'id',
		'date_entered',
		'date_modified',
		'modified_user_id',
		'created_by',
		'name',
		'team_id',
		'assigned_user_id',
		'filename',
		'description',
		'export_as',		
		'deleted',
	),
    'list_fields' =>  array(
		'id',
		'date_entered',
		'date_modified',
		'modified_user_id',
		'created_by',
		'name',
		'team_id',
		'assigned_user_id',
		'filename',
		'description',
		'export_as',		
		'type_desc',		
		'deleted',
	),
	'required_fields' =>  array('name'=>1),
);
?>
