<?php echo $this->Html->script('jQuery_v1.10.2.js'); ?>
<input type="submit" id="send" />
<div id="show">
</div>

<script type="text/javascript">
$(function()
{
	$("#send").click(function()
	{
		$("#show").load("getSomeUsers/1/3");
	});
});
</script>