<?php 
/* Template Name: Home */ 

get_template_part('parts/header');

$page_name = 'home';
while(have_posts()): the_post(); 
?>

<?php $section_name = 'header_slider'; ?>
<section id="header-slider" class="<?php echo $section_name ?> page_header slides_section waypoint_header txt_blanco">
	<div class="row slides_container">
		<?php 
		if( have_rows($page_name.'_'.$section_name) ):		
			while ( have_rows($page_name.'_'.$section_name) ) : the_row();
				$selected = get_sub_field($page_name.'_'.$section_name.'_style'); 					
                if( $selected == 't' ) {
                	$style_class =  'txt_only';                     
                } else if( $selected == 'til' ) { 
                    $style_class =  'til';                    
                } else if( $selected == 'tir' ) {
                    $style_class =  'tir'; 
                } ?>
                <div class="slide <?php echo $style_class ?>" style="background-image: url('<?php the_sub_field($page_name.'_'.$section_name.'_bg'); ?>')">
                	<div class="gradient"></div>
	                <div class="container">
	               		<div class="v_align">		
		                	<div class="col">
			                	<?php if( get_sub_field($page_name.'_'.$section_name.'_tit')){ ?>
			                		<h2><?php the_sub_field($page_name.'_'.$section_name.'_tit'); ?></h2>              	
								<?php } if( get_sub_field($page_name.'_'.$section_name.'_txt')){ ?>	
									<p><?php the_sub_field($page_name.'_'.$section_name.'_txt'); ?></p>
								<?php } if( get_sub_field($page_name.'_'.$section_name.'_btn_txt')){ ?>
									<button><a href="<?php the_sub_field($page_name.'_'.$section_name.'_btn_lnk'); ?>"><?php the_sub_field($page_name.'_'.$section_name.'_btn_txt'); ?></a></button>								
								<?php } ?>
							</div>
							<?php $img = get_sub_field($page_name.'_'.$section_name.'_img'); ?>
							<?php if( !empty($img) ): ?>
								<div class="col">
									<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>"/>								
								</div>				
							<?php endif; ?>
						</div>
					</div>
				</div>				
			<?php endwhile; ?>					
		<?php endif;?>
	</div>			
</section>

<?php $section_name = 'logos'; ?>
<section id="logos" class="<?php echo $section_name ?>">	
	<div class="row slides_container">		
		<?php 
		if( have_rows($page_name.'_'.$section_name) ):		
			while ( have_rows($page_name.'_'.$section_name) ) : the_row(); ?>
				<div class="slide" style="background-image: url('<?php the_sub_field($page_name.'_'.$section_name.'_logo_img'); ?>')">						
				</div>
			<?php endwhile; ?>					
		<?php endif; ?>			
	</div>
</section>

<?php $section_name = 'video'; ?>
<section id="video" class="<?php echo $section_name ?> txt_blanco align_center">
	<?php if (getDeviceType() != 'phone'){	?>	
		<video class="video_src" loop="loop" preload="auto" autoplay="autoplay" poster="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/manzaning_vbg.jpg">
			<source type='video/mp4' src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/manzaning_vbg.mp4" />
			<source type='video/ogg; codecs="theora, vorbis"' src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/manzaning_vbg.ogv" />
			<source type='video/webm' src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video/manzaning_vbg.webm" />	
		</video>
	<?php } ?>
	<div class="bg_overlay">
		<div class="container">
			<div class="row">
				<h2><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h2>
				<h4><?php the_field($page_name.'_'.$section_name.'_subtit'); ?></h4>
				<button><a class="lightbox-video" href="<?php the_field($page_name.'_'.$section_name.'_url'); ?>"></a></button>
			</div>
		</div>
	</div>	
</section>

<?php $section_name = 'como_comprar'; ?>
<section id="como-comprar" class="<?php echo $section_name ?>">	
	<div class="container row">
		<h2><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h2>	
		<?php $item = '1'; ?>
		<div class="paso">		
			<object type="image/svg+xml" data="<?php the_field($page_name.'_'.$section_name.'_img_'.$item); ?>"></object>
			<h3>#<?php echo $item; ?></h3>
			<p><?php the_field($page_name.'_'.$section_name.'_txt_'.$item); ?></p>
		</div>
		<?php $item = '2'; ?>
		<div class="paso">
			<object type="image/svg+xml" data="<?php the_field($page_name.'_'.$section_name.'_img_'.$item); ?>"></object>
			<h3>#<?php echo $item; ?></h3>
			<p><?php the_field($page_name.'_'.$section_name.'_txt_'.$item); ?></p>
		</div>
		<?php $item = '3'; ?>
		<div class="paso">
			<object type="image/svg+xml" data="<?php the_field($page_name.'_'.$section_name.'_img_'.$item); ?>"></object>
			<h3>#<?php echo $item; ?></h3>
			<p><?php the_field($page_name.'_'.$section_name.'_txt_'.$item); ?></p>
		</div>
		<?php $item = '4'; ?>
		<div class="paso">
			<object type="image/svg+xml" data="<?php the_field($page_name.'_'.$section_name.'_img_'.$item); ?>"></object>
			<h3>#<?php echo $item; ?></h3>
			<p><?php the_field($page_name.'_'.$section_name.'_txt_'.$item); ?></p>
		</div>
	</div>
