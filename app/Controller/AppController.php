<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	protected $pitch_pages_nnlogin = array('Users' => array('login' => 1));
	protected $pitch_authority = array('_default' => 13,
		'Pages' => array(
			'_default' => -1),
		'Users' => array(
			'_default' => 13,
			'login' => -1),
		'Timetables' => array(
			'_default' => 13,
			'checkTimetable' => 7),
		'Matchs' => array(
			'_default' => 13,
			'register' => 7,
			'del' => 7)
		);

	protected $userInfo;
	public function beforeFilter()
	{
		//check login
		if(!$this->Session->check('userInfo') && !$this->notNeedLogin())
		{
			$this->redirect(array('controller' => 'Users', 'action' => 'login'));
			exit();
		}
		else
			$this->userInfo = $this->Session->read('userInfo');

		//check authority
		$neededAuthority = $this->getCurrentPagesAuthority();
		if($neededAuthority > 0 && $this->userInfo['User']['authority'] > $neededAuthority)
		{
			$this->redirect(array('controller' => 'Pages','action' => 'error404'));
			exit();
		}
	}

	public function afterFilter()
	{
		$url = $this->Session->read('lastPos');
		if($url == null || $url != $this->params->url);
			$this->Session->write('lastPos', $this->params->url);
	}

	protected function returnLastPos()
	{
		$url = $this->Session->read('lastPos');
		if($url != null);
			$this->redirect('/'.$url);
	}

	protected function setErrorInformation($boolean = true,$information = '')
	{
		if($boolean)
		{
			$this->set('successful',1);
			$this->set('errorInformation','');
		}
		else
		{
			$this->set('successful',0);
			$this->set('errorInformation',$information);
		}
	}

	private function notNeedLogin()
	{
		if(isset($this->pitch_pages_nnlogin[$this->params['controller']][$this->params['action']]) 
			&& $this->pitch_pages_nnlogin[$this->params['controller']][$this->params['action']] == 1)
			return true;
		return false;
	}

	private function getCurrentPagesAuthority()
	{
		if(isset($this->pitch_authority[$this->params['controller']][$this->params['action']]))
			return $this->pitch_authority[$this->params['controller']][$this->params['action']];
		else if(isset($this->pitch_authority[$this->params['controller']]))
			return $this->pitch_authority[$this->params['controller']]['_default'];
		else
			return $this->pitch_authority['_default'];
	}


	protected function getOneUserInfoByNum($num = 0)
	{
		App::import('Vendor','AuthBBT');
		$authBBT = new AuthBBT();
		return $authBBT->getOneUser(array('User.num' => $num));
	}

	protected function getSomeUserInfoByNum($num = array())
	{
		App::import('Vendor','AuthBBT');
		$authBBT = new AuthBBT();
		return $authBBT->getAllUsers(array('User.num' => $num));
	}
}
