<?php

// Create Post Type
add_action( 'init', 'increase_create_posttype' );
function increase_create_posttype() {
	register_post_type( 'increase_apartments',
		array(
			'labels' => array(
				'name' => __( 'Apartments' ),
				'singular_name' => __( 'Apartment' , 'increase' )
			),
			'public' 			 => true,
			'has_archive'        => false,
			'rewrite'            => array(
				'slug' => __( 'apartment' , 'increase' ),
			),
			'query_var'          => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions' )
		)
	);



}
