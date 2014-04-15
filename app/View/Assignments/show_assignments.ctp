<?php echo $this->Html->script('recommendSystem'); ?>
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
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th cospan="2"><?=$assignment['Assignment']['name']?></th>
							<th>
								<?=$this->Html->link('任务详情', 
									array('controller' => 'Assignments', 'action' => 'showAssignmentDetail', $assignment['Assignment']['id']))?>
							</th>
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

				
    			<div class="paddingBTElements"></div>
    			<div class="paddingBTElements"></div>
<?php
		++$i;
	}
	unset($assignment);
}
?>