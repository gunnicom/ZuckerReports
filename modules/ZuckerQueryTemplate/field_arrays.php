<?php
$fields_array['QueryTemplate'] = array (
	'column_fields' => array(
		"id",
		"name",
		"sql1",
		"description",		
		"date_entered",
		"date_modified",
		"created_by",
		"modified_user_id",
		'team_id',
		'assigned_user_id',
	),
        'list_fields' =>  array(
		"id",
		"name",
		"sql1",
		"description",		
		"date_entered",
		"date_modified",
		"created_by",
		'type_desc',		
		"modified_user_id",
		'team_id',
		'assigned_user_id',
	),
    	'required_fields' =>  array('name'=>1, 'sql1'=>1),
);
?>
