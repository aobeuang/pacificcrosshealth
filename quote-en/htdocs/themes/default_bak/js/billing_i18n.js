$(document).ready(function() {

	// $('#buttonCopylinkForSale').click(function(){
	// 	alert($('#LinkForSale').text() + ' Copied' );
	// });
	// $('[data-toggle="tooltip"]').tooltip();

	// new Clipboard('.buttonCopylink');
	
	// if ($(".input-group.date").length) {
 //        $(".input-group.date").datepicker({
 //            autoclose      : true,
 //            todayHighlight : true
 //        });
 //    }

	// if ($(".input-group.timepicker").length) {
	// 	$('.input-group.timepicker').timepicker();
	// }
    
    $('.datetimepicker').datetimepicker({
    	format: 'DD-MM-YYYY hh:mm A'
    });

	var clipboard = new Clipboard('.buttonCopylink');

	clipboard.on('success', function(e) {
	    // console.info('Action:', e.action);
	    console.info('Text:', e.text);
	    // console.info('Trigger:', e.trigger);

	    $('.buttonCopylink').tooltip('toggle');

	    e.clearSelection();
	});

    $('.buttonCopylink').on('hidden.bs.tooltip', function () {
	  $('.buttonCopylink').tooltip('destroy')
	})

    $("#token_errors").hide();

	if (typeof Omise != 'undefined') {
		Omise.setPublicKey(config.omise.publicKey);

		$("#checkout").submit(function () {

			var form = $(this);

			// Disable the submit button to avoid repeated click.
			form.find("input[type=submit]").prop("disabled", true);

			// Serialize the form fields into a valid card object.
			var card = {
				"name": form.find("[data-omise=holder_name]").val(),
				"number": form.find("[data-omise=number]").val(),
				"expiration_month": form.find("[data-omise=expiration_month]").val(),
				"expiration_year": form.find("[data-omise=expiration_year]").val(),
				"security_code": form.find("[data-omise=security_code]").val()
			};

			// Send a request to create a token then trigger the callback function once
			// a response is received from Omise.
			//
			// Note that the response could be an error and this needs to be handled within
			// the callback.
			Omise.createToken("card", card, function (statusCode, response) {
				if (response.object == "error") {
					// Display an error message.
					$("#token_errors").html(response.message).show();

					// Re-enable the submit button.
					form.find("input[type=submit]").prop("disabled", false);
				} else {
					$("#token_errors").hide();
					// Then fill the omise_token.
					form.find("[name=omise_token]").val(response.id);

					// Remove card number from form before submiting to server.
					form.find("[data-omise=number]").val("");
					form.find("[data-omise=security_code]").val("");

					// submit token to server.
					form.get(0).submit();
				};
			});

			// Prevent the form from being submitted;
			return false;

		});
	}

});
