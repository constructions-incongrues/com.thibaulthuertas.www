$(document).ready(function() {
	// Smooth scrolling for same page links
	$('div.navbar a.smooth').smoothScroll();

	// Projects covers
	$('.fade').mosaic();

	// "Caillou" size on home page
	$('.caillou').height(window.innerHeight - 64);
	$(window).resize(function() {
		$('.caillou').height(window.innerHeight - 64);
	});
});