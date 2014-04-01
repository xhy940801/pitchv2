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
						$data[$count++] = array("leisure" => $abcdefg[$j].$i,'user_num' => $this->userInfo['User']['num'],'checked' => 0);
				}
			}
			if(!$this->Timetable->deleteAll(array('user_num' => $this->userInfo['User']['num'],'checked' => 0)))
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
		$timetable = $this->Timetable->find('all',array('conditions' => array('Timetable.user_num' => $this->userInfo['User']['num']),'recursive' => -1));
		$timetable = $this->departTimetable($timetable);
		if(empty($timetable[0]))
			$oldTimetable = $timetable[1];
		else
			$oldTimetable = $timetable[0];
		$this->set('oldTimetable',$oldTimetable);
		$this->set('successful',$suc);
		$this->set('isEdit',$isEdit);
	}

	public function checkTimetable($num = null)
	{
		if($num && $this->data->is('post'))
		{
			$this->loadModel('User');
			$user = $this->User->find('first',array('conditions' => array('num' => $num)));
			if($user['User']['authority'] > $this->userInfo['User']['authority'])
			{
				$this->Timetable->deleteAll(array('user_num' => $num,'checked' => 1));
				$this->Timetable->updateAll(array('Timetable.checked' => 1),array('Timetable.user_num' => $num));
				$this->set('successful',1);
			}
			else
			{
				$this->set('successful',0);
				$this->set('errorInfomation','Haven\'t authority');
			}
		}
	}

	public function showOnesUncheckedTimetable($num = null)
	{
		if($num)
		{
			$uncheckedTimetable = $this->Timetable->find('all',array('conditions' => array('Timetable.user_num' => $num,'checked' => 0),'recursive' => -1));
			$this->set('uncheckedTimetable',$uncheckedTimetable);
		}
	}

	public function showOnesCheckedTimetable($num = null)
	{
		if($num)
		{
			$checkedTimetable = $this->Timetable->find('all',array('conditions' => array('Timetable.user_num' => $id,'checked' => 1),'recursive' => -1));
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