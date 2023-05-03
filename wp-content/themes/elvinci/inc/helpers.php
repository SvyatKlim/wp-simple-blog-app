<?php

/*
 * Debug output
 * $type – can be dump or print (var_dump and print_r respectively)
 */
function debug_dump( $data, $die = false, $dump = true) {
	echo "<pre>";
	if ( $dump ) var_dump($data);
	else print_r($data);
	echo "</pre>";
	if($die) wp_die();
}

function get_custom_logo_url()
{
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image[0];
}


// build webP pictures

function build_webp_path ($url) {
    if (str_contains($url,'wp-content/themes')) {
        $new_url = str_replace('wp-content/themes',   'wp-content/webp-express/webp-images/themes', $url);
        return $new_url . '.webp';
    }else{
        $new_url = str_replace('wp-content/uploads',   'wp-content/webp-express/webp-images/uploads', $url);
        return $new_url . '.webp';
    }
}

function absolute_webp_path ($url) {
    $split_url = parse_url($url);
    return ABSPATH . ltrim($split_url['path'], '/');
}

function get_image_alt($url){
    $fileParts = pathinfo($url);
    return  $fileParts ['filename'];
}

function webp_picture ($url, $alt = '', $class = 'd-flex') {
    $webp_url = build_webp_path ($url);
    $absolute_url = absolute_webp_path($webp_url);
    $id = attachment_url_to_postid($url);
    $image_attributes = wp_get_attachment_image_src( $id, 'full');
    $alt = strlen($alt) > 0? $alt: get_image_alt($url);

    $result =  '<picture class="' . $class .'">';
    if(file_exists($absolute_url)){
        $result .= '<source srcset="'. $webp_url . '" type="image/webp">';
    }

    $result .= '<img src="' . $url .'" alt="' .$alt . '"  width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '"></picture>';

    echo $result;
}