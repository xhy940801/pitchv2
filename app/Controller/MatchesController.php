<?php

App::uses('AppController', 'Controller');

class MatchesController extends AppController
{
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

	public function add($id = null, $users = '[]')
	{
		if(is_numeric($id))
		{
			$users = $this->decodeUsers($users);
			App::import('Vendor','AuthBBT');
			$authBBT = new AuthBBT();
			$invaildUsers = $authBBT->getAllUsers(array('num' => $users));
			$i = 0;
			$data = array();
			foreach ($invaildUsers['returnData'] as $user)
			{
				$data[$i] = array('Match' => array('assignment_id' => $id, 'user_num' => $user['User']['num'], 'signed' => false));
			}
			$this->Match->saveAll($data);
			$this->returnLastPos();
		}

	}

	public function register($id = null)
	{
		if($id != null)
		{
			$data = array('id' => $id, 'signed' => 1);
			$this->Match->save($data);
		}
		$this->returnLastPos();
	}

	public function del($id = null)
	{
		if($id != null)
		{
			$this->Match->delete($id);
		}
		$this->returnLastPos();
	}

	private function decodeUsers($users)
	{
		$users = json_decode($users);
		$i=0;
		$usersId = array();
		foreach ($users as $user)
		{
			if(is_numeric($user))
				$usersId[$i++] = $user;
		}
		return $usersId;
	}
}
?>