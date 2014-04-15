<?php
$usersNum = array();
$userInfo = array();
foreach ($users as $user)
{
	array_push($usersNum, $user['User']['num']);
	$info = array(
		'name' => $user['Detail']['name'],
		'num' => $user['User']['num'],
		'sex' => $user['Detail']['sex'],
		'department_name' => $user['Department']['name'],
		'mobile' => $user['Detail']['mobile'],
		'short_mobile' =>$user['Detail']['shortMobile'],
		'pitch_times' => $user['User']['pitch_times'],
		'operator' => $this->Authority->npLink('增加',
				array('controller' => 'Matches', 'action' => 'add',
					$assignmentId,
					json_encode(array($user['User']['num']))
					),
				array('class' => 'add-pitch-user')
			)
		);
	array_push($userInfo, $info);
}
$userInfo['user_count'] = count($users);
$userInfo['all_users'] = $this->Authority->npLink('添加全部',
										array('controller' => 'Matches', 'action' => 'add', $assignmentId, json_encode($usersNum)),
										array('class' => 'add-pitch-user'));
echo json_encode($userInfo);
?>