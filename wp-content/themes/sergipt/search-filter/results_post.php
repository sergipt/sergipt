<?php
// The Query
if ( $query -> have_posts() ) {		
	while ( $query -> have_posts() ) {
		$query -> the_post();		
		get_template_part('parts/post/content');
	}
} else {
	get_template_part('parts/post/no-results');
}
wp_reset_postdata();
?>