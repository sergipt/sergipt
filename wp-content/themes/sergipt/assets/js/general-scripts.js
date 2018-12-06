$(document).ready(function() {	
	$('a[href="#"]').click(function(event){ 
		event.preventDefault(); 
	});

	/*TOOLTIP*/
	$('[data-toggle="tooltip"]').tooltip();  
  
	/*BACK TO TOP*/
	$('.back-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	/*MENU*/
	function toggle_menu(){
		console.log('toggle_menu');
		$('.nav-button').toggleClass('-close');
		$('.nav-button').toggleClass('-open');
		if($('body').hasClass('open-menu')){
			$('body').addClass('closing-menu');
			$('body').removeClass('open-menu');			
			setTimeout(function(){$('body').removeClass('closing-menu');}, 700);
		}else{
			$('body').addClass('open-menu');
		}
	}

	$('.nav-button').click(function(){
		toggle_menu();
	});

	$('.open-menu .main-menu a').click(function(){
		toggle_menu();
	});
		
	/*ANIMATE START*/
	$('[class*="animate_"]').each(function(){		
		$(this).addClass('animate_start');
	});		
});

$(window).load(function(){	
	/*$('body').addClass('white_menu');
	var element = $('.waypoint_header');
	var header_pos = $('header').outerHeight()/2;
	var waypoint_header = new Waypoint({
		element: element,
		offset: header_pos,
		handler : function( direction ) {
			if ( direction === 'down' ) { 
				$('body').addClass('white_menu')
			} else {					
				$('body').removeClass('white_menu')
			}
		}
	});	*/

	var element = $('body');
	var header_pos = -200;
	var waypoint_header = new Waypoint({
		element: element,
		offset: header_pos,
		handler : function( direction ) {
			if ( direction === 'down' ) { 
				$('body:not(.always_sticky)').addClass('sticky_header')
			} else {					
				$('body:not(.always_sticky)').removeClass('sticky_header')
			}
		}
	});
});


$(window).resize(function(){

});

$(window).scroll(function() {
	
});

/*$(window).on("orientationchange",function(){
	location.reload();
});*/


