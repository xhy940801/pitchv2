<?php echo $this->Html->script('recommendSystem'); ?>
<?php echo $this->Html->script('jquery.json-2.4.min'); ?>
<div id="paddinHead"></div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th cospan="2"><?=$assignment['Assignment']['name']?></th>
		</tr>
	</thead>
	<tr>
		<td>所属项目名称：</td><td><?php echo $assignment['Project']['name']; ?></td>
	</tr>
	<tr>
		<td>所需人数：</td><td><?php echo $assignment['Assignment']['the_number_needed']; ?></td>
	</tr>
	<tr>
		<td>已添加人数：</td><td><?php echo (count($assignment['MatchSigned']) + count($assignment['MatchUnsigned'])); ?></td>
	</tr>
	<tr>
		<td>日期：</td><td><?php echo $assignment['Assignment']['date']; ?></td>
	</tr>
	<tr>
		<td>起止时间：</td>
		<td>
			<?php echo $this->Leisure->getStartEndTime($assignment['Assignment']['start_leisure'], 
		$assignment['Assignment']['end_leisure']); ?>
		</td>
	</tr>
</table>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th cospan="7">已签到人员：</th>
		</tr>
		<tr>
			<th>姓名：</th><th>学号：</th><th>性别：</th><th>部门：</th><th>手机：</th><th>短号：</th><th>操作：</th>
		</tr>
	</thead>
	<?php foreach ($assignment['MatchSigned'] as $match)
	{
		$user = $match['User'];
	?>
	<tr>
		<td><?=$user['Detail']['name']?></td>
		<td><?=$user['User']['num']?></td>
		<td><?=$user['Detail']['sex']?></td>
		<td><?=$user['Department']['name'];?></td>
		<td><?=$user['Detail']['mobile']?></td>
		<td><?=$user['Detail']['shortMobile']?></td>
		<td>
			<?=$this->Authority->npLink('删除', array('controller' => 'Matches', 'action' => 'del', $match['id']))?>
		</td>
	</tr>
	<?php 
	}
	unset($match);
	?>
	<tr>
		<th>总计人数：</th><td colspan="6"><?=count($assignment['MatchSigned'])?></td>
	</tr>
</table>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th cospan="7">未签到人员：</th>
		</tr>
		<tr>
			<th>姓名：</th><th>学号：</th><th>性别：</th><th>部门：</th><th>手机：</th><th>短号：</th><th>操作：</th>
		</tr>
	</thead>
	<?php foreach ($assignment['MatchUnsigned'] as $match)
	{
		$user = $match['User'];
	?>
	<tr>
		<td><?=$user['Detail']['name']?></td>
		<td><?=$user['User']['num']?></td>
		<td><?=$user['Detail']['sex']?></td>
		<td><?=$user['Department']['name'];?></td>
		<td><?=$user['Detail']['mobile']?></td>
		<td><?=$user['Detail']['shortMobile']?></td>
		<td>
			<?=$this->Authority->npLink('签到', array('controller' => 'Matches', 'action' => 'register', $match['id']))?>
			<?=$this->Authority->npLink('删除', array('controller' => 'Matches', 'action' => 'del', $match['id']))?>
		</td>
	</tr>
	<?php 
	}
	unset($match);
	?>
	<tr>
		<th>总计人数：</th><td colspan="6"><?=count($assignment['MatchUnsigned'])?></td>
	</tr>
</table>
<table class="table table-bordered table-hover" id="recommendUser">
	<thead>
		<tr>
			<th>
				<a class="recommendUserButton btn btn-primary" data-loading-text="正在加载" href="<?=$this->webroot.'Assignments/recommend/'.$assignment['Assignment']['id']?>">
					推荐名单
				</a>
			</th>
			<th colspan="6">
				<?php
				foreach ($groups as $group)
				{
				?>
				<label class="checkbox inline">
					<input type="checkbox" class="check_group" value="<?=$group['Group']['id']?>">
					<?=$group['Group']['name']?>
				</label>
				<?php
				}
				?>
			</th>
			<th id="loadingImg" group-json="[&quot;6&quot;]"></th>
		</tr>
		<tr>
			<th>姓名：</th><th>学号：</th><th>性别：</th><th>部门：</th><th>手机：</th><th>短号：</th><th>已摆摊次数：</th><th>操作：</th>
		</tr>
	</thead>
	<tbody id="recommendBody">
		
	</tbody>
</table>