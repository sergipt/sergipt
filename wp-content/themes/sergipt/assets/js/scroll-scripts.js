var _windowHeight = $(window).height();

	$.fn.moveIt = function(){
	  var $window = $(window);
	  var instances = [];
	  
	  $(this).each(function(){
	    instances.push(new moveItItem($(this)));
	  });
	  
	  
	  on_scroll();
	  window.onscroll = function(){
	    on_scroll();
	  }

	  function on_scroll(){
	  	var scrollTop = $window.scrollTop();
	    instances.forEach(function(inst){
	      inst.update(scrollTop);
	    });
	  }
	}

	var moveItItem = function(el){
	  this.el = $(el);
	  this.speed = parseInt(this.el.attr('data-scroll-speed'));
	};

	moveItItem.prototype.update = function(scrollTop){

		// avoid flickering at the very bottom of the document
		if( (scrollTop + _windowHeight) > $(document).height()*.995) return;

		// decrease speed
		var _speed = this.speed*2;

		var _thisScrollTop = scrollTop;
		var _slide = this.el.closest('.slide');
		if(_slide.length){

			var _parentTop = _slide.offset().top;

			// do not update elements out of screen
			if( (scrollTop + _windowHeight) < _parentTop  ||  (_parentTop + _windowHeight) < scrollTop ) return;

			// transform element relative to its parent
			_thisScrollTop -= _parentTop;
		}
		var pos = _thisScrollTop / _speed;

		this.el.css('transform', 'translateY(' + -pos + 'px)');
	};

	$(function(){
	  $('[data-scroll-speed]').moveIt();
	});


	$('.speed-box.video').hover(
		function(){
			$('.speed-box.video').css('z-index','inherit');
			$(this).css('z-index',1);
		},
		function(){}
	);