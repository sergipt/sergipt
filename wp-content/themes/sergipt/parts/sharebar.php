<?php
	// GET IMAGE 
	$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	if($post_thumb){
		$post_thumb_url = urlencode($post_thumb['0']);
	}
	else{
		$post_thumb_url = get_template_directory_uri().'/assets/img/logo.png';
	}
	$lnk =  urlencode(get_permalink());
?><div id="sharebar"> 
	<ul>
		<li><a href="http://twitter.com/home?status=<?php echo urlencode(get_bloginfo().' | '.get_the_title().' | '.get_permalink());?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $lnk;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $lnk;?>&media=<?php echo $post_thumb_url; ?>&description=<?php echo urlencode(get_bloginfo().' | '.get_the_title()); ?>"  count-layout="horizontal" target="_blank"><i class="fa fa-pinterest"></i></a></li>
 		<li><a href="https://plus.google.com/share?url=<?php echo $lnk;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
 		<li><a href="whatsapp://send?text=<?php echo urlencode(get_bloginfo().' | '.get_the_title().' | '.get_permalink());?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
 		<li><a href="mailto:?subject=<?php echo get_bloginfo().' '.urlencode(_e('Project'));?>&body=<?php echo urlencode(_e('Check out this project by').' '.get_bloginfo().': '.get_permalink());?>"><i class="fa fa-envelope"></i></a></li>
	</ul>
</div>