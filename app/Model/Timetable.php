<?php

App::uses('AppModel', 'Model');

class Timetable extends AppModel
{
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'));
	public $validate = array(
		'leisure' => array(
			'onlyNumberAndLengthIs12' => array(
				'rule' => '/^[a-g][0-5]$/'
				)),
		'user_id' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/'
				)),
		'checked' => array(
			'zeroOrOne' => array(
				'rule' => '/^[0-1]$/',
				'required' => false,
				'allowEmpty' =>true
				)));
}
?>
