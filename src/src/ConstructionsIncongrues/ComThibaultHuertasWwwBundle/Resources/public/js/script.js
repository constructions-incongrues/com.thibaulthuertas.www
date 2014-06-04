$(document).ready(function() {
    // Smooth scrolling for same page links
    $('div.navbar a.smooth').smoothScroll();

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
    $('section.nav').headroom({
        'offset': 205,
        'tolerance': 5,
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
