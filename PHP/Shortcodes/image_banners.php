<?php

//////////////////////////////////////////////////////////////////
// Image-Overlay Banners
//////////////////////////////////////////////////////////////////

// Last touch - 12/27/18 - Hannah Reilly

function banner_check( $atts ) {
	
	// Attributes - Defaults to 'listing'
	$a = shortcode_atts( array(
		'type' 	       => 'listing',
		'similar_att'  => 'false',
	), $atts );

	// VARS

	// Banner Values
	$sold = 'Sold';
	$construction = 'Coming Soon';
	$reserved = 'Reserved';
	$model = 'Model Home';
	$similar = 'Similar Home';
	
		if ( esc_attr($a['type']) == 'listing' ) {
			
			if ( get_field('sold') ) {
				$content .= '<div class="sold-banner">';
					$content .= $sold;
				$content .= '</div>';
			}
			if ( get_field('under_construction') ) {
				$content .= '<div class="construction-banner">';
					$content .= $construction;
				$content .= '</div>';
			}
			if ( get_field('reserved') ) {
				$content .= '<div class="reserved-banner">';
					$content .= $reserved;
				$content .= '</div>';
			}
			if ( get_field('model_home') ) {
				$content .= '<div class="model-home-banner">';
					$content .= $model;
				$content .= '</div>';
			}
			if ( esc_attr($a['similar_att']) == 'true' ) {
				if ( get_field('similar_home') ) {
					$content .= '<h4 class="similar-home">';
						$content .= $similar;
					$content .= '</h4>';
				}
			}
		}

	return $content;

}
add_shortcode( 'imageBanners', 'banner_check' );

?>