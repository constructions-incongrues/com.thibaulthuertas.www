$(document).ready(function() {
    // Smooth scrolling for same page links
    $('div.navbar a.smooth').smoothScroll();

    // Projects covers
    $('.fade').mosaic();

    // "Caillou" size on home page
    $('header').height(window.innerHeight - 64);
    $(window).resize(function() {
        $('header').height(window.innerHeight - 64);
    });
});
