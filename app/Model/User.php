<?php

App::uses('AppModel', 'Model');

class User extends AppModel
{
	public $belongsTo = array(
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id'),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id')
		);
	public $hasMany = array(
		'Timetable' => array(
			'className' => 'Timetable',
			'foreignKey' => 'user_id'),
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'user_id'));
	public $validate = array(
		'num' => array(
			'onlyNumberAndLengthIs12' => array(
				'rule' => '/^\d{12}$/'
				)),
		'department_id' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/'
				)),
		'group_id' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/'
				)));
}
?>
