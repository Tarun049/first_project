jQuery( document ).ready(function () {
    jQuery( "#form_submit" ).on("click", function () {
        // var data = jQuery( '#contact' ).serialize();
        var name = jQuery('#name').val();
        var email = jQuery("#email").val();
        var subject =jQuery('#subject').val();
        var message = jQuery('#message').val();
        jQuery.ajax({
            type: 'post',
            url: ajax_contact.ajaxurl,
            data:{
                name:name,
                email:email,
                subject:subject,
                message:message,
                action:'contact_form'
            }            
        }).done( function ( result ) {
            alert( result )
        });
    });
});