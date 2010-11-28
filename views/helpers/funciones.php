<?php
class FuncionesHelper extends Helper {

	var $helpers = array('Html');	

	function timeAgo($datetime) {
		$mark = strtotime($datetime);
		$iso = date('c', $mark);
		return '<small class="date" title="'.$iso.'">'.date('g:i d M, Y').'</small>';
	}

	function youtubeAvatar($code) {
		return $this->Html->image('http://i.ytimg.com/vi/'.$code.'/default.jpg');
	}
	function zerofill ($num,$zerofill) {
		while (strlen($num)<$zerofill) {
			$num = "0".$num;
		}
		return $num;
	}
	function age($dformat, $endDate, $beginDate) {
		$date_parts1=explode($dformat, $beginDate);
		$date_parts2=explode($dformat, $endDate);
		$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
		$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
		return ($end_date - $start_date)/365;
	} 

	function recortar($texto, $cantidad, $link = '...<!-- Texto cortado -->'){
		$texto = strip_tags($texto);
		$fin_link = substr($link, strlen($link)-15);
		$wrap = wordwrap($texto, $cantidad, $link);
		$pos = strpos($wrap, $fin_link)+15;
		if($pos == 15) {
			$nuevo_texto = $texto;
		} else {
			$nuevo_texto = substr($wrap, 0, $pos);
		}
		return $nuevo_texto;
	}

}
