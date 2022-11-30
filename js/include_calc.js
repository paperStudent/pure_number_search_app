
$(function(){

	$('.target-ball').fadeIn(300);

	$('button').on('click', function(){
		let val = $('input[name=nbox]').val() === null? 0 : $('input[name=nbox]').val();
		if(parseInt(val) > parseInt($('input[name=nbox]').attr('max'))){
			maxNumAlert();
		}
		$('form').submit();
	});

	$('input[name=nbox]').change(function(){
		let val = $(this).val() === null? 0 : $(this).val();
		if(parseInt(val) > parseInt($(this).attr('max'))){
			maxNumAlert();
		}
	});
});

function maxNumAlert(){
	let max_num = $('input[name=nbox]').attr('max');
	alert('数値は'+ max_num +'を超えないように設定してください。');
	$('input[name=nbox]').val(null);
	return false;
}