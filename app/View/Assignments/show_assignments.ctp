<div id="paddinHead">
</div>
<?php
if(count($assignments) <= 0)
{
?>

<div class="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	没有任务哦亲！
</div>
<p>没有任务哦亲，点<?php echo $this->Html->link('这里', 
					array('controller' => 'Assignments', 'action' => 'addAssignment', $projectId));?>添加一个</p>
<?php
}
else
{
	$i = 0;
	debug($assignments);
	foreach ($assignments as $assignment)
	{
?>
<!-- <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="< ?php echo '#collapse'.$i; ?>">
                < ?php echo $project['Project']['name']; ?>
            </a>
        </div>
        <div id="< ?php echo 'collapse'.$i; ?>" class="accordion-body collapse">
            <div class="accordion-inner"> -->
				<table class="table">
					<thead>
						<tr><th cospan="2"><?php echo '任务'.$i; ?></th></tr>
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

				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="<?php echo '#collapse'.$i; ?>">
							任务人员信息：
						</a>
					</div>
					<div id="<?php echo 'collapse'.$i; ?>" class="accordion-body collapse">
						<div class="accordion-inner">
							<table class="table">
								<thead>
									<caption><strong>已签到人员：</strong></caption>
									<tr>
										<th>姓名：</th><th>学号：</th><th>部门：</th><th>操作：</th>
									</tr>
								</thead>
								<?php foreach ($assignment['MatchSigned'] as $match)
								{
								?>
								<tr>
									<td><?=$match['User']['name']?></td>
									<td><?=$match['User']['num']?></td>
									<td><?=$department[$match['User']['department_id']];?></td>
									<td></td>
								</tr>
								<?php 
								}
								unset($match);
								?>
								<tr>
									<th>总计人数：</th><td colspan="3"><?=count($assignment['MatchSigned'])?></td>
								</tr>
							</table>

							<table class="table">
								<thead>
									<caption><strong>未签到人员：</strong></caption>
									<tr>
										<th>姓名：</th><th>学号：</th><th>部门：</th><th>操作：</th>
									</tr>
								</thead>
								<?php foreach ($assignment['MatchUnsigned'] as $match)
								{
								?>
								<tr>
									<td><?=$match['User']['name']?></td>
									<td><?=$match['User']['num']?></td>
									<td><?=$department[$match['User']['department_id']];?></td>
									<td></td>
								</tr>
								<?php 
								}
								
								unset($match);
								?>
								<tr>
									<th>总计人数：</th><td colspan="3"><?=count($assignment['MatchUnsigned'])?></td>
								</tr>
							</table>
						</div>
        			</div>
    			</div>
<?php
		++$i;
	}
	unset($assignment);
}
?>