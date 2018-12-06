<?php 
$videos = array();
$status0 = null;
$channelId =  'UClZ4-xMnFMfCqEAYPbZj30Q';
$maxResults = '20';
$key =  'AIzaSyB3iJ5dP_GVVXTYGjVnWFDbXIevS10vCCY'; 	
$url = "https://www.googleapis.com/youtube/v3/search?channelId={$channelId}&part=snippet,id&order=date&maxResults={$maxResults}&key={$key}";  
$resp_json = file_get_contents($url);   
$resp = json_decode($resp_json, true);   
if($resp['status']=='OK'){     
	$totalResults =  $resp['totalResults'];
	for ($i=0; $i < $totalResults; $i++) { 
		$video = array(
			'videoId'=> $resp['items'][$i]['videoId'],
			'title'=> $resp['items'][$i]['snippet']['title'],
			'publishedAt'=> $resp['items'][$i]['snippet']['publishedAt'],
			'thumbnail'=> $resp['items'][$i]['snippet']['thumbnails']['high']['url']
			//'thumbnail'=> "https://i.ytimg.com/vi/{videoId}/default.jpg"
		);
		array_push($videos, $video);
	} 
}
if ( $videos ) {		
	for ( $i = 0; $i < $totalResults; $i++){
		$vidID = $videos[$i]['videoId'];		
		$image = $videos[$i]['thumbnail'];;
		$link = 'https://www.youtube.com/watch?v='.$vidID;	
		$date = $videos[$i]['publishedAt'];
		$title = $videos[$i]['title'];		
		//get_template_part('parts/video/content');
		?>
		<a href="<?php echo $link ?>" id="" class="video">	
			<div class="entry-thumb" style="background-image: url('<?php echo $image; ?>')">
				<div class="icon_play"></div>
			</div>
			<div class="entry-text">
				<p class="entry-date"><?php echo $date ?></p>
				<p class="entry-title"><?php echo $title ?></p>		
			</div>	
		</a>
		<?php
	}
} else {
	get_template_part('parts/video/no-results');
}
?>