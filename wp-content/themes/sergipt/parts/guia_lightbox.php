<?php 
$page_name = 'home';
$section_name = 'guia';
?>

<div id="guia_form" class="conatct_form white-popup-block mfp-hide">
    <div class="col">	        
        <h2><?php the_field($page_name.'_'.$section_name.'_tit', lang_page_id_by_slug($page_name)); ?></h2>
        <p><?php the_field($page_name.'_'.$section_name.'_txt', lang_page_id_by_slug($page_name)); ?></p>
        <?php get_template_part('parts/mailchimp_form') ?>        
    </div>
</div>