<?php 
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'always_sticky', 'sticky_header' ) );
} );
get_template_part('parts/header'); 
?>

<section id="" class="page_header waypoint_header"></section>

<section class="main-404 roto tt">
	<div class="container row">	
		<div class="col">
			<h1>Oops!</h1>
			<p><?php _e('The page you are looking for does not exist'); ?></p>
			<a  class="button" href="<?php echo home_url() ?>"><?php  _e('Go to home','projectname'); ?></a>
		</div>
		<div class="col"></div>
	</div>
</section>

<?php get_template_part('parts/footer'); ?>
