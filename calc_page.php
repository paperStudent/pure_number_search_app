<?php include('_header.php')?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="/staff/js/include_calc.js"></script>


<?php

	$check_number = isset($_GET["nbox"]) ? $_GET["nbox"] : 0;

	$answer;
	$answer	= calculation($check_number);
	$len		= count($answer);


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

?>




<main>

	素数早見表

	<button>
		check!
	</button>

	<form method="get">
		<input type="number" id="nbox" name="nbox" min="2" max="100000">
	</form>

	<div style="color:orange;"><?php echo $check_number; ?>までの</div>	
	<div style="color:orange;">素数は<?php echo $len; ?>個</div>

	<div class="push-disp" data-num="">
		<?php for($i=0; $i<$len; $i++){?>
			<span class="target-ball" style="display: none;">
				<?php echo $answer[$i];?>
			</span>
		<?php }?>
	</div>

</main>


<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');

main{
	display: flex;
	flex-direction: column;
	align-items: center;
	font-family: 'Noto Sans JP' , sans-serif;
}

button{
	background-color: #fff;
	width: 100px;
	height: 40px;
	border-radius: 30px;
	color: #fff;
	background-color: orangered;
	opacity: 0.5;
	border: none;
}

button:hover{
	opacity: 0.3;
}

input[type="number"]{
	width: 100px;
	height: 30px;
	margin: 20px 0;
}

.push-disp{
	display: flex;
	flex-wrap: wrap;
	max-width: 1010px;
	max-height: 50vh;
	overflow: scroll;
	background-color: #faeffb;
	margin-top: 50px;
}
.push-disp::-webkit-scrollbar{
	display:none;
}

.push-disp > .target-ball{
	display: flex;
	justify-content: center;
	align-items: center;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background-color: #58175e;
	color: #fff;
	font-size: 16px;
	margin: 20px;
}

</style>




<?php include('_footer.php')?>