</section>

<?php $section_name = 'descargar_app'; ?>
<section id="descargar-app" class="<?php echo $section_name ?>" style="background-image: url('<?php the_field($page_name.'_'.$section_name.'_bg_1') ?>')">
	<div class="container">
		<div class="carton" style="background-image: url('<?php the_field($page_name.'_'.$section_name.'_bg_2') ?>')">
			<div class="row">	
				<h2><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h2>
			</div>
			<div class="row slides_container">	
			<?php 		
			if( have_rows($page_name.'_'.$section_name.'_cats') ):		
				while ( have_rows($page_name.'_'.$section_name.'_cats') ) : the_row(); ?>
					<div class="slide cat">									
						<img src="<?php the_sub_field($page_name.'_'.$section_name.'_cat_img'); ?>">
						<h4><?php the_sub_field($page_name.'_'.$section_name.'_cat_txt'); ?></h4>	
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			<div class="row botones">
				<button class="app_store"><a target="_blank" href="<?php the_field($page_name.'_'.$section_name.'_app_store_lnk'); ?>"></a></button>
				<button class="google_play"><a target="_blank" href="<?php the_field($page_name.'_'.$section_name.'_google_play_lnk'); ?>"></a></button>
			</div>
		</div>
	</div>
</section>

<?php $section_name = 'comercio'; ?>
<section id="eres-un-comercio" class="<?php echo $section_name ?>">	
	<div class="container row">
		<h2><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h2>
		<h2 class="subtit"><?php the_field($page_name.'_'.$section_name.'_subtit'); ?></h2>
	</div>
	<div class="row animacion">		
        <div class="ciudad"></div>
        <div class="ruedas"></div>
        <div class="camion"></div>
        <div class="farolas"></div>
        <div class="carretera"></div>    	
	</div>
	<div class="container">
		<div class="row pasos">
			<?php $item = '1'; ?>
			<div class="col">
				<img src="<?php the_field($page_name.'_'.$section_name.'_item_'.$item.'_img'); ?>">
				<h4><?php the_field($page_name.'_'.$section_name.'_item_'.$item.'_tit'); ?></h4>
				<p><?php the_field($page_name.'_'.$section_name.'_item_'.$item.'_txt'); ?></p>
			</div>
			<?php $item = '2'; ?>
			<div class="col">
				<img src="<?php the_field($page_name.'_'.$section_name.'_item_'.$item.'_img'); ?>">
				<h4><?php the_field($page_name.'_'.$section_name.'_item_'.$item.'_tit'); ?></h4>
				<p><?php the_field($page_name.'_'.$section_name.'_item_'.$item.'_txt'); ?></p>
			</div>
		</div>
	</div>
</section>

<?php $section_name = 'mas_info'; ?>
<section id="mas-info" class="<?php echo $section_name ?>">	
	<div class="container">
		<div class="row">
			<p><?php the_field($page_name.'_'.$section_name.'_txt'); ?> <a href="mailto: <?php echo get_theme_mod('footer_email_setting') ?>"><?php echo get_theme_mod('footer_email_setting') ?></a></p>
		</div>
	</div>
</section>

<?php $section_name = 'testimoniales'; ?>
<section id="testimoniales" class="<?php echo $section_name ?> txt_blanco">	
	<div class="row slides_container">
		<?php 
		if( have_rows($page_name.'_'.$section_name) ):		
			while ( have_rows($page_name.'_'.$section_name) ) : the_row(); ?>
				<div class="slide testimonial" style="background-image: url('<?php the_sub_field($page_name.'_'.$section_name.'_bg') ?>')">	
					<img src="<?php the_sub_field($page_name.'_'.$section_name.'_img'); ?>">
					<h3><?php the_sub_field($page_name.'_'.$section_name.'_txt'); ?></h3>
					<?php get_template_part('assets/img/icon_comillas.svg'); ?>
					<p><?php the_sub_field($page_name.'_'.$section_name.'_name'); ?></p>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php $section_name = 'prensa'; ?>
