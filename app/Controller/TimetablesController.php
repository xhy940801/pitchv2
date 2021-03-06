<?php

App::uses('AppController', 'Controller');

class TimetablesController extends AppController
{
	public $layout="user";
	public function edit()
	{
		$suc = 1;
		$isEdit = 0;

		if($this->request->is('post'))
		{
			$isEdit = 1;
			$abcdefg = array('a','b','c','d','e','f','g');
			$count = 0;
			$data = array();
			for($i=0;$i<6;++$i)
			{
				for($j=0;$j<7;++$j)
				{
					if($this->request->data[$abcdefg[$j].$i] == '1')
						$data[$count++] = array("leisure" => $abcdefg[$j].$i,'user_id' => $this->userInfo['User']['id'],'checked' => 0);
				}
			}
			if(!$this->Timetable->deleteAll(array('user_id' => $this->userInfo['User']['id'],'checked' => 0)))
			{
				$suc = 0;
				$this->set('successful',0);
				$this->set('errorInformation','Delete timetable fail!');
			}
			else if(!empty($data) && $this->Timetable->saveAll($data))
				$this->set('successful',1) ;
			else
			{
				$suc = 0;
				$this->set('successful',0);
				$this->set('errorInformation','Save timetable fail!');
			}
		}
		$timetable = $this->Timetable->find('all',array('condition' => array('Timetable.user_id' => $this->userInfo['User']['id']),'recursive' => -1));
		$timetable = $this->departTimetable($timetable);
		if(empty($timetable[0]))
			$oldTimetable = $timetable[1];
		else
			$oldTimetable = $timetable[0];
		$this->set('oldTimetable',$oldTimetable);
		$this->set('successful',$suc);
		$this->set('isEdit',$isEdit);
	}

	public function checkTimetable($id = null)
	{
		if($id && $this->data->is('post'))
		{
			$this->loadModel('User');
			$user = $this->User->find('first',array('condition' => array('id' => $id)));
			if($user['User']['authority'] > $this->userInfo['User']['authority'])
			{
				$this->Timetable->deleteAll(array('user_id' => $id,'checked' => 1));
				$this->Timetable->updateAll(array('Timetable.checked' => 1),array('Timetable.user_id' => $id));
				$this->set('successful',1);
			}
			else
			{
				$this->set('successful',0);
				$this->set('errorInfomation','Haven\'t authority');
			}
		}
	}

	public function showOnesUncheckedTimetable($id = null)
	{
		if($id)
		{
			$uncheckedTimetable = $this->Timetable->find('all',array('condition' => array('Timetable.user_id' => $id,'checked' => 0),'recursive' => -1));
			$this->set('uncheckedTimetable',$uncheckedTimetable);
		}
	}

	public function showOnesCheckedTimetable($id = null)
	{
		if($id)
		{
			$checkedTimetable = $this->Timetable->find('all',array('condition' => array('Timetable.user_id' => $id,'checked' => 1),'recursive' => -1));
			$this->set('checkedTimetable',$checkedTimetable);
		}
	}

	private function departTimetable($timetable)
	{
		$t = array(array(),array());
		for($i=0,$j=0,$k=0;$i<count($timetable);++$i)
		{
			if($timetable[$i]['Timetable']['checked'])
				$t[1][$j++] = $timetable[$i];
			else
				$t[0][$k++] = $timetable[$i];
		}
		return $t;
	}
}
?>