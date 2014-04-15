<div id="paddinHead">
</div>
<?php
if(isset($successful))
	echo $this->App->errorInfo($successful, $errorInformation); ?>
<script language="javascript" type="text/javascript" src="<?php echo $this->webroot.'viewPlugins/My97DatePicker/WdatePicker.js'; ?>"></script>
<form class="form-horizontal" action="" method="post">
	<div class="control-group">
		<label class="control-label" for="name">Name</label>
		<div class="controls">
			<input type="text" id="name" placeholder="Name" name="name">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputStartLeisure">Start leisure</label>
		<div class="controls">
			<select name="start_leisure_d">
				<option value="a">周一</option>
				<option value="a">周二</option>
				<option value="a">周三</option>
				<option value="a">周四</option>
				<option value="a">周五</option>
				<option value="a">周六</option>
				<option value="a">周日</option>
			</select>
			<select name="start_leisure_c">
				<option value="0">一二节</option>
				<option value="1">三四节</option>
				<option value="2">五六节</option>
				<option value="3">七节</option>
				<option value="4">八节</option>
				<option value="5">晚上</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEndLeisure">End leisure</label>
		<div class="controls">
			<select name="end_leisure_d">
				<option value="a">周一</option>
				<option value="a">周二</option>
				<option value="a">周三</option>
				<option value="a">周四</option>
				<option value="a">周五</option>
				<option value="a">周六</option>
				<option value="a">周日</option>
			</select>
			<select name="end_leisure_c">
				<option value="0">一二节</option>
				<option value="1">三四节</option>
				<option value="2">五六节</option>
				<option value="3">七节</option>
				<option value="4">八节</option>
				<option value="5">晚上</option>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputTheNumberNeeded">The number needed</label>
		<div class="controls">
			<input type="text" id="inputTheNumberNeeded" placeholder="The number needed" name="the_number_needed">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputDate">Date</label>
		<div class="controls">
			<input type="text" id="inputDate" placeholder="Date" name="date" onClick="WdatePicker()">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" class="btn btn-primary" value="Add">
			<input type="reset" class="btn btn-primary" value="Reset">
		</div>
	</div>
	
</form>
<!-- <form name=login action="addAssignment" method="post">
<table>
	<tr>
		<th>start leisure</th>
		<td><input type="text" name="start_leisure"></td>
	</tr>
	<tr>
		<th>end leisure</th>
		<td><input type="text" name="end_leisure"></td>
	</tr>
	<tr>
		<th>the number needed</th>
		<td><input type="text" name="the_number_needed"></td>
	</tr>
	<tr>
		<th>date</th>
		<td><input type="text" name="date" onClick="WdatePicker()"></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="Add">
			<input type="reset" value="Reset">
		</td>
	</tr>
</table>
</form> -->