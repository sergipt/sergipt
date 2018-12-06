$('.lightbox').magnificPopup({
  type: 'image',
  mainClass: 'mfp-fade'	 
});	
$('.lightbox-gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});
$('.lightbox-form').magnificPopup({
	type: 'inline',
	preloader: false,
	focus: '.name input',

	removalDelay: 300,
	mainClass: 'mfp-fade',
	
	// When elemened is focused, some mobile browsers in some cases zoom in
	// It looks not nice, so we disable it:
	callbacks: {
		beforeOpen: function() {
			if($(window).width() < 700) {
				this.st.focus = false;
			} else {
				this.st.focus = '.name input';
			}
		}
	}
});	