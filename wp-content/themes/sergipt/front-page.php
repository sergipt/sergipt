<?php
/* Template Name: Home */

get_template_part('parts/header');

$page_name = 'home';
while(have_posts()): the_post();

?>

<?php $section_name = 'top'; ?>
<section id="" class="<?php echo $section_name ?>" style="background-image: url('<?php the_field($page_name.'_'.$section_name.'_bg'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1><?php the_field($page_name.'_'.$section_name.'_name'); ?></h1>
				<a class="linkedin" href="<?php the_field($page_name.'_'.$section_name.'_linkedin_lnk'); ?>">
					<?php get_template_part('assets/img/linkedin_ico.svg'); ?>
					<?php the_field($page_name.'_'.$section_name.'_linkedin_txt'); ?>
				</a>
				<a class="github" href="<?php the_field($page_name.'_'.$section_name.'_github_lnk'); ?>">
					<?php get_template_part('assets/img/github_ico.svg'); ?>
					<?php the_field($page_name.'_'.$section_name.'_github_txt'); ?>
				</a>
				<a class="email" href="mailto:<?php the_field($page_name.'_'.$section_name.'_email'); ?>">
					<?php get_template_part('assets/img/github_ico.svg'); ?>
					<?php the_field($page_name.'_'.$section_name.'_email'); ?>
				</a>
				<a class="button cv" href="http://sergipt.com/wp-content/uploads/CV-Sergi-Palau-Tort.pdf" target="_blank">
					<?php the_field($page_name.'_'.$section_name.'_cv_txt'); ?>
				</a>
			</div>
			<div class="col">
				<p><?php the_field($page_name.'_'.$section_name.'_desc'); ?></p>
			</div>
		</div>
	</div>
</section>

<?php $section_name = 'bottom'; ?>
<section id="" class="<?php echo $section_name ?> align_center grey_bg">
	<div class="row skills slides_container">
		<?php
		if( have_rows($page_name.'_'.$section_name.'_skills') ):
			while ( have_rows($page_name.'_'.$section_name.'_skills') ) : the_row(); ?>
				<div class="slide skill">
					<div class="img" style="background-image: url('<?php the_sub_field($page_name.'_'.$section_name.'_skill_img'); ?>')"></div>
					<p><?php the_sub_field($page_name.'_'.$section_name.'_skill_txt'); ?></p>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php endwhile ?>

<?php get_template_part('parts/footer') ?>

<script type="text/javascript">
(function($){
	$(document).ready(function(){
			/*Carousel*/
			$('.skills.slides_container').slick({
			infinite: true,
			slidesToShow: 8,
		  	slidesToScroll: 1,
		  	arrows: false,
			autoplay: true,
			autoplaySpeed: 1000,
			pauseOnHover: false,
			responsive: [
			    {
			    breakpoint: 600,
			    	settings: {
			    		slidesToShow: 2
			    	}
			    }
		    ]
		});
	});
	$(window).resize(function(){

	});
})(jQuery);
</script>
