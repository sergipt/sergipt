<?php 
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'maintenance' ) );
});
get_template_part('parts/header'); 
?>

<section id="" class="main">
	<div class="container">
		<div class="row construccion">
		 <p>En construcción…</p>
		</div>
		<div class="row info">			
			<div class="vertical_center">
				<div class="col logo"></div>
				<div class="col content">
					<h1>¡Sé el rey del blog!</h1>
					<p>En Blog&Roll aprendrás a tener una cultura visual más óptima, tendrás a tu alcance miles de consejos para hacer de tu blog un lugar dónde apetezca quedarse leyendo durante horas y sabrás  crear tu propio logotipo.</p>
					<p class="small">¡Suscríbete y sé el primero en enterarte del estreno del blog!</p>
					<?php include('parts/mailchimp_form.php')  ?>
				</div>				
			</div>
		</div>
	</div>
</section>	

<?php get_template_part('parts/footer') ?>
