<?php

/*
Google CDN jQuery with a local fallback
See http://www.wpcoke.com/load-jquery-from-cdn-with-local-fallback-for-wordpress/
*/
if (is_admin()&&!function_exists('save_with_keyboard_enqueue')) {
	function save_with_keyboard_enqueue() {
		wp_enqueue_script('swk_js', get_bloginfo('template_url').'/assets/js/saveWithKeyboard'.(WP_DEBUG?'':'.min').'.js',array('jquery'));
	}
	add_action('admin_enqueue_scripts','save_with_keyboard_enqueue');
}

if( !is_admin()){ 
	$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'; 
	$test_url = @fopen($url,'r'); 
	if($test_url !== false) { 
		function load_external_jQuery() {
			wp_deregister_script('jquery'); 
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); 
			wp_enqueue_script('jquery'); 
		}
		add_action('wp_enqueue_scripts', 'load_external_jQuery'); 
	} else {
		function load_local_jQuery() {
			wp_deregister_script('jquery'); 
			wp_register_script('jquery', get_bloginfo('template_url').'/assets/js/jquery-1.11.1.min.js', __FILE__, false, '1.11.1', true); 
			wp_enqueue_script('jquery'); 
		}
	add_action('wp_enqueue_scripts', 'load_local_jQuery'); 
	}
}

function login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'login_stylesheet' );

function enqueues(){
	if(!is_admin()){

		if(has_slider()){            
			wp_register_script('ceaser-easings-js', get_template_directory_uri() . '/bower_components/Ceaser/developer/ceaser-easings.js', false, null, true);
			wp_enqueue_script('ceaser-easings-js');
			wp_enqueue_style('slick-css', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.css');
			wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick-theme.css');
			wp_register_script('slick-js', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.min.js', false, null, true);
			wp_enqueue_script('slick-js');
			//wp_register_script('slick-scripts', get_template_directory_uri() . '/assets/js/slick-scripts.js', false, null, true);
			//wp_enqueue_script('slick-scripts');
		}
		
		wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', false, null, true);
		wp_enqueue_script('modernizr');

		wp_register_script('html5shiv.js', get_template_directory_uri() . '/assets/js/html5shiv.js', false, null, true);
		wp_enqueue_script('html5shiv.js');

		wp_register_script('respond', get_template_directory_uri() . '/assets/js/respond.min.js', false, null, true);
		wp_enqueue_script('respond');

		if(has_pagepiling()){
			wp_register_script('pagepiling', get_stylesheet_directory_uri() . '/assets/js/jquery.pagepiling.min.js', array('jquery'),'1.5.3', true);
			wp_enqueue_script('pagepiling');  
		}

		if(has_waypoints()){
			wp_register_script('waypoints', get_stylesheet_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'),'4.0.0', true);
			wp_enqueue_script('waypoints');
		}
		if(has_inview()){
			wp_register_script('inview', get_stylesheet_directory_uri() . '/assets/js/inview.min.js', array('jquery'),'4.0.0', true);
			wp_enqueue_script('inview');
		}

		wp_register_script('bootstrap-js', get_template_directory_uri() . '/bower_components/bootstrap-sass/assets/javascripts/bootstrap.js', false, null, true);
		wp_enqueue_script('bootstrap-js');
		
		/*wp_register_script('scroll-scripts', get_stylesheet_directory_uri() . '/assets/js/scroll-scripts.js', array('jquery'),null, true);
		wp_enqueue_script('scroll-scripts');*/

		wp_register_script('general-js', get_template_directory_uri() . '/assets/js/general-scripts.js', false, null, true);
		wp_enqueue_script('general-js');

		if(has_pagepiling()){
			wp_enqueue_style( 'pagepiling', get_stylesheet_directory_uri() . '/assets/css/jquery.pagepiling.css');    
		}

		wp_register_style('styles-css', get_template_directory_uri() . '/assets/css/styles.min.css?v=1.0', false, null);
		wp_enqueue_style('styles-css');

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
		if(has_search_and_filter_form()){
			wp_register_script('search-and-filter-scripts', get_template_directory_uri() . '/assets/js/search-and-filter-scripts.js', false, null, true);
			wp_enqueue_script('search-and-filter-scripts');
		}
		if(has_odometer()){
			wp_register_script('odometer-scripts', get_template_directory_uri() . '/assets/js/odometer.min.js', false, null, true);
			wp_enqueue_script('odometer-scripts');
			wp_register_style('odometer-css', get_template_directory_uri() . '/assets/css/odometer.css', false, null);
			wp_enqueue_style('odometer-css');
		}
		if(has_lightbox()){
			wp_register_script('magnific-popup-scripts', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', false, null, true);
			wp_enqueue_script('magnific-popup-scripts');
			wp_register_style('magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', false, null);
			wp_enqueue_style('magnific-popup-css');
			wp_register_script('lightbox-scripts', get_stylesheet_directory_uri() . '/assets/js/lightbox-scripts.js', array('jquery'),null, true);
			wp_enqueue_script('lightbox-scripts');
		}
		if(has_tooltip()){
			wp_register_script('tooltip', get_template_directory_uri() . '/bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js', false, null, true);
			wp_enqueue_script('tooltip');
		}
		if(has_lazyload()){
			wp_register_script('lazyload-scripts', get_stylesheet_directory_uri() . '/bower_components/jquery_lazyload/jquery.lazyload.js', array('jquery'),null, true);
			wp_enqueue_script('lazyload-scripts');
		} 
		if(has_share()){
			wp_register_script('share-scripts', get_stylesheet_directory_uri() . '/bower_components/rrssb/js/rrssb.min.js', false, null, true);
			wp_enqueue_script('share-scripts');
			//wp_register_style('share-css', get_stylesheet_directory_uri() . '/bower_components/rrssb/css/rrssb.css', false, null);
			//wp_enqueue_style('share-css');
		} 
		if(has_isotope()){
			wp_register_script('isotope-scripts', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', false, null, true);
			wp_enqueue_script('isotope-scripts');
		} 
	}
}
add_action('wp_enqueue_scripts', 'enqueues', 100);

function has_pagepiling(){
	return false;
}
function has_waypoints(){
	return true;
}
function has_inview(){
	return false;
}
function has_slider(){
	return is_front_page();
}
function has_search_and_filter_form(){
	return false;
}
function has_tooltip(){
	return false;
}
function has_odometer(){
	return false;
}
function has_lightbox(){
	return false;
}
function has_lazyload(){
	return false;
}
function has_share(){
	return false;
}
function has_isotope(){
	return false;
}

// return is_front_page() || is_page_template( 'nosotros.php' ) || is_singular( 'product' ) 