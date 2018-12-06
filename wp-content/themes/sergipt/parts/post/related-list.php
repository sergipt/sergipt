<?php 
// The Query
$args = array(	
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,										
	'orderby' => 'date',
);
$the_query = new WP_Query( $args );	
if ( $the_query -> have_posts() ) {		
	while ( $the_query -> have_posts() ) {
		$the_query -> the_post();
		get_template_part('parts/post/content');
	}							
} else {
	get_template_part('parts/post/no-results');
} // End loop				
wp_reset_postdata(); 				
?>