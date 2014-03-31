<?php

App::uses('AppModel', 'Model');

class Department extends AppModel
{
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'department_id'));
}
?>