<?php

App::uses('AppHelper', 'View/Helper');

class AuthorityHelper extends AppHelper
{
	public $pitch_pages_nnlogin;
	public $pitch_authority;
	public $userAuthority;

	public function __construct(View $view, $settings = array())
	{
		parent::__construct($view, $settings);
		$this->pitch_pages_nnlogin = $settings['pitch_pages_nnlogin'];
		$this->pitch_authority = $settings['pitch_authority'];
		$this->userAuthority = $settings['userAuthority'];
		debug($settings);
    }

	public function npHTML($controller = null, $action = null, $html = '')
	{
		if(!$this->Session->check('userInfo') && !$this->notNeedLogin($controller, $action))
		{
			return '';
		}
		else
			$this->userInfo = $this->Session->read('userInfo');

		//check authority
		$neededAuthority = $this->getCurrentPagesAuthority($controller, $action);
		if($neededAuthority > 0 && $this->userAuthority > $neededAuthority)
		{
			$this->redirect(array('controller' => 'Pages','action' => 'error404'));
			exit();
		}
	}

	// public function npLink(string $title, mixed $url = null, array $options = array(), string $confirmMessage = false)
	// {

	// }

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