<?php
/**
 * 百步梯内部管理系统开放接口
 *
 * @version 2.0
 * @author Cogie Liyan
 */

class AuthBBT {
	//应用名称
	private $app_name = 'mm';
	//设置Key
	private $app_key = 'test';
	//设置默认连接地址
	private $baseUrl = 'http://office.100steps.net/bbter/OpenInterfaces/';
	//private $baseUrl = 'http://southbbt.sinaapp.com/openapi/';
	//private $baseUrl = 'http://222.201.132.27/liyan/membermanage/openapi/';
	
	private $error;
	
	//构造函数
	function __construct() {
		$this->error = 0;
	}
	
	function __destruct() {
	}
	
/**
 * begin：主要解析程序，负责加密解密的编码
 */

	private function php_encrypt($txt) {
		srand((double) microtime() * 1000000);
		$encrypt_key = md5(rand(0, 32000));
		$ctr         = 0;
		$tmp         = '';
		for ($i = 0; $i < strlen($txt); $i++) {
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			$tmp .= $encrypt_key[$ctr] . ($txt[$i] ^ $encrypt_key[$ctr++]);
		}
		return base64_encode(self::__key($tmp, $this->app_key));
	}
	
	private function php_decrypt($txt) {
		$txt = self::__key(base64_decode($txt), $this->app_key);
		$tmp = '';
		for ($i = 0; $i < strlen($txt) - 1; $i++) {
			$md5 = $txt[$i];
			$tmp .= $txt[++$i] ^ $md5;
		}
		return $tmp;
	}
	
	private function __key($txt, $encrypt_key) {
		$encrypt_key = md5($encrypt_key);
		$ctr         = 0;
		$tmp         = '';
		for ($i = 0; $i < strlen($txt); $i++) {
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			$tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
		}
		return $tmp;
	}

/**
 * end：主要解析程序，负责加密解密的编码
 */


/**
 * begin：接口调用的主要函数
 */
 
	private function decodeJsonData($data) {
		$arr_data = json_decode($this->php_decrypt($data), true);
		if ($arr_data['error'] != '0' && $this->error == '0') {
			$this->error = $arr_data['error'];
			return false;
		}
		return $arr_data;
	}

	//getData的子程序，用以返回正确的请求地址
	private function getApiUrl($interfaceName) {
		$url = $this->baseUrl . $interfaceName;
		return $url;
	}

	private function getData($interfaceName, $user_data, $arr_data) {
		$temp['app_name']  = $this->app_name;
		$temp['app_user']  = $this->php_encrypt(json_encode($user_data));
		$temp['app_query'] = $this->php_encrypt(json_encode($arr_data));
		
		$url     = $this->getApiUrl($interfaceName);
		$context = array(
			'http' => array(
				'method' => 'POST',
				/*'header' => "Content-type: application/x-www-form-urlencoded\r\n" 
				. "User-Agent : BBT Tech\r\n" 
				. "Content-length: " . (strlen($content_parameter) + 8),*/
				'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
				'content' => http_build_query($temp),
				'timeout' => 10
			)
		);
		unset($temp);
		$stream_context = stream_context_create($context);
		unset($context);

		$cnt            = 0;
		while ($cnt < 3 && ($data = @file_get_contents($url, FALSE, $stream_context)) === FALSE) {
			$cnt++;
		}
		if ($cnt == 3) {
			list($version, $status_code, $msg) = explode(' ', $http_response_header[0], 3);
			if ($status_code == '401') {
				$this->error = 1;
			}
			return '获取超时！';
		}
		return $this->decodeJsonData($data);
	}
	


/**
 * end：接口调用的主要函数
 */


/**
 * begin：正式接口
 */
 
	//负责返回错误原因——需要修改
	public function getError() {
		if ($this->error == 0) {
			return '无错误！';
		}
		$errorTxt = '错误代号:' . $this->error . '错误解析：';
		switch ($this->error) {
			case 1:
				$errorTxt .= 'App信息错误';
				break;
			case 2:
				$errorTxt .= '用户错误';
				break;
			case 3:
				$errorTxt .= '请求参数错误';
				break;
			case 4:
				$errorTxt .= '函数getData参数个数出错！';
				break;
			case 5:
				$errorTxt .= 'api缺少必要参数！';
				break;
			case 6:
				$errorTxt .= '！';
				break;
			default:
				$errorTxt .= '未知错误！';
		}
		return $errorTxt;
	}
	
	public function packUserData($num, $password) {
		return array('User.num'=>$num, 'User.password'=>$password);
	}
	
	public function checkUser($num, $password) {
		return $this->getData('checkUser', $this->packUserData($num, $password), array());
	}

	public function getOneUser($conditions) {
		return $this->getData('getOneUser', array(), $conditions);
	}

	public function getAllUsers($conditions=array()) {
		return $this->getData('getAllUsers', array(), $conditions);
	}

	public function getAllUsersList($conditions=array()) {
		return $this->getData('getAllUsersList', array(), $conditions);
	}

	public function getOneGroup($conditions) {
		return $this->getData('getOneGroup', array(), $conditions);
	}

	public function getAllGroups($conditions=array()) {
		return $this->getData('getAllGroups', array(), $conditions);
	}

	public function getOneDepartment($conditions) {
		return $this->getData('getOneDepartment', array(), $conditions);
	}

	public function getAllDepartments($conditions=array()) {
		return $this->getData('getAllDepartments', array(), $conditions);
	}

	public function getOneBulletin($conditions) {
		return $this->getData('getOneBulletin', array(), $conditions);
	}

	public function getAllBulletins($conditions=array()) {
		return $this->getData('getAllBulletins', array(), $conditions);
	}

/**
 * end：正式接口
 */
}
?>