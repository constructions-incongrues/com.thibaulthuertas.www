$(document).ready(function() {
    // Smooth scrolling for same page links
    $('div.navbar a.smooth').smoothScroll();

    // Projects covers
    $('.fade').mosaic();

    // Fixed nav
    $('section.nav').headroom({
        offset: 205,
        tolerance: 5
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
