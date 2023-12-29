<?php 
/**
 * Plugin Name: Get Current post tags
 * Description: Get all post tags with the shortcode [lc_show_all_post_Tags]
 * Plugin URI:  https://github.com/lucassdantas/wpGetCurrentPostTags.git
 * Version:     1.0.0
 * Author:      R&D Marketing Digital
 * Author URI:  https://rdmarketing.com.br/
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if(!function_exists('add_action')){
    die;
}
function get_all_post_tags(){
	$post_tags = get_tags(array(
		'hide_empty' => false
	  ));

	if ( $post_tags ) {
		foreach( $post_tags as $tag ) {
			$tagUrl = get_term_link($tag->term_taxonomy_id);
			echo "<a href='$tagUrl'>" . $tag->name . '</a>'. ', '; 
		}
	}
}
add_shortcode('lc_show_all_post_Tags', 'get_all_post_tags');