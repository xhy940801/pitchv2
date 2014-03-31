<?php
if(isset($users))
	debug($users);
?>

<table>
<?php
$i = 0;
for(;$i<count($users);++$i)
{
	if($i % 3 == 0) { ?>
	<tr>
<?php } else if($i % 3 == 2) { ?>
	</tr> <?php } ?>
		<td><a href="../User/showOneUser">$users[$i][]
<?php } ?>
</table>