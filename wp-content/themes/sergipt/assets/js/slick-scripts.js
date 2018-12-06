$(document).ready(function() {
	if(has_gallery()){		
		$('.carousel').slick({
			arrows: false,
			speed:1000,
	  		//cssEase: ceaser.easeOutQuart, // from /bower_components/Ceaser/developer/ceaser-easings.js
	  		//useTransform:true,	  		
	  		//draggable:true,
	  		autoplay: true,
	  		pauseOnHover:false,
  			autoplaySpeed: 4000,
  			fade: true,
	  		responsive: [
			    {
			      	breakpoint: 769,
			      	settings: {
				        
				      }
			    },
		    ]
		});
	}	
});

function pause_slider(){
	if(has_gallery()){ $('.carousel').slick('slickPause'); }
}
function play_slider(){
	if(has_gallery()){ $('.carousel').slick('slickPlay'); }
}

function has_gallery(){
	return $('body').hasClass('home');
}
