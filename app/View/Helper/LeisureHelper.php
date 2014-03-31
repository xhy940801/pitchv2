<?php

App::uses('AppHelper', 'View/Helper');

class LeisureHelper extends AppHelper
{
	private $week = array('a' => '周一', 'b' => '周二', 'c' => '周三', 'd' => '周四', 'e' => '周五', 'f' => '周六', 'g' => '周日');
	private $day = array('0' => '一二节', '1' => '三四节', '2' => '五六节', '3' => '七节', '4' => '八节', '5' => '晚上');

	public function decodeLeisureToZH($code)
	{
		$strArr = str_split($code);
		$leisure;
		if(count($strArr) != 2)
			return false;
		if(isset($this->week[$strArr[0]]))
			$leisure['week'] = $this->week[$strArr[0]];
		else
			return false;
		if(isset($this->day[$strArr[1]]))
			$leisure['day'] = $this->day[$strArr[1]];
		else
			return false;
		return $leisure;
	}

	public function getStartEndTime($start, $end)
	{
		$strStart = $this->decodeLeisureToZH($start);
		$strEnd = $this->decodeLeisureToZH($end);

		if($strStart == false || $strEnd == false)
			return false;
		return '从 '.$strStart['week'].$strStart['day'].' 开始 到 '.$strEnd['week'].$strEnd['day'].' 结束';
	}
}

?>