<?php
// The Query
if ( $query -> have_posts() ) {		
	while ( $query -> have_posts() ) {
		$query -> the_post();		
		get_template_part('parts/product/content');
	}
} else {
	get_template_part('parts/product/no-results');
}
wp_reset_postdata();
?>