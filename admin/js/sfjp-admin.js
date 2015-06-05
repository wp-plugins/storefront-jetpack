(function( $ ) {
    $(document).ready(function(){
        if ( $( '#sfjp-settings-page').length ) {
            $('.mod-controls a.activate').click( function() {
                var $t = $(this);
                $t.closest('.mod-card').addClass('active');
                $t.siblings('input').val('true');
            })

            $('.mod-controls a.deactivate').click( function() {
                var $t = $(this);
                $t.closest('.mod-card').removeClass('active');
                $t.siblings('input').val('');
            })
        }
    });
})( jQuery );
