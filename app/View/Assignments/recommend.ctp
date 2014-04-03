<table class="table">
	<thead>
		<tr>
			<th>姓名：</th><th>学号：</th><th>性别：</th><th>部门：</th><th>手机：</th><th>短号：</th><th>已摆摊次数：</th><th>操作：</th>
		</tr>
	</thead>
	<?php
	$usersNum = array();
	foreach ($users as $user)
	{
		array_push($usersNum, $user['User']['num']);
	?>
	<tr>
		<td><?=$user['Detail']['name']?></td>
		<td><?=$user['User']['num']?></td>
		<td><?=$user['Detail']['sex']?></td>
		<td><?=$user['Department']['name']?></td>
		<td><?=$user['Detail']['mobile']?></td>
		<td><?=$user['Detail']['shortMobile']?></td>
		<td><?=$user['User']['pitch_times']?></td>
		<td><?=$this->Authority->npLink('增加',
											array('controller' => 'Matches', 'action' => 'add',
												json_encode(array($user['User']['num']))),
											array('class' => 'add-pitch-user'))?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<th>总计人数：</th>
		<th><?=count($users)?></th>
		<th>
			<?=$this->Authority->npLink('添加全部',
											array('controller' => 'Matches', 'action' => 'add', json_encode($usersNum)),
											array('class' => 'add-pitch-user'))?>
		</th>
	</tr>
</table>