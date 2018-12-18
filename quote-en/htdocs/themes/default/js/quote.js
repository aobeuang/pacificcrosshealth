$(document).ready(function($) {

	var datePicker = $('#txt-date').pickadate({
		selectMonths: true,
		selectYears: 64,
		formatSubmit: 'yyyy/mm/dd',
		hiddenName: true,
		max: -14,
		onSet: function(thingSet) {
			var today = new Date();
		    var birthDate = new Date(thingSet.select);
		    var age = today.getFullYear() - birthDate.getFullYear();
		    var m = today.getMonth() - birthDate.getMonth();
		    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		        age--;
		    }
		  	
		  	if( age >= 65){
		  		$('#modal-op').modal('show');

		  		$("#frmQuoteCensus input.text-input").prop('disabled', true);
				
		  	} else {
		  		$("#frmQuoteCensus input.text-input").prop('disabled', false);
		  	}
		}
	});

	$('.btn-choose-plan').each(function( index ){
		$(this).on('click', function( e ){
			console.log( index );
			var _th = $(this);

			$('.btn-choose-plan').find('.fa').remove();
			$('.btn-choose-plan').html( 'Select this plan' );

			_th.html( '<i class="fa fa-check"></i> Selecting this plan' );
			$('.quote-form').addClass('hidden');


			$('#quote-form--'+ index).toggleClass('hidden');
			$('html, body').animate({
		        scrollTop: $('#quote-form--'+ index).offset().top
		    }, 2000);
			doCalculate( $('#quote-form--'+ index + ' .frm-quote') );
		});
	});


	$('.frm-quote input[type=radio]').on('change', function(){
		doCalculate( $(this).closest("form") );
	});

	$('.frm-quote .btn-submit').on('click', function(e){
		e.preventDefault();
		doQuote( $(this).closest("form") );
	});

});

function doCalculate( _frm ){
	var url = _frm.attr('action');
	var datas = _frm.serialize();
	var _text_total = $('.text-total');

	_text_total.empty().html('<i class="fa fa-circle-o-notch fa-spin fa-fw">');

	$.ajax({
       url: url,
       type: 'POST',
       data: datas,
       dataType: 'json',
    }).done(function(data){
	   _text_total.empty().text( data.price );
	   _frm.find('input[name=net_total]').val(data.price);
    });
}

function doQuote( _frm ){
	var url = "quote/doQuote";
	var datas = _frm.serialize();
	var _btn_submit = $('.frm-quote .btn-submit');

	_btn_submit.empty().html('<i class="fa fa-circle-o-notch fa-spin fa-fw">');

	$.ajax({
       url: url,
       type: 'POST',
       data: datas,
       dataType: 'json',
    }).done(function(data){
       if( !data.error ){
       		window.location.href = '/quote-en/step3';
       } else {
       	alert( data.msg );
       }
    });
}