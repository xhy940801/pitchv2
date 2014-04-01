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
}
?>