<section id="prensa" class="<?php echo $section_name ?>">
	<div class="container row">
		<h2><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h2>
		<h2 class="subtit"><?php the_field($page_name.'_'.$section_name.'_subtit'); ?></h2>
	</div> 
	<div class="desktop tablet row marcas">
		<?php
		if( have_rows($page_name.'_'.$section_name) ):		
			while ( have_rows($page_name.'_'.$section_name) ) : the_row(); ?>
				<div class="slide marca" style="background-image: url('<?php the_sub_field($page_name.'_'.$section_name.'_img'); ?>')">
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="mobile row marcas slides_container">
		<?php
		if( have_rows($page_name.'_'.$section_name) ):		
			while ( have_rows($page_name.'_'.$section_name) ) : the_row(); ?>
				<a class="slide marca" href="<?php the_sub_field($page_name.'_'.$section_name.'_lnk'); ?>" style="background-image: url('<?php the_sub_field($page_name.'_'.$section_name.'_img'); ?>')">
				</a>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php $section_name = 'faq'; ?>
<section id="faq" class="<?php echo $section_name ?>">	
	<div class="container row">
		<h2><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h2>	
		<?php 
		if( have_rows($page_name.'_'.$section_name) ):		
			while ( have_rows($page_name.'_'.$section_name) ) : the_row(); ?>
				<div class="pregunta">
					<h5><?php the_sub_field($page_name.'_'.$section_name.'_tit'); ?></h5>
					<p><?php the_sub_field($page_name.'_'.$section_name.'_txt'); ?></p>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>		
	</div>
	<div class="container row mas_faq">
		<button><a target="_blank" href="<?php the_field($page_name.'_'.$section_name.'_btn_lnk'); ?>"><?php the_field($page_name.'_'.$section_name.'_btn_txt'); ?></a></button>
	</div>
</section>

<?php $section_name = 'unete'; ?>
<section id="unete" class="<?php echo $section_name ?> txt_blanco align_center" style="background-image: url('<?php the_field($page_name.'_'.$section_name.'_bg') ?>')">	
	<div class="container row">
		<h4><?php the_field($page_name.'_'.$section_name.'_tit'); ?></h4>
		<?php echo do_shortcode(get_field($page_name.'_'.$section_name.'_shortcode')); ?>				
	</div>	
</section>

<?php endwhile ?>

<?php get_template_part('parts/footer') ?>	

<script type="text/javascript">
(function($){
	$(document).ready(function(){		
		/*Header slider*/
		$('.header_slider .slides_container').slick({	
			infinite: true,
			dots: true,
			speed: 1000,	
			fade: true,
			arrows: false,	
			autoplay: true,
			autoplaySpeed: 3000
		});
		/*Logos slider*/
		$('.logos .slides_container').slick({	
			infinite: true,			
			slidesToShow: 5,
		  	slidesToScroll: 1,		
			autoplay: true,
			autoplaySpeed: 3000,
			responsive: [
			    {
			    breakpoint: 1024,
			    	settings: {
			    		slidesToShow: 4,			    		
			    		arrows: false	
			    	}
			    },
			    {
			    breakpoint: 600,
			    	settings: {
			    		slidesToShow: 1			    		
			    	}
			    }
		    ]
		});
		/*Desgargar app slider*/
		$('.descargar_app .slides_container').slick({	
			infinite: true,			
			slidesToShow: 4,
		  	slidesToScroll: 1,
		  	arrows: false,		
			autoplay: true,
			autoplaySpeed: 1000,
			responsive: [
			    {
			    breakpoint: 600,
			    	settings: {
			    		slidesToShow: 2
			    	}
			    }
		    ]
		});
		/*Testimoniales slider*/
		$('.testimoniales .slides_container').slick({	
			centerMode: true,
  			centerPadding: '0px',
  			slidesToShow: 3,
			infinite: true,			
		  	arrows: false,		
			autoplay: true,
			autoplaySpeed: 3000,
			responsive: [
			    {
			    breakpoint: 600,
			    	settings: {
			    		slidesToShow: 1
			    	}
			    }
		    ]
		});
		/*Prensa slider*/
		$('.prensa .slides_container').slick({  				
			responsive: [
			    {
			    breakpoint: 600,
			    	settings: {		
				    	infinite: true,    		
			    		slidesToShow: 1,
			    		slidesToScroll: 1,
			    		arrows: true,	 		
			    		autoplay: true,
						autoplaySpeed: 2500   			    			    		
			    	}
			    }
		    ]
		});
		$('.wpcf7-email').focusin(function() {
			$('.aviso').addClass('show');
		});
		$('.wpcf7-email').focusout(function() {
			$('.aviso').removeClass('show');
		});
	});		
})(jQuery);
</script>
