$(document).ready(function() {
	$('.js-scrollTo').on('click', function() { // Au clic sur un élément
		var page = $(this).attr('href'); // Page cible
		var speed = 600; // Durée de l'animation (en ms)
		$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
		return false;
	});

	$('.arrow').hide();

	$(document).scroll(function() {
		const topWindow = $(window).scrollTop();
		if (topWindow > 500 ) {
            $('.arrow').show();
        } else {
        	$('.arrow').hide();
        }
	});
});