<?php
/*
* This is the blog page (not the home page)
*/
?>

<?php get_template_part('parts/header'); ?>


<div class="container-fluid">
  <div id="content">

    <?php while (have_posts()) : the_post(); 
    	  $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
  		  $url = $post_thumb['0'];
  		  $size = $post_thumb['1'] == $post_thumb['2'] ? 'post-thumb-squared' : '';
  		  if(!$size) $size = $post_thumb['1'] > $post_thumb['2'] ? 'post-thumb-horizontal' : 'post-thumb-vertical';?>

	    <div id="post-<?php the_ID(); ?>" <?php post_class($size); ?>>
	    	<?php if($url): ?><a href="<?php echo the_permalink(); ?>" class="post-thumbnail"><img src="<?php echo $url; ?>" alt="<?php the_title(); ?>"></a><?php endif; ?>
	      	<div class="post-texts" style="width:<?php echo $post_thumb['1']; ?>px">
	      		<div class="clearfix">
	      			<h3 class="post-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
	      			<span class="post-date"><?php echo get_the_date('d/m/Y');?></span>
	      		</div>
	      		<div class="post-excerpt"><?php the_excerpt(); ?></div>
	      	</div>
	    </div>
  	  
    <?php  endwhile; ?>

  </div>
</div>


<?php get_template_part('parts/footer'); ?>