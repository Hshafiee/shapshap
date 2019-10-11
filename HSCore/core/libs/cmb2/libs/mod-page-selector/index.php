<?php

/**
 * 
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 * 
 */

function mod_get_pages_cmb2( $query_args ) {

	$args = wp_parse_args( $query_args, array(
		'post_type'   => 'page',
		'numberposts' => -1,
	) );

	$posts = get_posts( $args );

	$post_options = array();
	if ( $posts ) {
		foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
		}
	}

	return $post_options;
}


function mod_get_page() {
	return mod_get_pages_cmb2( array( 'post_type' => 'page', ) );
}

?>