<?php
$_id = get_the_ID();
$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($_id), 'medium' );
$image_src = $post_thumb['0'];
$categories =  get_categories();
$category = $categories[0];
$authors = get_terms( array(
    'taxonomy' => 'autor',
    'hide_empty' => false,
) );
$author = $authors[0];
?>

<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-thumb" style="background-image: url(<?php echo $image_src; ?>);"></div>
	<div class="entry-text">
		<p class="entry-author"><?php echo $author->name ?></p>
		<p class="entry-category"><?php echo $category->name ?></p>
		<p class="entry-title"><?php the_title() ?></p>
	</div>	
</a>








