<?php
$videoId = get_the_content();		
$image = 'https://i.ytimg.com/vi/'.$videoId.'/hqdefault.jpg';
$link = 'https://www.youtube.com/watch?v='.$videoId;
?>

<a href="<?php echo $link ?>" id="" class="video" target="_blank">	
	<div class="entry-thumb" style="background-image: url('<?php echo $image; ?>')">
		<div class="icon_play"></div>
	</div>
	<div class="entry-text">
		<p class="entry-date"><?php the_date('d-m-Y') ?></p>
		<p class="entry-title"><?php the_title() ?></p>		
	</div>	
</a>