<?php
// The Query
$args = array(	
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'rand',
);
$the_query = new WP_Query( $args );	

if ( $the_query -> have_posts() ) {		
	while ( $the_query -> have_posts() ) {
		$the_query -> the_post();		
		get_template_part('parts/product/content');
	}
} else {
	get_template_part('parts/product/no-results');
}
wp_reset_postdata();
?>