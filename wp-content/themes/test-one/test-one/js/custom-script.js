jQuery( document ).ready( function(){
    jQuery("#submit").on( "click", function (  ) {
        // e.preventDefault();

        // assigining the value in vriables    
        var email = jQuery("#email").val();
        var name = jQuery("#name").val();
        var password = jQuery("#password").val();
        // console.log(email,name,password);
        jQuery.ajax({
            type:"POST",
            url:myAjax.ajaxurl,
            data: {
                emailAjax: email,
                nameAjax: name,
                passwordAjax: password,
                action: 'custom_registration' //must
            }
        }).done(function ( data ) {
            alert(data);
        });    
    });
});