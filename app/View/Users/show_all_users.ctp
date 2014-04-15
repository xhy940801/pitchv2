<?php
echo $this->Html->script('disabled_button');
function isActive($n, $c)
{
	if($n == 1)
	{
		if($c == -1)
			return 'active';
	}
	else if($n == 2)
	{
		if($c == -2)
			return 'active';
	}
	else if($n == 3)
	{
		if($c >= 0)
			return 'active';
	}
	return '';
}
?>
<div id="paddinHead"></div>
<ul class="nav nav-tabs">
	<li class="<?=isActive(1, $condition)?>">
		<?=$this->Html->link('查看同部门', array('controller' => 'Users', 'action' => 'showAllUsers', -1))?>
	</li>
	<li class="<?=isActive(2, $condition)?>">
		<?=$this->Html->link('查看同部门', array('controller' => 'Users', 'action' => 'showAllUsers', -2))?>
	</li>
	<li class="dropdown <?=isActive(3, $condition)?>" id="users-nav-bar">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户信息</a>
		<ul class="dropdown-menu">
			<?php
			foreach ($departments as $department)
			{
				$department = $department['Department'];
				if($department['id'] != $userDepartment)
				{
			?>
			<li><?php echo $this->Html->link($department['name'],array('controller' => 'Users','action' => 'showAllUsers', $department['id'])); ?></li>
			<?php
				}
			}
			unset($department);
			?>
		</ul>
	</li>
</ul>

<div class="pagination">
  <ul>
  	<?php
  		$isActive = '';
  		$prevPage = $curPage - 1;
  		if($curPage == 1)
  		{
  			$isActive = 'disabled';
  			$prevPage = $curPage;
  		}
  	?>
    <li class="<?=$isActive?>">
    	<?=$this->Html->link('Prev', array('controller' => 'Users', 'action' => 'showAllUsers', $condition, $prevPage))?>
    </li>
    <?php
    for($i=0,$page=1;$i<$count;++$page, $i+=$limit)
    {
    	$isActive = '';
    	if($page == $curPage)
    		$isActive = 'active';
    ?>
    <li class="<?=$isActive?>">
    	<?=$this->Html->link($page, array('controller' => 'Users', 'action' => 'showAllUsers', $condition, $page))?>
    </li>
    <?php
	}
	?>
	<?php
  		$isActive = '';
  		$nextPage = $curPage + 1;
  		if($curPage * $limit >= $count)
  		{
  			$isActive = 'disabled';
  			$nextPage = $curPage;
  		}
  	?>
    <li class="<?=$isActive?>">
    	<?=$this->Html->link('Next', array('controller' => 'Users', 'action' => 'showAllUsers', $condition, $nextPage))?>
    </li>
  </ul>
</div>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>姓名：</th><th>学号：</th><th>性别：</th><th>部门：</th><th>职位：</th><th>摆摊次数：</th><th>操作：</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($users as $user)
		{
		?>
		<tr>
			<td><?=$user['Detail']['name']?>
			</td><td><?=$user['User']['num']?></td>
			<td><?=$user['Detail']['sex']?></td>
			<td><?=$user['Department']['name']?></td>
			<td><?=$user['Group']['name']?></td>
			<td><?=$user['User']['pitch_times']?></td>
			<td></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>


