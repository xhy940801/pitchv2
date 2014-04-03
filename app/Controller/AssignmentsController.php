﻿<?php

App::uses('AppController', 'Controller');

class AssignmentsController extends AppController
{
	private $leisureHashTable = array(
		'plus' => array('a','b','c','d','e','f','g'),
		'minus' => array('a' => 0,'b' => 1,'c' => 2,'d' => 3,'e' => 4,'f' => 5,'g' => 6));

	public $layout = "project";
	// public $helpers = array(
	// 	'Js', 'Html', 'Form', 'Time', 'Leisure', 'App',
	// 	'Authority' => array(
	// 		'pitch_pages_nnlogin' => $this->pitch_pages_nnlogin,
	// 		'pitch_authority' => $this->pitch_authority,
	// 		'userAuthority' => $this->userInfo['User']['authority']));
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->helpers = array(
		'Js', 'Html', 'Form', 'Time', 'Leisure', 'App',
		'Authority' => array(
			'pitch_pages_nnlogin' => $this->pitch_pages_nnlogin,
			'pitch_authority' => $this->pitch_authority,
			'userAuthority' => $this->userInfo['User']['authority']));
	}

	public function addAssignment($id = null)
	{
		if($id)
		{
			if($this->request->is('post'))
			{
				$data['Assignment'] = $this->request->data;
				$data['Assignment']['project_id'] = $id;
				$data['Assignment']['start_leisure'] = $data['Assignment']['start_leisure_d'].$data['Assignment']['start_leisure_c'];
				$data['Assignment']['end_leisure'] = $data['Assignment']['end_leisure_d'].$data['Assignment']['end_leisure_c'];
				$this->Assignment->create();
				$this->setErrorInformation($this->Assignment->save($data),'Saving data error!');
				$this->set('projectId', $id);
			}
		}
	}

	public function showAssignments($id = null)
	{
		if($id)
		{
			App::import('Vendor','AuthBBT');
			$assignments = $this->Assignment->find('all',
				array('conditions' => array('Assignment.project_id' => $id), 'recursive' => 1));
			$authBBT = new AuthBBT();
			for($i=0;$i<count($assignments);++$i)
			{
				$assignments[$i]['MatchSigned'] = array();
				$assignments[$i]['MatchUnsigned'] = array();
				for($j=0;$j<count($assignments[$i]['Match']);++$j)
				{
					$s = 0;
					$us = 0;
					$user = $authBBT->getOneUser(array('User.num' => $assignments[$i]['Match'][$j]['user_num']));
					if(isset($user['returnData']) && $user['error'] == '0')
					{
						$user = $user['returnData'];
						unset($user['Group']);
						if($assignments[$i]['Match'][$j]['signed'] == 0)
						{
							$assignments[$i]['MatchUnsigned'][$us] = $assignments[$i]['Match'][$j];
							$assignments[$i]['MatchUnsigned'][$us++]['User'] = $user;
						}
						else if($assignments[$i]['Match'][$j]['signed'] == 1)
						{
							$assignments[$i]['MatchSigned'][$s] = $assignments[$i]['Match'][$j];
							$assignments[$i]['MatchSigned'][$s++]['User'] = $user;
						}
					}
				}
				unset($assignments[$i]['Match']);
			}

			$this->loadModel('Department');
			
			$this->set('assignments', $assignments);
			$this->set('projectId', $id);
		}
	}

	public function deleteAssignment($id = null)
	{
		if($id)
		{
			$this->setErrorInformation($this->Assignment->delete($id),'Deleting data error!');
		}
	}

	public function recommend($id = null, $group = '')
	{
		$this->layout = 'ajax';
		$userInfoList = array();
		if($id != null)
		{
			$assignment = $this->Assignment->find('first', array('conditions' => array('Assignment.id' => $id), 'recursive' => 1));
			$the_number_needed = $assignment['Assignment']['the_number_needed'] - count($assignment['Match']);
			$users = $this->recommendUser($assignment['Assignment']['start_leisure'], $assignment['Assignment']['end_leisure'], $the_number_needed);
			$userList = array();
			for($i=0;$i<count($users);++$i)
			{
				$userList[$i] = $users[$i]['User']['num'];
			}
			$userList[$i] = '201230620437';
			$userInfoList = $this->getSomeUserInfoByNum($userList);
			if(isset($userInfoList['returnData']))
				$userInfoList = $userInfoList['returnData'];
			for($i=0;$i<count($userInfoList);++$i)
			{
				if(isset($usersPitchInfo[$i]['User']['pitch_times']))
					$userInfoList[$i]['User']['pitch_times'] = $users[$i]['User']['pitch_times'];
				else
					$userInfoList[$i]['User']['pitch_times'] = 0;
			}
		}
		$this->set('users', $userInfoList);
	}

	private function decodeGroup($group)
	{
		$group = json_decode($group);
		for($i=0;$i<count($group);++$i)
		{
			$group[$i] = intval($group[$i]);
		}
	}

	private function recommendUser($start_leisure, $end_leisure, $the_number_needed, $groupId = array('1'))
	{
		$this->loadModel('Timetable');
		$this->loadModel('User');
		$timeTablesTableName = $this->Timetable->tablePrefix . $this->Timetable->useTable;
		$usersTableName = $this->Timetable->tablePrefix . $this->User->useTable;
		$leisures = $this->getLeisureList($start_leisure, $end_leisure);
		if(count($leisures) > 0)
		{
			$query = 'SELECT `num` , `pitch_times` FROM `'.$usersTableName.'` AS `User` WHERE `num` IN ( ';
			$query .= 'SELECT `'.$this->Timetable->tablePrefix.'no_lasting_table0`.`user_num` FROM ';
			for($i=0;$i<count($leisures);++$i)
			{
				$query .= '(SELECT  `user_num` ,  `leisure` , `checked` FROM  `'.$timeTablesTableName.'` WHERE  `leisure` = \''.$leisures[$i].'\' AND `checked` = \'1\') AS '.$this->Timetable->tablePrefix.'no_lasting_table'.strval($i).', ';
			}
			$query = substr($query, 0,strlen($query) - 2);
			$query .= ' WHERE 1 AND ';
			for($i=1;$i<count($leisures);++$i)
			{
				$query .= $this->Timetable->tablePrefix.'no_lasting_table'.strval($i-1).'.user_num'.' = '.$this->Timetable->tablePrefix.'no_lasting_table'.strval($i).'.user_num'.' AND ';
			}
			$query = substr($query, 0,strlen($query) - 5);
			$groupCondition = '';
			if(is_array($groupId))
			{
				$groupCondition = '`group_id` IN ( ';
				foreach ($groupId as $gid)
				{
					$groupCondition .= '\''.$gid.'\'';
				}
				$groupCondition .= ' ) ';
			}
			else
				$groupCondition = '1';
			$query .= ') AND '.$groupCondition.' ORDER BY `pitch_times` DESC LIMIT '.strval($the_number_needed);
			$row = $this->Timetable->query($query);
			return $row;
		}
		return array();
	}

	// public function recommendUser()
	// {
	// 	if($this->request->is('post')/* && $this->checkInPutData($this->request->data)*/)
	// 	{
	// 		$this->loadModel('Timetable');
	// 		$this->loadModel('User');
	// 		$timeTablesTableName = $this->Timetable->tablePrefix . $this->Timetable->useTable;
	// 		$usersTableName = $this->Timetable->tablePrefix . $this->User->useTable;
	// 		debug($this->request->data);
	// 		$leisures = $this->getLeisureList($this->request->data['start_leisure'],$this->request->data['end_leisure']);
	// 		if(count($leisures) > 0)
	// 		{
	// 			$query = 'SELECT `num` FROM `'.$usersTableName.'` WHERE `num` IN ( ';
	// 			$query .= 'SELECT `'.$this->Timetable->tablePrefix.'no_lasting_table0`.`user_num` FROM ';
	// 			for($i=0;$i<count($leisures);++$i)
	// 			{
	// 				$query .= '(SELECT  `user_num` ,  `leisure` , `checked` FROM  `'.$timeTablesTableName.'` WHERE  `leisure` = \''.$leisures[$i].'\' AND `checked` = \'1\') AS '.$this->Timetable->tablePrefix.'no_lasting_table'.strval($i).', ';
	// 			}
	// 			$query = substr($query, 0,strlen($query) - 2);
	// 			$query .= ' WHERE 1 AND ';
	// 			for($i=1;$i<count($leisures);++$i)
	// 			{
	// 				$query .= $this->Timetable->tablePrefix.'no_lasting_table'.strval($i-1).'.user_num'.' = '.$this->Timetable->tablePrefix.'no_lasting_table'.strval($i).'.user_num'.' AND ';
	// 			}
	// 			$query = substr($query, 0,strlen($query) - 5);
	// 			$query .= ') ORDER BY `pitch_times` DESC LIMIT '.strval($this->request->data['the_number_needed']);
	// 			$row = $this->Timetable->query($query);
	// 		}
	// 	}
	// }

	private function getLeisureList($startLeisure,$endLeisure)
	{
		$startNum = $this->leisureHash($startLeisure);
		$endNum = $this->leisureHash($endLeisure) + 1;
		for($i=0,$curNum=$startNum;$curNum<$endNum;++$i,++$curNum)
		{
			$returnArr[$i] = $this->leisureDehash($curNum);
		}
		return $returnArr;
	}

	private function leisureHash($leisureName)
	{
		$leisureArr = str_split($leisureName);
		return $this->leisureHashTable['minus'][$leisureArr[0]] * 6 + intval($leisureArr[1],10);
	}

	private function leisureDehash($leisureId)
	{
		return $this->leisureHashTable['plus'][$leisureId / 6].strval($leisureId % 6);
	}

	private function checkInPutData($data)
	{
		$d['Assignment'] = $data;
		$this->Assignment->set($d);
		$bool =  $this->Assignment->validates();
		$this->Assignment->clear();
		return $bool;
	}
}
?>