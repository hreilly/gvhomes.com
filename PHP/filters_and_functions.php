<?php

/*------------------------------------*\
	Added SVG Support
\*------------------------------------*/

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }

add_action('upload_mimes', 'add_file_types_to_uploads');

/*------------------------------------*\
	Remove Post Status Labels
\*------------------------------------*/

function the_title_trim($title) {

    $title = attribute_escape($title);

    $findthese = array(
        '#Protected:#',
        '#Private:#'
    );

    $replacewith = array(
        '',
        ''
    );

    $title = preg_replace($findthese, $replacewith, $title);
    return $title;
    }

add_filter('the_title', 'the_title_trim');

/*------------------------------------*\
	ACF Default Price Value
\*------------------------------------*/

function my_acf_clean_price( $post_id ) {

    $price = get_field('price');
    $clean_price = preg_replace('/[^a-zA-Z0-9-_\.]/','', $price);
    update_field('clean_price', $clean_price);

}

// Update field on post save
add_action( 'acf/save_post', 'my_acf_clean_price', 10, 3 );

// Update field on ACP column edit
add_action( 'updated_post_meta', 'my_acf_clean_price', 10, 3 );

/*------------------------------------*\
	ACF Clean Sq. Ft.
\*------------------------------------*/

function my_acf_clean_sqft( $post_id ) {

    $sqft = get_field('square_footage');
    $clean_sqft = preg_replace('/[^a-zA-Z0-9-_\.]/','', $sqft);
    update_field('clean_sqft', $clean_sqft);

}

// Update field on post save
add_action( 'acf/save_post', 'my_acf_clean_sqft', 10, 3 );

/*------------------------------------*\
	ACF Google Maps API Key
\*------------------------------------*/
  
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'Insert key here';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');