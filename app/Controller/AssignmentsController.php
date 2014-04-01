<?php

App::uses('AppController', 'Controller');

class AssignmentsController extends AppController
{
	private $leisureHashTable = array(
		'plus' => array('a','b','c','d','e','f','g'),
		'minus' => array('a' => 0,'b' => 1,'c' => 2,'d' => 3,'e' => 4,'f' => 5,'g' => 6));

	public $layout = "project";
	public $helpers = array('Js', 'Html', 'Form', 'Time', 'Leisure', 'App');
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
				debug($data);
				$this->setErrorInformation($this->Assignment->save($data),'Saving data error!');
				$this->set('projectId', $id);
			}
		}
	}

	public function showAssignments($id = null)
	{
		if($id)
		{
			$assignments = $this->Assignment->find('all',
				array('condition' => array('Assignment.project_id' => $id), 'recursive' => 1));
			$this->loadModel('User');
			for($i=0;$i<count($assignments);++$i)
			{
				$assignments[$i]['MatchSigned'] = array();
				$assignments[$i]['MatchUnsigned'] = array();
				for($j=0;$j<count($assignments[$i]['Match']);++$j)
				{
					$s = 0;
					$us = 0;
					$user = $this->User->find('first',
											array(	'condition' => array('User.id' => $assignments[$i]['Match']['user_id']),
													'recursive' => -1));
					if($assignments[$i]['Match'][$j]['signed'] == 0)
					{
						$assignments[$i]['MatchUnsigned'][$us] = $assignments[$i]['Match'][$j];
						$assignments[$i]['MatchUnsigned'][$us++]['User'] = $user['User'];
					}
					else if($assignments[$i]['Match'][$j]['signed'] == 1)
					{
						$assignments[$i]['MatchSigned'][$s] = $assignments[$i]['Match'][$j];
						$assignments[$i]['MatchSigned'][$s++]['User'] = $user['User'];
					}
				}
				unset($assignments[$i]['Match']);
			}

			$this->loadModel('Department');
			$departments = $this->Department->find('all',array('recursive' => -1));
			
			$this->set('assignments', $assignments);
			$this->set('projectId', $id);
			$this->set('departments', $department);
		}
	}

	public function deleteAssignment($id = null)
	{
		if($id)
		{
			$this->setErrorInformation($this->Assignment->delete($id),'Deleting data error!');
		}
	}

	public function recommendUser()
	{
		if($this->request->is('post')/* && $this->checkInPutData($this->request->data)*/)
		{
			$this->loadModel('Timetable');
			$this->loadModel('User');
			$timeTablesTableName = $this->Timetable->tablePrefix . $this->Timetable->useTable;
			$usersTableName = $this->Timetable->tablePrefix . $this->User->useTable;
			debug($this->request->data);
			$leisures = $this->getLeisureList($this->request->data['start_leisure'],$this->request->data['end_leisure']);
			if(count($leisures) > 0)
			{
				$query = 'SELECT `num` FROM `'.$usersTableName.'` WHERE `id` IN ( ';
				$query .= 'SELECT `'.$this->Timetable->tablePrefix.'no_lasting_table0`.`user_id` FROM ';
				for($i=0;$i<count($leisures);++$i)
				{
					$query .= '(SELECT  `user_id` ,  `leisure` , `checked` FROM  `'.$timeTablesTableName.'` WHERE  `leisure` = \''.$leisures[$i].'\' AND `checked` = \'1\') AS '.$this->Timetable->tablePrefix.'no_lasting_table'.strval($i).', ';
				}
				$query = substr($query, 0,strlen($query) - 2);
				$query .= ' WHERE 1 AND ';
				for($i=1;$i<count($leisures);++$i)
				{
					$query .= $this->Timetable->tablePrefix.'no_lasting_table'.strval($i-1).'.user_id'.' = '.$this->Timetable->tablePrefix.'no_lasting_table'.strval($i).'.user_id'.' AND ';
				}
				$query = substr($query, 0,strlen($query) - 5);
				$query .= ') ORDER BY `pitch_times` DESC LIMIT '.strval($this->request->data['the_number_needed']);
				$row = $this->Timetable->query($query);
			}
		}
	}

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