<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	public $layout = 'user';
	public function login()
	{
		$this->layout = 'blank';
		if($this->request->is('post'))
		{
			App::import('Vendor','AuthBBT');
			$authBBT = new AuthBBT();
			$user=$authBBT->checkUser($this->request->data['username'],$this->request->data['psd']);
			if(isset($user['returnData']['User']))
			{
				$isExist = $this->User->find('first',array('conditions' => array('User.num' => $user['returnData']['User']['num']),'recursive' => -1));
				$data = array(
						'User' => array(
							'num' => $user['returnData']['User']['num'],
							'group_id' => $user['returnData']['User']['group_id'],
							'department_id' => $user['returnData']['User']['department_id'],
							));
				if(empty($isExist))
				{
					$data['User']['authority'] = 7 + $user['returnData']['User']['group_id'];
					$this->User->create();
					if(!$this->User->save($data))
					{
						$this->set('successful',0);
						$this->set('errorInformation','Saving data error!');
					}
					else
					{
						$data['User']['id'] = $this->User->id;
						$this->setUserSession($data);
						$this->redirect(array('controller' => 'Users','action' => 'showUserInformation'));
						exit();
					}
				}
				else
				{
					$this->User->id = $isExist['User']['id'];
					 if(!$this->User->save($data))
					 	cakelog::write(LOG_ERR,'Update data fail');
					$data['User']['id'] = $isExist['User']['id'];
					$data['User']['authority'] = $isExist['User']['authority'];
					$this->setUserSession($data);
					$this->redirect(array('controller' => 'Users','action' => 'showUserInformation'));
					exit();
				}
			}
			else
			{
				$this->set('successful',0);
				$this->set('errorInformation','Username or password is invalid!');
			}
		}
	}

	public function showUserInformation()
	{
		$result = $this->getOne($this->userInfo['User']['num'],$this->userInfo['User']['id']);
	//	$result['error'] = '';
		if($result['error'] == '')
		{
			$this->set('info',$result['info']);
			$this->set('timetable',$result['timetable']);
			$this->set('successful',1);
		}
		else if($result['error'] == 'NUINFO')
		{
			$this->Session->destroy();
			$this->redirect(array('controller' => 'Users', 'action' => 'login'));
			exit();
		}
		else
		{
			$this->set('successful',0);
			$this->set('errorInformation','Unknow error!');
		}
	}

	public function logout()
	{
		$this->Session->destroy();
		$this->redirect(array('controller' => 'Users', 'action' => 'login'));
		exit();
	}

