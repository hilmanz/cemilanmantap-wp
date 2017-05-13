<?php 
/**
 * Cemilan Function
 *
 * @author 	Sandi Andrian <sandi@kodrindonesia.com>
 * @since  	May 3, 2017
 **/
 

 function get_meter_cemilan($category) 
 {

 	$args = array(
	  'post_type'     	=> 'cemilan',
	  'post_status'   	=> 'publish',
	  'posts_per_page' 	=> -1,
	  'meta_key' 		=> 'category',
	  'meta_value' 		=> $category
	);
	$query = new WP_Query( $args );
	return ($query->post_count / get_all_cemilan_posts()) * 100;
 }

 function get_all_cemilan_posts() 
 {
 	$all = wp_count_posts('cemilan');
 	return $all->publish;
 }