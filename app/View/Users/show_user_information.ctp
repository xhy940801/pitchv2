<?php echo $this->Html->css('timetableEdit'); ?>
<div class="accordion" id="accordion2">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				基本信息
			</a>
		</div>
		<div id="collapseOne" class="accordion-body collapse in">
			<div class="accordion-inner">
				<table class="table">
					<thead>
						<tr><th cospan="2">个人基本信息</th></tr>
					</thead>
					<tr>
						<td>学号：</td><td><?php echo $info['User']['num']; ?></td>
					</tr>
					<tr>
						<td>姓名：</td><td><?php echo $info['Detail']['name']; ?></td>
					</tr>
					<tr>
						<td>部门：</td><td><?php echo $info['Department']['name']; ?></td>
					</tr>
					<tr>
						<td>职位：</td><td><?php echo $info['Group']['name']; ?></td>
					</tr>
					<tr>
						<td>性别：</td><td><?php echo $info['Detail']['sex']; ?></td>
					</tr>
					<tr>
						<td>电话：</td><td><?php echo $info['Detail']['mobile']; ?></td>
					</tr>
					<tr>
						<td>短号：</td><td><?php echo $info['Detail']['shortMobile']; ?></td>
					</tr>
					<tr>
						<td>上次登录时间：</td><td><?php echo $info['Other']['last_login_date']; ?></td>
					</tr>
					<tr>
						<td>累计登录次数：</td><td><?php echo $info['Other']['login_times']; ?></td>
					</tr>
					<tr>
						<td>累计摆摊次数：</td><td><?php echo $info['Other']['pitch_times']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        		课表：
			</a>
		</div>
		<div id="collapseTwo" class="accordion-body collapse">
			<div class="accordion-inner">
        <?php
$abcdefg = array('a','b','c','d','e','f','g');
$time = array('一二节','三四节','五六节','七节','八节','晚上');
if(isset($timetable[0]) && !empty($timetable[0]))
{
?>
<div id="<?php echo 'unCheckedtimeTable';?>">
	<table class="table table-bordered">
		<caption>未通过审核课表：</caption>
	    <tr>
	        <th></th>
	        <th>MON</th>
	        <th>TUE</th>
	        <th>WED</th>
	        <th>THU</th>
	        <th>FRI</th>
	        <th>SAT</th>
	        <th>SUN</th>
	    </tr>

<?php
for($i=0;$i<count($timetable[0]);++$i)
	$theTable[$timetable[0][$i]['Timetable']['leisure']] = 1;
for($i=0;$i<6;++$i)
{
	echo "\t".'<tr>'."\n";
	echo "\t\t".'<th>'.$time[$i].'</th>'."\n";
	for($j=0;$j<7;++$j)
	{
		if(isset($theTable[$abcdefg[$j].$i]) && $theTable[$abcdefg[$j].$i] == 1)
			echo "\t\t".'<td class="checked")"></td>'."\n";
		else
			echo "\t\t".'<td class="unChecked"></td>'."\n";
	}
	echo "\t".'</tr>'."\n";
}
unset($theTable);
?>
	</table>
</div>
<?php
}

if(isset($timetable[1]) && !empty($timetable[1]))
{
?>
<div id="<?php echo 'checkedtimeTable';?>">
	<table class="table table-bordered">
		<caption>通过审核课表：</caption>
	    <tr>
	        <th></th>
	        <th>MON</th>
	        <th>TUE</th>
	        <th>WED</th>
	        <th>THU</th>
	        <th>FRI</th>
	        <th>SAT</th>
	        <th>SUN</th>
	    </tr>

<?php
for($i=0;$i<count($timetable[1]);++$i)
	$theTable[$timetable[1][$i]['Timetable']['leisure']] = 1;
for($i=0;$i<6;++$i)
{
	echo "\t".'<tr>'."\n";
	echo "\t\t".'<th>'.$time[$i].'</th>'."\n";
	for($j=0;$j<7;++$j)
	{
		if(isset($theTable[$abcdefg[$j].$i]) && $theTable[$abcdefg[$j].$i] == 1)
			echo "\t\t".'<td class="checked")"></td>'."\n";
		else
			echo "\t\t".'<td class="unChecked"></td>'."\n";
	}
	echo "\t".'</tr>'."\n";
}
?>
	</table>
</div>
<?php
}
?>
				<div class="bs-docs-example">
					<div class="alert alert-info">
						<strong>注意!</strong> 蓝色代表没课。
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

        <ul>
<!--<li>曾参与摆摊项目：< ?php //echo $info['User']['num']; ?></li> -->
</ul>
