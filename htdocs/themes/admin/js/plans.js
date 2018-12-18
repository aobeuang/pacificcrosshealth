$(document).ready(function() {

    /**
     * Delete a plan
     */
    $('.btn-delete-plan').click(function() {
        window.location.href = siteSetting.site_url + "admin/package/delete/" + $(this).attr('data-id');
    });

    /**
     * Visible a plan
     */
    $(document.body).on('change','input[name="chk_visible"]', function(e) {
        var _th = $(this);
        var id = _th.attr('data-id');
        var visible;

        if (this.checked) {
           visible = 1;
        } else {
            visible = 0;
        }
        $.post(siteSetting.site_url +'admin/package/updateVisibie/', {id: id, visible: visible}, function(data){
            console.log(data);
        });
    });
});
