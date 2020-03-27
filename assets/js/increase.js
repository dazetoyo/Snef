(function($) {

    $('.lazy').Lazy();

    // smooth scroll
    $(	"a[href^='#']")
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .not('[data-vc-container]')
    .not('[data-toggle]')
    .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
            /*&&
            this.hasAttr('data-vc-tabs')*/
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

    // IMAGEMAP on hover area wiht mutiple parts
    $('body').on('mouseenter', '.increase-imagemap .increase-imagemap-shape', function() {
        var this_id = $(this).data('id');
        $('[data-id='+this_id+']').each(function(){
            $(this).addClass('hover');
        });
    }).on('mouseleave', '.increase-imagemap .increase-imagemap-shape', function() {
        var this_id = $(this).data('id');
        $('[data-id='+this_id+']').each(function(){
            $(this).removeClass('hover');
        });
    });

    function increaseFullRightLeft(){
        "increase-full-enable-between-768-0"
        var window_width = $("body").prop("clientWidth");
        var window_width_with_sidebar = window.outerWidth;

        $('.increase-full-right').each(function(){
            var container_width = $(this).parent().width();
            var container_padding_left = parseFloat($(this).parent().css('padding-left').replace("px", ""));
            //var container_padding_right = parseFloat($(this).parent().css('padding-right').replace("px", ""));
            //var container_offset_left = $(this).parent().offset().left;
            var container_inner_offset_left = $(this).parent().offset().left + container_padding_left;
            var container_inner_offset_right = window_width - container_width - container_inner_offset_left;

            var classes = $(this).attr('class').split(' ');
            var class_between_begin = 'increase-full-enable-between-';
            for (var i=0; i<classes.length; i++){
                if (classes[i].slice(0,29) === class_between_begin){
                    var class_between_sizes = classes[i].replace(class_between_begin, '').split('-');
                }
            }

            if(
                (
                    class_between_sizes
                    &&
                    class_between_sizes[0] <= window_width_with_sidebar
                    &&
                    (
                        window_width_with_sidebar <= class_between_sizes[1]
                        ||
                        '0' == class_between_sizes[1]
                        ||
                        !class_between_sizes[1]
                    )
                )
                ||
                !class_between_sizes
            ){
                $(this).css({
                    'margin-right': '-'+container_inner_offset_right+'px',
                });
            }else{
                $(this).css({
                    'margin-right': '',
                });
            }
        });

        $('.increase-full-left').each(function(){
            //var container_width = $(this).parent().width();
            var container_padding_left = parseFloat($(this).parent().css('padding-left').replace("px", ""));
            //var container_padding_right = parseFloat($(this).parent().css('padding-right').replace("px", ""));
            //var container_offset_left = $(this).parent().offset().left;
            var container_inner_offset_left = $(this).parent().offset().left + container_padding_left;
            //var container_inner_offset_right = window_width - container_width - container_offset_left + container_padding_right;

            var classes = $(this).attr('class').split(' ');
            var class_between_begin = 'increase-full-enable-between-';
            for (var i=0; i<classes.length; i++){
                if (classes[i].slice(0,29) === class_between_begin || classes[i].slice(1,30) === class_between_begin){
                    var class_between_sizes = classes[i].replace(class_between_begin, '').split('-');
                }
            }

            if(
                (
                    class_between_sizes
                    &&
                    class_between_sizes[0] <= window_width_with_sidebar
                    &&
                    (
                        window_width_with_sidebar <= class_between_sizes[1]
                        ||
                        '0' == class_between_sizes[1]
                        ||
                        !class_between_sizes[1]
                    )
                )
                ||
                !class_between_sizes
            ){
                $(this).css({
                    'margin-left': '-'+container_inner_offset_left+'px',
                })
            }else{
                $(this).css({
                    'margin-left': '',
                });
            }
        });

    }


    jQuery(document).ready(function(){
        increaseFullRightLeft();
    });



    jQuery(window).resize(function(){
        increaseFullRightLeft();
    });






    $( ".search-form" ).on( "click", function() {
        $('#full-screen-search').slideToggle(500);

    });

    $( "#full-screen-search-close" ).on( "click", function() {
        $('#full-screen-search').hide();

    });






})(jQuery);
