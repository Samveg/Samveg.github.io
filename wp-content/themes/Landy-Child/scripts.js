jQuery(document).ready( function() {

    jQuery( ".menu-main-menu-container li a" ).click( function() {

        var id = this.getAttribute('href', 2);;

        var offset = -60;
            
        jQuery( 'html, body' ).animate({
            scrollTop: jQuery( id ).offset().top + offset
        }, 'slow');
    });

});
