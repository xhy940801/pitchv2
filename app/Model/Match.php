<?php

App::uses('AppModel', 'Model');

class Match extends AppModel
{
	public $belongsTo = array(
		'Assignment' => array(
			'className' => 'Assignment',
			'foreignKey' => 'assignment_id'));
		// 'User' => array(
		// 	'className' => 'User',
		// 	'foreignKey' => 'user_id'));
	public $validate = array(
		'assignment_id' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/')),
		'user_id' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/')),
		'sign' => array(
			'boolean' => array(
				'rule' => '/^[0-1]$/')));
}

?>