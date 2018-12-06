<?php

function lamigraf_customize_register( $wp_customize ) {

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


	register_social_control($wp_customize);
	register_footer_control($wp_customize);

}
add_action( 'customize_register', 'lamigraf_customize_register' );




function register_social_control($wp_customize){

	$wp_customize->add_section('social_section' , array(
	    'title'      => __( 'Social', 'lamigraf' ),
	    'priority'   => 30,
	) );

	// SOCIAL NETWORKS
	$wp_customize->add_setting('networks_facebook_setting', array());	
	$wp_customize->add_control('networks_facebook', array('label' => __( 'Facebook', 'lamigraf' ), 'section' => 'social_section', 'settings' => 'networks_facebook_setting', 'type'     => 'text') );

	$wp_customize->add_setting('networks_instagram_setting', array());	
	$wp_customize->add_control('networks_instagram', array('label' => __( 'Instagram', 'lamigraf' ), 'section' => 'social_section', 'settings' => 'networks_instagram_setting', 'type'     => 'text') );

	$wp_customize->add_setting('networks_youtube_setting', array());	
	$wp_customize->add_control('networks_youtube', array('label' => __( 'Youtube', 'lamigraf' ), 'section' => 'social_section', 'settings' => 'networks_youtube_setting', 'type'     => 'text') );

	$wp_customize->add_setting('networks_twitter_setting', array());	
	$wp_customize->add_control('networks_twitter', array('label' => __( 'Twitter', 'lamigraf' ), 'section' => 'social_section', 'settings' => 'networks_twitter_setting', 'type'     => 'text') );
	
	

}

function register_footer_control($wp_customize){

	$wp_customize->add_section('footer_section' , array(
	    'title'      => __( 'Footer', 'lamigraf' ),
	    'priority'   => 30,
	) );


	$wp_customize->add_setting('footer_email_setting', array());	
	$wp_customize->add_control('footer_email', array('label' => __( 'E-mail', 'lamigraf' ), 'section' => 'footer_section', 'settings' => 'footer_email_setting', 'type'  => 'text') );

	$wp_customize->add_setting('footer_phone_setting', array());	
	$wp_customize->add_control('footer_phone', array('label' => __( 'Phone', 'lamigraf' ), 'section' => 'footer_section', 'settings' => 'footer_phone_setting', 'type'  => 'text') );

	$wp_customize->add_setting('footer_copy_setting', array());	
	$wp_customize->add_control('footer_copy', array('label' => __( 'Copy', 'lamigraf' ), 'section' => 'footer_section', 'settings' => 'footer_copy_setting', 'type'  => 'text') );
}
	
function rdm_customizer_frontend_css()
{
    ?>
		<style type="text/css">
			
			
		</style>

    <?php

    
}
//add_action( 'wp_head', 'rdm_customizer_frontend_css');