$(document).ready(function() {

    // $('#registerTerms').modal({
    //     keyboard: false,
    //     backdrop: 'static'
    // });

    $('#btnAgreeRegisterTerms').click(function(){
        $('#registerTerms').modal('hide');
        $('#read_already').val(true);
    });

    // if ($('#read_already').val() == 'false'){
    //     $('#registerTerms').modal('show');
    // } else {

    // }
    $('#btnCheckUser').click(function(){

        var userRef = $('#username_reference').val();

        if (userRef.length == 0){
            return false;
        }

        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/check_username/"+userRef);

        $.get(baseUrl + "/api/check_username/"+userRef, function(obj) {
            console.log(obj)
            if (obj['error'] == undefined) {
                alert(obj['result'])
                window.location = baseUrl + '/user/register?ref=' + userRef
            } else {
                alert(obj['error'])
                $('#username_reference').val('')
            }
        });

        return false;
    });

    $('#chkDontHaveRef').click(function(){
        if ($(this).is(':checked')) {
            $('#username_reference').attr('disabled', true);
        } else {
            $('#username_reference').attr('disabled', false);
        }
    });

    if ($('#chkDontHaveRef').is(':checked')) {
        $('#username_reference').attr('disabled', true);
    } else {
        $('#username_reference').attr('disabled', false);
    }

    // if(document.getElementById('chkDontHaveRef').checked) {
    //     var userRef = $('#username_reference').val();
    //     userRef.attr('disalbed', 'disalbed')
    // } else {
    //
    // }
});