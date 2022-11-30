<?php

include('_header.php');

define('MAX_NUM',100000);

$check_number	= 0;

if(isset($_GET["nbox"])){
	if(($_GET["nbox"]) > MAX_NUM){
		$check_number = 0;
	}else{
		$check_number = $_GET["nbox"];
	}
}

$answer		= calculation($check_number);
$len			= count($answer);

function calculation($t){

	$answer_ary = array();

	if($t < 2){
		return $answer_ary;
	}

	$answer_ary[] = 2;

	for ($i=2; $i<=$t; $i++) {
		if($i % 2 === 0){
			continue;
		}
		$odd = $i;
		$odd_ary[] = $odd;
	}
	
	$odd_len = count($odd_ary);

	for($i=0; $i<$odd_len; $i++){

		$not_prime_num_flg = 0;

		if($i === 0 || $i === 1){
			$answer_ary[] = $odd_ary[$i];
			continue;
		}

		$target_odd = $odd_ary[$i];

		for($j=0; $j<$i-1; $j++){
			$res = $target_odd % $odd_ary[$j];
			if($res === 0){
				$not_prime_num_flg = 1;
				break;
			}
		}

		if($not_prime_num_flg){
			continue;
		}

		$answer_ary[] = $target_odd;
	}
	return $answer_ary;
}

include('tmpl/calc_page.html');
include('_footer.php');
?>



