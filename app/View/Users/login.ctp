<?php
echo $this->Html->css('login');
?>
<div class="container">
<?php
	if(isset($successful) && $successful == 0)
	{
?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $errorInformation; ?>
	</div>
<?php } ?>
	<form action="login" method="post" class="form-signin">
		<fieldset>
	    	<legend id="sign_in_title">Please sign in</legend>
			<input type="text" class="input-block-level" name="username" placeholder="Username">
			<input type="password" class="input-block-level" name="psd" placeholder="Password"/>	
		</fieldset>
		<button type="submit" class="btn btn-large btn-primary">Submit</button>
	</form>
</div>
