$(document).ready(function() {
    var baseUrl = $('base').attr('href');
    /**
     * Delete a user
     */
    $('.btn-delete-content').click(function() {
        window.location.href = baseUrl + "/admin/content/delete/" + $(this).attr('data-id');
    });

});
