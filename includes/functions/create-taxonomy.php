<?php
// Create Taxonomy
function increase_create_taxonomy() {

    register_taxonomy( 'increase_buildings', array( 'increase_apartments' ),
    array(
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'            => array(
            'slug' => __( 'buildings' , 'increase' ),
        ),
        'labels'            => array(
            'name'              => _x( 'Buildings', 'taxonomy general name' ),
            'singular_name'     => _x( 'Building', 'taxonomy singular name' ),
        ),
    )

);

register_taxonomy( 'increase_rooms', array( 'increase_apartments' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'            => array(
        'slug' => __( 'rooms' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Rooms', 'taxonomy general name' ),
        'singular_name'     => _x( 'Room', 'taxonomy singular name' ),
    ),
)

);

register_taxonomy( 'audienta_tintita', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'audienta_tintita' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Audienta Tintita', 'taxonomy general name' ),
        'singular_name'     => _x( 'Audienta Tintita', 'taxonomy singular name' ),
    ),
)

);


register_taxonomy( 'acoperire_sector', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'acoperire_sector' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Acoperire Sector', 'taxonomy general name' ),
        'singular_name'     => _x( 'Acoperire Sector', 'taxonomy singular name' ),
    ),
)

);


register_taxonomy( 'anvergura', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'anvergura' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Anvergura', 'taxonomy general name' ),
        'singular_name'     => _x( 'Anvergura', 'taxonomy singular name' ),
    ),
)

);



register_taxonomy( 'instrumentul', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'instrumentul' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Instrumentul', 'taxonomy general name' ),
        'singular_name'     => _x( 'Instrumentul', 'taxonomy singular name' ),
    ),
)

);


register_taxonomy( 'resurse', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'resurse' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Comentarii, numele cursului, resursele de informatii ', 'taxonomy general name' ),
        'singular_name'     => _x( 'Comentarii, numele cursului, resursele de informatii ', 'taxonomy singular name' ),
    ),
)

);

register_taxonomy( 'institutia', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'institutia' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Institutia sau organizatia', 'taxonomy general name' ),
        'singular_name'     => _x( 'Institutia sau organizatia', 'taxonomy singular name' ),
    ),
)

);


register_taxonomy( 'taburi', array( 'act_implementate' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'taburi' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Taburi', 'taxonomy general name' ),
        'singular_name'     => _x( 'Taburi', 'taxonomy singular name' ),
    ),
)

);

//  propuneri viitoare


register_taxonomy( 'audienta_tintita-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'audienta_tintita-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Audienta Tintita', 'taxonomy general name' ),
        'singular_name'     => _x( 'Audienta Tintita', 'taxonomy singular name' ),
    ),
)

);




register_taxonomy( 'acoperire_sector-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'acoperire_sector-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Acoperire Sector', 'taxonomy general name' ),
        'singular_name'     => _x( 'Acoperire Sector', 'taxonomy singular name' ),
    ),
)

);


register_taxonomy( 'anvergura-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'anvergura-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Anvergura', 'taxonomy general name' ),
        'singular_name'     => _x( 'Anvergura', 'taxonomy singular name' ),
    ),
)

);



register_taxonomy( 'instrumentul-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'instrumentul-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Instrumentul', 'taxonomy general name' ),
        'singular_name'     => _x( 'Instrumentul', 'taxonomy singular name' ),
    ),
)

);


register_taxonomy( 'resurse-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'resurse-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Comentarii, numele cursului, resursele de informatii ', 'taxonomy general name' ),
        'singular_name'     => _x( 'Comentarii, numele cursului, resursele de informatii ', 'taxonomy singular name' ),
    ),
)

);

register_taxonomy( 'institutia-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'institutia-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Institutia sau organizatia', 'taxonomy general name' ),
        'singular_name'     => _x( 'Institutia sau organizatia', 'taxonomy singular name' ),
    ),
)

);




register_taxonomy( 'taburi-2', array( 'act_propuneri' ),
array(
    'hierarchical'      => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => false, // disable taxonomy archive page
    'rewrite'            => array(
        'slug' => __( 'taburi-2' , 'increase' ),
    ),
    'labels'            => array(
        'name'              => _x( 'Taburi', 'taxonomy general name' ),
        'singular_name'     => _x( 'Taburi', 'taxonomy singular name' ),
    ),
)

);


}

add_action( 'init', 'increase_create_taxonomy', 0 );
