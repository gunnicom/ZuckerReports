<?php
/**
 * ZuckerDocs by go-mobile
 * Copyright (C) 2005 Florian Treml, go-mobile
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the 
 * GNU General Public License as published by the Free Software Foundation; either version 2 of the 
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even 
 * the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General 
 * Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, 
 * write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */


$dictionary['ZuckerReport'] = array(
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
			'source' => 'non-db',
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
