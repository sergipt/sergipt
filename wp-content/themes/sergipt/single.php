<?php 
get_template_part('parts/header');

$page_name = 'blog';
while(have_posts()): the_post(); 

global $wp;
$current_url = home_url(add_query_arg(array(),$wp->request));
$_id = get_the_ID();
$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($_id), 'full' );
$image_src = $post_thumb['0'];
$categories =  get_categories();
$category = $categories[0];
$author_ID = $author_slug = $author_name = $author_img = '';
$athors = wp_get_post_terms($_id, 'autor');
if ($athors){
	$author_ID = $athors[0]->term_id;
	$author_slug = $athors[0]->slug;
	$author_name = $athors[0]->name;
	$author_description = $athors[0]->description;
	$author_img = get_field( 'author_img', 'autor_'.$author_ID);	
}
?>

<section id="header" class="page_hader"></section>

<section id="" class="post_content white_bg">
	<div class="container narrow row"> 
		<div class="entry-thumb" style="background-image: url(<?php echo $image_src ?>)"></div>
		<div class="post_info">
			<h1 class="post_title"><?php the_title(); ?></h1>
			<p class="post_date"><?php echo get_the_date( 'j' ).' de '.get_the_date( 'F' ).', '.get_the_date( 'Y' ) ?></p>
			<p class="post_category"><?php echo $category->name ?></p>
			<div class="post_txt">
					<?php the_content() ?>  
			</div>
			<?php if(get_sub_field($page_name.'_'.$section_name.'_file', lang_page_id_by_slug($page_name))): ?> 
				<a class="download button" target="_blank" href="<?php the_sub_field($page_name.'_'.$section_name.'_file', lang_page_id_by_slug($page_name)); ?>"><?php _e('DESCARGAR MATERIAL','blognroll') ?></a>
			<?php endif ?> 
		</div>	
	</div>
</section>

<section id="" class="share white_bg">
	<div class="container narrow">
		<div class="row">
			<ul class="rrssb-buttons">
				<li class="rrssb-facebook">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url ?>" class="popup"><?php get_template_part('assets/img/facebook.svg') ?></a>
				</li>
				<li class="rrssb-twitter">				
					<a href="https://twitter.com/intent/tweet?text=<?php echo $current_url ?>" class="popup"><?php get_template_part('assets/img/twitter.svg') ?></a>
				</li>
				<li class="rrssb-googleplus">				
					<a href="https://twitter.com/intent/tweet?text=<?php echo $current_url ?>" class="popup"><?php get_template_part('assets/img/google.svg') ?></a>
				</li>
				<li class="rrssb-linkedin">				
					<a href="https://twitter.com/intent/tweet?text=<?php echo $current_url ?>" class="popup"><?php get_template_part('assets/img/linkedin.svg') ?></a>
				</li>
			</ul>	
		</div>
	</div>
</section>

<?php $section_name = 'bloganrolear'; ?>
<section id="<?php echo $section_name ?>" class="<?php echo $section_name ?>">
	<div class="container narrow">
		<div class="row">
			<div class="col col_img" style="background-image: url(<?php the_field($page_name.'_'.$section_name.'_img', lang_page_id_by_slug($page_name)); ?>)"></div>
			<div class="col col_txt">
				<h2><?php the_field($page_name.'_'.$section_name.'_tit', lang_page_id_by_slug($page_name)); ?></h2>	
				<p class="destacado_final"><?php the_field($page_name.'_'.$section_name.'_htxt', lang_page_id_by_slug($page_name)); ?></p>
				<a class="button lightbox-form" href="#guia_form"><?php the_field($page_name.'_'.$section_name.'_btn_txt', lang_page_id_by_slug($page_name)); ?></a>
			</div>
		</div>
	</div>
</section>

<?php $section_name = 'about_author'; ?>
<section id="" class="<?php echo $section_name ?> white_bg" >
	<div class="container narrow">
		<div class="row">	
			<h3 class="align_center"><?php the_field($page_name.'_'.$section_name.'_tit', lang_page_id_by_slug($page_name)); ?></h3>
		</div>
		<div class="container-box row">			
			<div class="post_author_img" style="background-image: url(<?php echo $author_img ?>)"></div>
			<div class="post_author_txt">
				<h2 class="post_author_name"><?php echo $author_name ?></h2>
				<p class="post_author_desc"><?php echo $author_description ?></p>
			</div>
		</div>	
	</div>			
</section>

<?php $section_name = 'related' ?>
<section id="" class="<?php echo $section_name ?> white_bg" >
	<div class="container narrow row">
		<h2 class="align_center"><?php the_field($page_name.'_'.$section_name.'_tit', lang_page_id_by_slug($page_name)); ?></h2>		
		<div class="noticias_list">
			<?php get_template_part('parts/post/related-list')  ?>	
		</div>	
	</div> 
</section>

<?php $section_name = 'comments'; ?>
<section id="" class="<?php echo $section_name ?> white_bg" >
	<div class="container narrow row">
		<h3 class=""><?php the_field($page_name.'_'.$section_name.'_tit', lang_page_id_by_slug($page_name)); ?></h3>
		<div class="comments_number">
			<?php comments_number() ?>
		</div> 
		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</div> 
</section>

<?php get_template_part('parts/footer'); ?>

<?php endwhile ?>

<script type="text/javascript">
jQuery(function($){
	"use strict"; 
	$(document).ready(function() {	
		$('.rrssb-buttons').rrssb({
			// required:
			title: 'This is the email subject and/or tweet text',
			url: 'http://rrssb.ml/',

			// optional:
			description: 'Longer description used with some providers',
			emailBody: 'Usually email body is just the description + url, but you can customize it if you want'
		});
		var waypoint_share1 = new Waypoint({
			element: $('body'),
			offset: - $('.page_hader').height(),
			handler : function( direction ) {
				if ( direction === 'down' ) { 
					$('.share').addClass('sticky')
				} else {					
					$('.share').removeClass('sticky')
				}
			}
		});
		var waypoint_share1 = new Waypoint({
			element: $('body'),
			offset: - 200 - $('.post_content').height(),
			handler : function( direction ) {
				if ( direction === 'down' ) { 
					$('.share').removeClass('sticky')
				} else {					
					$('.share').addClass('sticky')
				}
			}
		});
		$('.tags a').click(function(e){
			e.preventDefault();
		});
	});   
});
</script> 

