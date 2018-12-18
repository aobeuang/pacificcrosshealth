$(document).ready(function() {

    /**
     * Enable Summernote WYSIWYG editor on any textareas with the 'editor' class
     */
    if ($('textarea.editor').length) {
        $('textarea.editor').each(function() {
            var id = $(this).attr('id');
            $('#' + id).summernote({
                height: 500
            });
        });
    }

    $('.btn-reset').click(function(){
        $( "form input" ).each(function( index ) {
            if($(this).attr('type') == 'text' || $(this).attr('type') == 'password') {
                $(this).val('');
            }
        });
    });

});