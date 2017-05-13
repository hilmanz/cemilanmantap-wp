<?php

/**
 * Get YouTube ID
 **/
function get_yt_id($video) {
	parse_str(parse_url($video, PHP_URL_QUERY ), $youtube);
	return $youtube['v'];
}

/**
 * Get City from Lat Long
 **/
function get_city_from_coords($loc) {
	if(!empty($loc)) {
		$url            = "http://maps.googleapis.com/maps/api/geocode/json?latlng={$loc['lat']},{$loc['lng']}&sensor=false";
    	$get_map        = json_decode(file_get_contents($url));
    	$region = $get_map->results[0]->address_components[5]->long_name;
    	$city = str_replace('Kota','',$get_map->results[0]->address_components[6]->long_name);
    	return '<span class="glyphicon glyphicon-map-marker"></span>
    			<span class="color-light-grey">'.$region.', ' .$city.'</span>';
	}
	
    return '';
}

/**
 * Get Current URL
 **/
function get_current_url() {
	global $wp;
	return add_query_arg($wp->query_string, '', home_url($wp->request));
}

/**
 * Get Featured Image from Gallery
 *
 * @author 		Sandi Andrian <sandi@kodrindonesia.com>
 * @since 		Apr 16, 2017
 **/
function get_featured_image_from_gallery($id) {
	$gallery = get_field('gallery', $id);
	if($gallery && count($gallery) > 0) {
		return $gallery[0]['url'];
	}

	return '';
	// var_dump($gallery); exit;
}

/**
 * featured image cemilan
 * display featured image for cemilan grid
 * @param  $id
 * @return html <img> 
 */
function featured_image_cemilan( $id, $alt='' ){
	$img = get_field('gallery', $id );
	return '<img src="'. $img[0]['sizes']['cemilan-thumb'] .'" alt="'.$alt.'">';
}