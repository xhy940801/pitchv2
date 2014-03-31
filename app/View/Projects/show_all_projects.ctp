<div class="accordion" id="accordion2">
<?php
$i=0;
foreach ($projects as $project)
{
?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="<?php echo '#collapse'.$i; ?>">
                <?php echo $project['Project']['name']; ?>
            </a>
        </div>
        <div id="<?php echo 'collapse'.$i; ?>" class="accordion-body collapse">
            <div class="accordion-inner">
                <table class="table">
                    <thead>
                        <tr>
                            <th cospan="3">详细信息</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>创建时间:</td><td colspan="2"><?php echo $project['Project']['created']; ?></td>
                    </tr>
                    <tr>
                        <td>备注信息:</td><td colspan="2"><?php echo $project['Project']['remark']; ?></td>
                    </tr>
                    <tr>
                        <td>任务数量:</td>
                        <td>
                            <?php echo count($project['Assignment']); ?>
                        </td>
                        <td class="rightAlign rightAlign2">
                            <?php echo $this->Html->link('增加任务', 
                                array('controller' => 'Assignments', 'action' => 'addAssignment', $project['Project']['id'])) ; ?>
                            <?php echo $this->Html->link('查看任务', 
                                array('controller' => 'Assignments', 'action' => 'showAssignments', $project['Project']['id'])) ; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php
++$i;
}
unset($project);
?>
</div>