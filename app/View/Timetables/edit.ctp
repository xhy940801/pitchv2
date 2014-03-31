<?php
echo $this->Html->css('timetableEdit');
echo $this->Html->script('timetableEdit');
?>
<div id="paddinHead">
</div>
<?php
if($successful)
{
    if($isEdit)
    {
        ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                修改成功
        </div>
        <?php
    }
}
else
{
    ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo '<p id="errorInformation">'.$errorInformation.'</p>'; ?>
        </div>
    <?php
}
?>
<form method="post" action="edit">
<table class="table table-bordered">
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
$abcdefg = array('a','b','c','d','e','f','g');
$time = array('一二节','三四节','五六节','七节','八节','晚上');
for($i=0;$i<count($oldTimetable);++$i)
    $theTable[$oldTimetable[$i]['Timetable']['leisure']] = 1;
for($i=0;$i<6;++$i)
{
    echo "\t".'<tr>'."\n";
    echo "\t\t".'<th>'.$time[$i].'</th>'."\n";
    for($j=0;$j<7;++$j)
    {
        if(isset($theTable[$abcdefg[$j].$i]) && $theTable[$abcdefg[$j].$i] == 1)
            echo "\t\t".'<td class="checked" onclick="changeColor(this,\''.$abcdefg[$j].$i.'\')"><input type="hidden" name="'.$abcdefg[$j].$i.'" id="'.$abcdefg[$j].$i.'" value="1" /></td>'."\n";
        else
            echo "\t\t".'<td class="unChecked" onclick="changeColor(this,\''.$abcdefg[$j].$i.'\')"><input type="hidden" name="'.$abcdefg[$j].$i.'" id="'.$abcdefg[$j].$i.'" value="0" /></td>'."\n";
    }
    echo "\t".'</tr>'."\n";
}
?>
        <tr>
            <td colspan="8"><input type="submit" class="btn  btn-primary" value="修改课表" /></td>
        </tr>
</table>
</form>