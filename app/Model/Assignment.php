<?php

App::uses('AppModel', 'Model');

class Assignment extends AppModel
{
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id'));
	public $hasMany = array(
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'assignment_id'));
	public $validate = array(
		'project_id' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/'),
			'exist' => array(
				'rule' => 'checkExist')),
		'the_number_needed' => array(
			'onlyNumber' => array(
				'rule' => '/^\d+$/')),
		'date' => array(
			'isDate' => array(
				'rule' => 'date')),
		'start_leisure' => array(
			'onlyNumberAndLengthIs12' => array(
				'rule' => '/^[a-g][0-5]$/')),
		'end_leisure' => array(
			'onlyNumberAndLengthIs12' => array(
				'rule' => '/^[a-g][0-5]$/')));

	public function checkExist($check)
	{
		$res = $this->query('SELECT * FROM `'.$this->tablePrefix.'projects` WHERE `id` = \''.$check['project_id'].'\'');
		return isset($res[0]);
	}
}

?>