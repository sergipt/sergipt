<?php
require_once locate_template('/func/cleanup.php');
require_once locate_template('/func/setup.php');
require_once locate_template('/func/enqueues.php');
require_once locate_template('/func/register.php');
require_once locate_template('/func/customizer.php');
require_once locate_template('/func/widgets.php');
require_once locate_template('/func/required-plugins.php');

/* Page Slug Body Class */
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	if(is_category()){
		$classes[] = 'blog';
	}
	/*if(is_searchandfilter()){
		$classes[] = 'searchandfilter';
	}*/
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/* Animation Body Class */
function add_animation_body_class( $classes ) {	
	$classes[] = 'animate_fade';	
	return $classes;
}
add_filter( 'body_class', 'add_animation_body_class' );

/* SVG support */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*Add image size*/
//add_image_size( 'heaader', 1920, 400, true );
//add_image_size( 'heaader_thumb', 245, 53 );

/* MOBILE DETECT (needs Mobile_Detect.php)*/
require_once 'Mobile_Detect.php';
function isPhone(){
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	return $deviceType == 'phone';
}
function isTablet(){
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	return $deviceType == 'tablet';
}
function getDeviceType(){
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	return $deviceType;
}
function img_size(){
	return isPhone() ? 'medium' : 'large';
}

/* Get page ID by template filename */
function get_page_id_by_template_filename($template_name){
  $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => $template_name, // template name as stored in the dB
            )
        )
    );
    $post_id = -1;
    $posts = get_posts($args);
    foreach ($posts as $post) {
      
      $post_id = $post->ID;
      break;
    }
    return $post_id;
}

/* Get page ID by template slug */
function get_page_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

function lang_page_id($id){
	if(function_exists('icl_object_id')) {
	return icl_object_id($id,'page',true);
	} else {
	return $id;
	}
}

function lang_page_id_by_slug($page_slug){
	$page = get_page_by_path($page_slug);
	if ($page && function_exists('icl_object_id')) {
		return icl_object_id($page->ID,'page',true);
	} else if ($page) {
		return $page->ID;
	} else {
		return null;		
	} 
}

function get_lang_url_code(){
	global $sitepress;	
	if( ICL_LANGUAGE_CODE == $sitepress->get_default_language() ){
		return '/';
	} else {
		return '/'.ICL_LANGUAGE_CODE.'/';
	}	
}



//http://www.wpbeginner.com/wp-themes/how-to-add-facebook-open-graph-meta-data-in-wordpress-themes/
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
  }
add_filter('language_attributes', 'add_opengraph_doctype');

//http://www.wpbeginner.com/wp-themes/how-to-add-facebook-open-graph-meta-data-in-wordpress-themes/
//Lets add Open Graph Meta Info
function insert_fb_in_head() {
  global $post;
  if ( !is_singular())  return; //if it is not a post or a page

    $metadesc = strip_tags(get_post_field('post_content', $post->ID));

    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>';
    echo '<meta property="og:description" content="' . $metadesc . '"/>';
    $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
    
  if($post_thumb){
    $url = $post_thumb['0']; 
    echo '<meta property="og:image" content="' . $url . '"/>';
  }
  else{
    echo '<meta property="og:image" content="' . get_template_directory_uri() . '/assets/img/logo.png" />';
  }
  echo "";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );


/*
* WPML (lang menu)
*
function icl_post_languages(){

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if(is_plugin_active('sitepress-multilingual-cms')){

		$languages = icl_get_languages('skip_missing=1');
		if(1 < count($languages)){
			echo '<ul class="clearfix">';
			foreach($languages as $l){
				$l['short_name'] = $l['native_name'] == 'English' ? 'en' : ($l['native_name'] == 'Español' ? 'es' : 'ca');
				if(!$l['active']) $langs[] = '<li class="icl-'.$l['language_code'].'"> <a href="'.$l['url'].'">'.$l['short_name'].'</a></li>';
			}
			echo join('', $langs);
			echo '</ul>';
		}
	}
}
*/

// @ http://digwp.com/2012/06/add-google-analytics-wordpress/
function google_analytics_tracking_code(){
	$propertyID = 'UA-'; // GA Property ID
	?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $propertyID; ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
<?php
}
//add_action('wp_head', 'google_analytics_tracking_code');
add_action('wp_footer', 'google_analytics_tracking_code');


// Moving the Comment Text Field to Bottom
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


// Modify The Read More Link Text
function new_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Custom excerpt length
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Custom comments
function my_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    $add_below = 'div-comment';
    ?>
	<li <?php comment_class( $depth==1 ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo '<a target="_blank" href="'.get_comment_author_url().'">'.get_avatar( $comment, $args['avatar_size'] ).'</a>'; ?>
				<cite class="fn">
					<a target="_blank" href="<?php echo get_comment_author_url() ?>">
						<?php echo get_comment_author_link( $comment ) ?>
					</a>
				</cite>
			</div>
		<?php if ( '0' == $comment->comment_approved ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
		<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
			<?php
				/* translators: 1: comment date, 2: comment time */
				printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
			?>
		</div>

		<?php comment_text( $comment, array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

		<?php
		comment_reply_link( array_merge( $args, array(
			'add_below' => $add_below,
			'depth'     => $depth,
			'max_depth' => $args['max_depth'],
			'before'    => '<div class="reply">',
			'after'     => '</div>'
		) ) );
		?>

		</div>

<?php
}