/*	public function reflashUser()
	{
		App::import('Vendor','AuthBBT');
		$authBBT = new AuthBBT();
		$Users = $authBBT->getAllUsers();
		$userinfos = $Users['returnData'];
		$u = array();
		for($i = 0;$i<count($userinfos);++$i)
		{
			$u[$i]['num'] = $userinfos[$i]['User']['num'];
			$u[$i]['group_id'] = $userinfos[$i]['User']['group_id'];
			$u[$i]['department_id'] = $userinfos[$i]['User']['department_id'];

		}
		debug($this->User->deleteAll('1',true,false));
		$this->User->Query('ALTER TABLE  `pitchv2_users` AUTO_INCREMENT = 1');
		$this->User->saveAll($u);
	}*/

	public function showAllUsers($condition = -1, $page = 1)
	{
		$limit = 10;
		$this->set('limit', $limit);
		$this->set('curPage', $page);

		$this->layout = 'manager';
		$this->set('condition', $condition);
		App::import('Vendor','AuthBBT');
		$authBBT = new AuthBBT();
		$usersNum = array();
		$users = array();

		$this->loadModel('Department');
		$departments = $this->Department->find('all');
		$this->set('departments', $departments);
		$this->set('userDepartment', $this->userInfo['User']['department_id']);

		if($condition == $this->userInfo['User']['department_id'])
			$condition = -1;
		if($condition == -1)
		{
			$count = $this->User->find(
				'count',
				array(
					'conditions' => array(
						'User.department_id' => $this->userInfo['User']['department_id']
						)
					)
				);
			$this->set('count', $count);

			$users = $this->User->find(
				'all',
				array(
					'conditions' => array(
						'User.department_id' => $this->userInfo['User']['department_id']
						),
					'limit' => $limit,
					'page' => $page,
					'recursive' => -1
					)
				);
			$users = $this->getDetailInfo($users, $authBBT);
		}
		else if($condition > 0)
		{
			$count = $this->User->find(
				'count',
				array(
					'conditions' => array(
						'User.department_id' => $condition
						)
					)
				);
			$this->set('count', $count);

			$users = $this->User->find(
				'all', array(
					'conditions' => array(
						'User.department_id' => $condition
						),
					'limit' => $limit,
					'page' => $page,
					'recursive' => -1
					)
				);
			$users = $this->getDetailInfo($users, $authBBT);
		}
		else if($condition == -2)
		{
			$count = $this->User->find('count');
			$this->set('count', $count);

			$users = $this->User->find(
				'all', array(
					'limit' => $limit,
					'page' => $page,
					'recursive' => -1
					)
				);
			$users = $this->getDetailInfo($users, $authBBT);
		}
		$this->set('users', $users);
		$this->set('condition', $condition);
	}

	public function showOneUser($uNum = null)
	{
		if($uNum = null)
			exit();
		$user = $this->User->find('first',array('conditions' => array('User.num' => $uNum),'recursive' => -1));
		$result = $this->getOne($uNum,$user['User']['id']);
		if($result['error'] == '')
		{
			$this->set('info',$result['info']);
			$this->set('timetable',$result['timetable']);
			$this->set('successful',1);
		}
		else
		{
			$this->set('successful',0);
			$this->set('errorInformation','Error! Error code : '.$result['error']);
		}
		$this->rander('show_user_information');
	}

	private function getDetailInfo($users, $authBBT)
	{
		for($i=0;$i<count($users);++$i)
				$usersNum[$i] = $users[$i]['User']['num'];
			
		$userOtherInfo = $authBBT->getAllUsers(array('User.num' => $usersNum));
		if(isset($userOtherInfo['returnData']))
			$userOtherInfo = $userOtherInfo['returnData'];

		$usersMap = array();
		foreach ($userOtherInfo as $user)
		{
			$usersMap[$user['User']['num']] = $user;
		}

		$newUsers = array();

		for($i=0;$i<count($users);++$i)
		{
			if(isset($usersMap[$users[$i]['User']['num']]))
			{
				$newUsers[$i] = $usersMap[$users[$i]['User']['num']];
				$newUsers[$i]['User'] = array_merge($users[$i]['User'], $usersMap[$users[$i]['User']['num']]['User']);
			}
		}

		return $newUsers;
	}

	private function getOne($uNum = null,$uId = null)
	{
		$result = array('timetable' => array(),'info' => array(),'error' => '');
		if($uNum == null || $uId == null)
		{
			$result['error'] = 'IPERROR';
			return $result;
		}
		App::import('Vendor','AuthBBT');
		$authBBT = new AuthBBT();
		$info = $authBBT->getOneUser(array('User.num' => $uNum));
		if(empty($info['returnData']))
		{
			cakelog::write(LOG_ERR,'Unknow error');
			$result['error'] = 'NUINFO';
			return $result;
		}
		else
		{
			$info = $info['returnData'];
			$otherInfo = $this->User->find('first',array('conditions' => array('User.num' => $uNum),'recursive' => -1));
			$info['Other'] = array(
				'last_login_date' => $otherInfo['User']['modified'],
				'login_times' => $otherInfo['User']['login_times'],
				'pitch_times' => $otherInfo['User']['pitch_times']);
			$this->loadModel('Timetable');
			$timetable = $this->Timetable->find('all',array('conditions' => array('Timetable.user_num' => $uNum),'recursive' => -1));
			$timetable = $this->departTimetable($timetable);
			$result['timetable'] = $timetable;
			$result['info'] = $info;
			return $result;
		}
	}

	private function setUserSession($user)
	{
		$information = array(
			'User'=>array(
				'num' => $user['User']['num'],
				'id' => $user['User']['id'],
				'authority' => $user['User']['authority'],
				'department_id' => $user['User']['department_id'],
				'group_id' => $user['User']['group_id']
				));
		$this->Session->write('userInfo',$information);
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