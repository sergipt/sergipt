<?php get_template_part('parts/header'); ?>

<?php if(have_posts()): while(have_posts()): the_post();?>

<?php
$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
$image_src = $post_thumb['0'];
?>

<section id="header" class="page_hader" style="background-image: url(<?php echo $image_src ?>)">
	<div class="container row">		
		<h1><?php the_title(); ?></h1>		
	</div>
</section>

<section id="" class="content waypoint_header">
	<div class="container">
		<div class="row">	        
	          <?php the_content()?>
		</div>		
	</div>
</section>

<?php endwhile;endif; ?>

<?php get_template_part('parts/footer'); ?>
