jQuery( document ).ready( function(){
    jQuery("#login").on( "click", function (  ) {
        // e.preventDefault();

        // assigining the value in vriables    
        var email = jQuery("#email").val();
        var password = jQuery("#password").val();
        // console.log( email,password );
        jQuery.ajax({
            type:"POST",
            url:myAjax.ajaxurl,
            data: {
                emailAjax: email,
                passwordAjax: password,
                action: 'custom_login' //must
            }
        }).done(function ( data ) {
            alert(data);
        });    
    });
});