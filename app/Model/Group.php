<?php

App::uses('AppModel', 'Model');

class Group extends AppModel
{
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id'));
}
?>