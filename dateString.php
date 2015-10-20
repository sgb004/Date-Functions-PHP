<?php
//Date form is 'Y-m-d H:i:s' '2015-10-19 12:57:36'
function dateString( $date ){
	$str = '';

	$actualDate = strtotime( date('Y-m-d H:i:s') );
	$date = strtotime( $date );

	$timeRemaining = $actualDate - $date;
	$timeRemaining = intval($timeRemaining / 60);

	if( $timeRemaining == 0 ){
		$str = 'Hace un momento';
	}else if( $timeRemaining < 60){
		$str = 'Hace '.$timeRemaining.' min';
	}else{
		$actualMins = $actualDate / 3600;
		$dateMins = $date/ 3600;
		$months = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

		$dateDMHi = date('d-m-H-i', $date);
		$dateDMHi = explode('-', $dateDMHi);

		$dateRemaining = date('d', $actualDate) - $dateDMHi[0];

		$timeRemaining = $actualMins - $dateMins;

		if( $timeRemaining < 24 ){
			$timeRemaining = intval($timeRemaining);
			$str = 'Hace '.$timeRemaining.' h';
		}else if( $timeRemaining < 48 && $dateRemaining == 1 ){
			$str = 'Ayer a las '.$dateDMHi[2].':'.$dateDMHi[3];
		}else{
			$dateDMHi[1]--;
			$str = $dateDMHi[0].' de '.$months[$dateDMHi[1]].' a las '.$dateDMHi[2].':'.$dateDMHi[3];
		}
	}
	return $str;
}
?>
