<?php

App::uses('AppModel', 'Model');

class Project extends AppModel
{
	public $hasMany = array(
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'project_id'));
}

?>