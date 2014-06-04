$(document).ready(function() {

    $('.smooth').click(function(e) {
        var hash = $(this).attr('href').match(/^.*(#.*)$/)[1];
        $.scrollTo(hash, 500);
        return false;
    });

    // Projects covers
    $('.fade').mosaic();

    $('#contact').outerHeight();
    $('#contact').height();
    $('#contact').hide();
    $('.show_hide').show();

    $('.show_hide').click(function() {
        $('#contact').slideToggle();
        return false;
    });

    // Fixed nav
    $('section.nav, #contact').headroom({
        'offset': 0,
        'tolerance': {
            'up': 0,
            'down': 0
        },
        'classes': {
            'initial': 'animated',
            'pinned': 'slideInDown',
            'unpinned': 'slideOutUp',
            'top': 'headroom--top',
            'notTop': 'headroom--not-top'
        }
    });

    // "Caillou" size on home page
    $('header').height(window.innerHeight);
    $(window).resize(function() {
        if (document.documentElement.clientWidth > 640) {
            $('.intro').show();
            $('header').show();
            $('header').height(window.innerHeight);
        } else {
            $('header').hide();
            $('.intro').hide();
        }
    });
});
