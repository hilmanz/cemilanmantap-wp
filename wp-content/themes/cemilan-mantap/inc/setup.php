<?php
/**
 * Add Custom Image Size
 **/
add_image_size('homepage-video-spotlight-thumb', 585, 329, true);
add_image_size('homepage-video-small-thumb', 293, 164, true);

add_image_size('cemilan-thumb', 260, 155, true);
add_image_size('cemilan-single-feature', 848, 436, true);
add_image_size('cemilan-single-big', 800, 400, array('center', 'center'));
add_image_size('cemilan-single-small', 210, 132, true);
add_image_size('banner-thumb', 263, 246, true);
/**
 * Fix Maps on ACF
 **/
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyCfDRm8SR3qOx2F94NH7vZZw65K_A81fNs');
}

add_action('acf/init', 'my_acf_init');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function pp_excerpt_length( $length ) {
    return 20;
}
add_filter('excerpt_length', 'pp_excerpt_length', 999);

function pp_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'pp_excerpt_more');

/**
 * Register Session
 **/
function cm_register_session() {
  if(!session_id()) {
    session_start();
  }
}
add_action('init', 'cm_register_session');