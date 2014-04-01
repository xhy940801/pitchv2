<?php

App::uses('AppHelper', 'View/Helper');

class AuthorityHelper extends AppHelper
{
	public $pitch_pages_nnlogin;
	public $pitch_authority;
	public $userAuthority;
	public $view;

	public function __construct(View $view, $settings = array())
	{
		parent::__construct($view, $settings);
		$this->pitch_pages_nnlogin = $settings['pitch_pages_nnlogin'];
		$this->pitch_authority = $settings['pitch_authority'];
		$this->userAuthority = $settings['userAuthority'];
		$this->view = $view;
    }

	public function npHTML($controller = null, $action = null, $html = '')
	{
		if(!$this->Session->check('userInfo') && !$this->notNeedLogin($controller, $action))
			return '';
		//check authority
		$neededAuthority = $this->getCurrentPagesAuthority($controller, $action);
		if($neededAuthority > 0 && $this->userAuthority > $neededAuthority)
			return '';
		return $html;
	}

	public function npLink($title, $url = null, $options = array(), $confirmMessage = false,
							$controller = null, $action = null)
	{
		if($controller == null)
			$controller = $url['controller'];
		if($action == null)
			$action = $url['action'];
		if(!isset($this->userAuthority) && !$this->notNeedLogin($controller, $action))
			return '';
		//check authority
		$neededAuthority = $this->getCurrentPagesAuthority($controller, $action);
		if($neededAuthority > 0 && $this->userAuthority > $neededAuthority)
			return '';
		return $this->view->Html->link($title, $url, $options, $confirmMessage);
	}

	private function getCurrentPagesAuthority($controller, $action)
	{
		if(isset($this->pitch_authority[$controller][$action]))
			return $this->pitch_authority[$controller][$action];
		else if(isset($this->pitch_authority[$controller]))
			return $this->pitch_authority[$controller]['_default'];
		else
			return $this->pitch_authority['_default'];
	}

	private function notNeedLogin($controller, $action)
	{
		if(isset($this->pitch_pages_nnlogin[$controller][$action])
			&& $this->pitch_pages_nnlogin[$controller][$action] == 1)
			return true;
		return false;
	}
}

?>