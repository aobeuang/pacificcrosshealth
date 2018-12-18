/**
 * Configurations
 */
var config = {
    logging : true,
    baseURL : location.protocol + "//" + location.hostname + "/",
    omise: {
        publicKey: "pkey_test_549d7md982zvq3csz06"
    }
};


/**
 * Bootstrap IE10 viewport bug workaround
 */
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style')
    msViewportStyle.appendChild(
        document.createTextNode(
            '@-ms-viewport{width:auto!important}'
        )
    )
    document.querySelector('head').appendChild(msViewportStyle)
}


/**
 * Execute an AJAX call
 */
function executeAjax(url, data, callback) {
    $.ajax({
        type     : 'POST',
        url      : url,
        data     : data,
        dataType : 'json',
        async    : true,
        success  : function(results) {
            callback(results);
        },
        error    : function(error) {
            alert("Error " + error.status + ": " + error.statusText);
        }
    });
    // prevent default action
    return false;
}


/**
 * Global core functions
 */
$(document).ready(function() {

    /**
     * Session language selected
     */
    // $('#session-language-dropdown a').click(function(e) {
    //     // prevent default behavior
    //     if (e.preventDefault) {
    //         e.preventDefault();
    //     } else {
    //         e.returnValue = false;
    //     }
    //
    //     // set up post data
    //     var postData = {
    //         language : $(this).attr('rel')
    //     };
    //
    //     // define callback function to handle AJAX call result
    //     var ajaxResults = function(results) {
    //         if (results.success) {
    //             location.reload();
    //         } else {
    //             alert("{{core error session_language}}");
    //         }
    //     };
    //
    //     // perform AJAX call
    //     executeAjax(config.baseURL + 'ajax/set_session_language', postData, ajaxResults);
    // });

    $('.btn-remove').click(function(){
        return confirm('Confirm to remove?');
    });

    $('#parent_category_id').change(function(){
        console.log($(this).val());
        var parentId = $(this).val();

        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/category/"+parentId);

        $.get(baseUrl + "/api/category/"+parentId, function(obj) {
            $('#category_id').empty();
            $.each(obj.data, function (i, item) {
                $('#category_id').append($('<option>', {
                    value: i,
                    text : item
                }));
            });
            $('#category_id').val($('#current_category_id').val());
        });
    });
    $('#parent_category_id').change();


    $('#amphur_id').prop('disabled', 'disabled');
    $('#district_id').prop('disabled', 'disabled');
    $('#zipcode_id').prop('disabled', 'disabled');

    $('#province_id').change(function() {
        var provinceId = $(this).val();
        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/amphur/"+provinceId);
        $.get(baseUrl + "/api/amphur/"+provinceId, function(obj) {
            $('#amphur_id').empty();
            $.each(obj.data, function (i, item) {
                if ($('#current_amphur_id').val() == i) {
                    $('#amphur_id').append($('<option>', {
                        value: i,
                        text : item
                    }).attr('selected','selected'));
                } else {
                    $('#amphur_id').append($('<option>', {
                        value: i,
                        text : item
                    }));
                }

            });
            $('#amphur_id').prop('disabled', false);
            $('#amphur_id').change();
        });
    });
    $('#province_id').change();

    $('#amphur_id').change(function() {
        var amphurId = $(this).val();
        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/district/"+amphurId);
        $.get(baseUrl + "/api/district/"+amphurId, function(obj) {
            $('#district_id').empty();
            $.each(obj.data, function (i, item) {
                if ($('#current_district_id').val() == i) {
                    $('#district_id').append($('<option>', {
                        value: i,
                        text : item
                    }).attr('selected','selected'));
                } else {
                    $('#district_id').append($('<option>', {
                        value: i,
                        text : item
                    }));
                }
            });
            $('#district_id').prop('disabled', false);
            $('#district_id').change()
        });
    });

    $('#district_id').change(function() {
        var districtCode = $(this).val();
        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/zipcode/"+districtCode);
        $.get(baseUrl + "/api/zipcode/"+districtCode, function(obj) {
            $('#zipcode_id').empty();
            $.each(obj.data, function (i, item) {
                if ($('#current_zipcode_id').val() == i) {
                    $('#zipcode_id').append($('<option>', {
                        value: i,
                        text : item
                    }).attr('selected','selected'));
                } else {
                    $('#zipcode_id').append($('<option>', {
                        value: i,
                        text : item
                    }));
                }
            });
            $('#zipcode_id').prop('disabled', false);
        });
    });







    $('#search_amphur_id').prop('disabled', 'disabled');
    $('#search_district_id').prop('disabled', 'disabled');
    $('#search_zipcode_id').prop('disabled', 'disabled');

    $('#search_province_id').change(function() {
        var provinceId = $(this).val();
        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/amphur/"+provinceId);
        $.get(baseUrl + "/api/amphur/"+provinceId, function(obj) {
            $('#search_amphur_id').empty();
            $('#search_amphur_id').append($('<option>', {
                value: "",
                text : " - "
            }).attr('selected','selected'));
            $.each(obj.data, function (i, item) {
                $('#search_amphur_id').append($('<option>', {
                    value: i,
                    text : item
                }));
            });
            $('#search_amphur_id').prop('disabled', false);
            $('#search_district_id').empty();
            $('#search_district_id').prop('disabled', 'disabled');
            $('#search_zipcode_id').empty();
            $('#search_zipcode_id').prop('disabled', 'disabled');
        });
    });

    $('#search_amphur_id').change(function() {
        var amphurId = $(this).val();
        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/district/"+amphurId);
        $.get(baseUrl + "/api/district/"+amphurId, function(obj) {
            $('#search_district_id').empty();
            $('#search_district_id').append($('<option>', {
                value: "",
                text : " - "
            }).attr('selected','selected'));
            $.each(obj.data, function (i, item) {
                $('#search_district_id').append($('<option>', {
                    value: i,
                    text : item
                }));
            });
            $('#search_district_id').prop('disabled', false);
            $('#search_zipcode_id').empty()
            $('#search_zipcode_id').prop('disabled', 'disabled');
        });
    });

    $('#search_district_id').change(function() {
        var districtCode = $(this).val();
        var baseUrl = $('base').attr('href');
        console.log(baseUrl + "/api/zipcode/"+districtCode);
        $.get(baseUrl + "/api/zipcode/"+districtCode, function(obj) {
            $('#search_zipcode_id').empty();
            // $('#search_zipcode_id').append($('<option>', {
            //     value: "",
            //     text : " - "
            // }).attr('selected','selected'));
            $.each(obj.data, function (i, item) {
                $('#search_zipcode_id').append($('<option>', {
                    value: i,
                    text : item
                }));
            });
            $('#search_zipcode_id').prop('disabled', false);
        });
    });
});
