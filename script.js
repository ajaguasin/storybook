jQuery(document).ready(function($){

    // Bring read-more post up
    $('i#add-button.material-icons').on('click', function(){
        $('div.read-more').toggleClass('opacityToggle');
        $('.post-contents').slideToggle();
        console.log('clicked');
    });

    $('div.read-more').on('click', function(){
        if( $('div.read-more').hasClass('opacityToggle') == true ) {

        } else {
            $('div.read-more').toggleClass('opacityToggle');
            $('.post-contents').slideToggle();
        }
    });



});
