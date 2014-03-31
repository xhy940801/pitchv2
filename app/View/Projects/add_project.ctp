<?php //echo $this->Html->css('addproject'); ?>
<?php
	if(isset($successful) && $successful == 0)
	{
?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $errorInformation; ?>
	</div>
<?php } ?>
<div id="paddinHead">
</div>
<form class="form-horizontal" action="addProject" method="post">
	<div class="control-group">
		<label class="control-label" for="inputName">Name</label>
		<div class="controls">
			<input type="text" id="inputName" placeholder="Name" name="name">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputRemark">Remark</label>
		<div class="controls">
			<textarea rows="3" id="inputRemark" placeholder="Remark" name="remark"></textarea>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" class="btn btn-primary" value="Add">
			<input type="reset" class="btn btn-primary" value="Reset">
		</div>
	</div>
	
</form>
<!-- <form action="addProject" method="post">
<table class="table">
	<tr>
		<th class="leftAlign">name</th>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<th class="leftAlign">remark</th>
		<td><textarea rows="3" cols="20"></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add">
			<input type="reset" class="btn btn-primary" value="Reset">
		</td>
	</tr>
</table>
</form> -->