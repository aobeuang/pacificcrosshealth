$(function() {
   
 //   $('#attachmentModal').modal({
	// 	keyboard: false
	// })
	

	$('.btn-attachment').click(function(){
		$('#attachmentUrl').val($(this).data('url'));
	});


    $('#attachmentModal').on('hidden.bs.modal', function (e) {
      
    })

    $('#attachmentModal').on('show.bs.modal', function (e) {
      	//console.log('url->', $('#attachmentUrl').val());
      	$('#attachmentImage').attr('src', $('#attachmentUrl').val());
    })
});