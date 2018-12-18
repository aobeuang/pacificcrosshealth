$(document).ready(function() {
    var baseUrl = $('base').attr('href');
    /**
     * Delete a user
     */
    $('.btn-delete-company').click(function() {
        window.location.href = baseUrl + "/admin/company/delete/" + $(this).attr('data-id');
    });

});
