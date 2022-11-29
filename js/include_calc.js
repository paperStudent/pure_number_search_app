
$(function(){

	$('button').on('click', function(){
		let val = $('input[name=nbox]').val() === null? 0 : $('input[name=nbox]').val();
		if(parseInt(val) > parseInt($('input[name=nbox]').attr('max'))){
			maxNumAlert();
		}
		$('form').submit();
		return false;
	});

	$('input[name=nbox]').change(function(){
		let val = $(this).val() === null? 0 : $(this).val();
		if(parseInt(val) > parseInt($(this).attr('max'))){
			maxNumAlert();
		}
		return false;
	});
	$('.target-ball').fadeIn(300);
});

function maxNumAlert(){
	alert('数値は100000を超えないように設定してください。');
	$('input[name=nbox]').val(null);
	return false;
}