<?php

// Enqueue Scrips and styles
function increase_custom_enqueue_wp() {
wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri().'/includes/scripts/bootstrap/dist/js/bootstrap.bundle.min.js', array( 'jquery'), '1.0.0', true );
wp_enqueue_script( 'increase', get_stylesheet_directory_uri().'/assets/js/increase.js', array( 'jquery'), filemtime(get_stylesheet_directory().'/assets/js/increase.js'), true );
wp_enqueue_script( 'slick', get_stylesheet_directory_uri().'/includes/scripts/slick/slick.min.js', array( 'jquery'), '1.0.0', true );
wp_enqueue_script( 'tippy', get_stylesheet_directory_uri().'/includes/scripts/tippy.all.min.js', array( 'jquery'), '1.0.0', true );
wp_enqueue_script( 'counterup', get_stylesheet_directory_uri().'/includes/scripts/Counter-Up/counterup.min.js', array( 'jquery'/*, 'waypoints'*/), '1.0.0', true );
wp_enqueue_script( 'lazy', get_stylesheet_directory_uri().'/includes/scripts/jquery.lazy/jquery.lazy.min.js', array( 'jquery'), '1.0.0', false );

wp_enqueue_script( 'validate-js', get_stylesheet_directory_uri().'/includes/scripts/validate-js.js', array( 'jquery'), '1.0.0', false );

// wp_enqueue_script( 'lazy-jquery', get_stylesheet_directory_uri().'/includes/scripts/jquery.lazyload-any.js', array( 'jquery'), '1.0.0', false );

wp_enqueue_script( 'imagemapper_script', get_stylesheet_directory_uri().'/includes/scripts/imagemap/imagemapper_script.js', array( 'jquery'), '1.0.0', true );
wp_enqueue_script( 'imagemapster', get_stylesheet_directory_uri().'/includes/scripts/imagemap/jquery.imagemapster.min.js', array( 'jquery'), '1.0.0', true );
wp_enqueue_script( 'rwdImageMaps', get_stylesheet_directory_uri().'/includes/scripts/imagemap/jquery.rwdImageMaps.min.js', array( 'jquery'), '1.0.0', true );
wp_localize_script('imagemapper_script', 'imgmap', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'pulseOption' => 'first_time',
    'admin_logged' => current_user_can('edit_posts'),
    //'alt_dialog' => get_option('imgmap-alt-dialog')
)
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/includes/scripts/bootstrap/scss/bootstrap.css', array(), filemtime(get_stylesheet_directory().'/includes/scripts/bootstrap/scss/bootstrap.css') );
wp_enqueue_style( 'increaseicons-font', get_stylesheet_directory_uri().'/assets/fonts/increaseicons/style.css', '', filemtime( get_stylesheet_directory() . '/assets/fonts/increaseicons/style.css') );
wp_enqueue_style( 'slick', get_stylesheet_directory_uri().'/includes/scripts/slick/slick.css', '', filemtime( get_stylesheet_directory() . '/includes/scripts/slick/slick.css') );
wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri().'/includes/scripts/slick/slick-theme.css', '', filemtime( get_stylesheet_directory() . '/includes/scripts/slick/slick-theme.css') );
wp_enqueue_style( 'animatecss', get_stylesheet_directory_uri().'/includes/scripts/animatecss/animate.css', '', filemtime( get_stylesheet_directory() . '/includes/scripts/animatecss/animate.css') );

wp_enqueue_style( 'style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/assets/css/main.css', array('style'), filemtime( get_stylesheet_directory() . '/assets/css/main.css') );
wp_enqueue_style( 'responsive', get_stylesheet_directory_uri().'/assets/css/responsive.css', array('main'), filemtime( get_stylesheet_directory() . '/assets/css/responsive.css') );

wp_enqueue_style( 'increase-shortcodes', get_stylesheet_directory_uri().'/assets/css/shortcodes.css', array('responsive'), filemtime( get_stylesheet_directory() . '/assets/css/shortcodes.css') );



}

add_action( 'wp_enqueue_scripts', 'increase_custom_enqueue_wp' );

function increase_custom_enqueue_admin() {
    wp_enqueue_style( 'admin', get_stylesheet_directory_uri().'/assets/css/admin.css', false, filemtime( get_stylesheet_directory() . '/assets/css/admin.css') );
}

add_action( 'admin_enqueue_scripts', 'increase_custom_enqueue_admin' );




include_once wp_normalize_path( get_template_directory() . '/includes/functions/theme-setup.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/acf.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/create-posttype.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/create-taxonomy.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/wp-bootstrap-navwalker.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/imagemap.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/shortcodes.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/class-tgm-plugin-activation.php' );


function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



/* filtrare */
function filter_args_generate() {

    $tax_count = 0;
    // for taxonomies / categories



    if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max']  ){
        $args['meta_query'] = array( 'relation'=>'AND' );
    }

    // if both minimum price and maximum price are specified we will use BETWEEN comparison
    if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
        $args['meta_query'][] = array(
            'key' => 'beneficiari',
            'value' => array( $_POST['price_min'], $_POST['price_max'] ),
            'type' => 'numeric',
            'compare' => 'between'
        );
    } else {
        // if only min price is set
        if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
        $args['meta_query'][] = array(
            'key' => 'beneficiari',
            'value' => $_POST['price_min'],
            'type' => 'numeric',
            'compare' => '>'
        );

        // if only max price is set
        if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
        $args['meta_query'][] = array(
            'key' => 'beneficiari',
            'value' => $_POST['price_max'],
            'type' => 'numeric',
            'compare' => '<'
        );
    }


    //create querry
    if( isset( $_POST['date_min'] ) && $_POST['date_min'] || isset( $_POST['date_max'] ) && $_POST['date_max']  ){
        $args['meta_query'] = array( 'relation'=>'AND' );
    }



    // if both minimum date and maximum date are specified we will use BETWEEN comparison
    if( isset( $_POST['date_min'] ) && $_POST['date_min'] && isset( $_POST['date_max'] ) && $_POST['date_max'] ) {
        $args['meta_query'][] = array(
            'key' => 'date_min','date_max',
            'value' => array( $_POST['date_min'], $_POST['date_max'] ),
            'type' => 'date',
            'compare' => 'between'
        );
    } else {
        // if only min date is set
        if( isset( $_POST['date_min'] ) && $_POST['date_min'] )
        $args['meta_query'][] = array(
            'key' => 'date_min','date_max',
            'value' => $_POST['date_min'],
            'type' => 'date',
            'compare' => '>'
        );

        // if only max date is set
        if( isset( $_POST['date_max'] ) && $_POST['date_max'] )
        $args['meta_query'][] = array(
            'key' => 'date_min','date_max',
            'value' => $_POST['date_max'],
            'type' => 'date',
            'compare' => '<'
        );
    }









    if( isset( $_POST['audienta'] ) )
    {
        $args['tax_query'][] = array(

            'taxonomy' => 'audienta_tintita',
            'field' => 'slug',
            'terms' => $_POST['audienta'],

            //'compare' => 'LIKE'

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['audienta-2'] ) )
    {
        $args['tax_query'][] = array(

            'taxonomy' => 'audienta_tintita-2',
            'field' => 'slug',
            'terms' => $_POST['audienta-2'],
            'compare' => 'LIKE'

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['acoperire'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'acoperire_sector',
            'field' => 'slug',
            'terms' => $_POST['acoperire'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['acoperire-2'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'acoperire_sector-2',
            'field' => 'slug',
            'terms' => $_POST['acoperire-2'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['anvergura'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'anvergura',
            'field' => 'slug',
            'terms' => $_POST['anvergura'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['anvergura-2'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'anvergura-2',
            'field' => 'slug',
            'terms' => $_POST['anvergura-2'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['instrumentul'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'instrumentul',
            'field' => 'slug',
            'terms' => $_POST['instrumentul'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['instrumentul-2'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'instrumentul-2',
            'field' => 'slug',
            'terms' => $_POST['instrumentul-2'],
            //'compare' => '='

        );
        $tax_count ++;
    }
    // for taxonomies / categories
    if( isset( $_POST['resurse'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'resurse',
            'field' => 'slug',
            'terms' => $_POST['resurse'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['resurse-2'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'resurse-2',
            'field' => 'slug',
            'terms' => $_POST['resurse-2'],
            //'compare' => '='

        );
        $tax_count ++;
    }


    // for taxonomies / categories
    if( isset( $_POST['institutia'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'institutia',
            'field' => 'slug',
            'terms' => $_POST['institutia'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    // for taxonomies / categories
    if( isset( $_POST['institutia-2'] ) )
    {
        $args['tax_query'][] =
        array(
            'taxonomy' => 'institutia-2',
            'field' => 'slug',
            'terms' => $_POST['institutia-2'],
            //'compare' => '='

        );
        $tax_count ++;
    }

    if ($tax_count > 0){

        // if( isset( $_POST['audienta'] ) || isset( $_POST['acoperire'] ) || isset( $_POST['anvergura'] )  || isset( $_POST['instrumentul'] )  || isset( $_POST['resurse'] )  || isset( $_POST['institutia'] ) )
        $args['tax_query']['relation'] = 'AND'; // AND means that all conditions of meta_query should be true

    }
    return $args;


}

add_action('wp_ajax_filter_autoritati', 'increase_filter_autoritati'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_autoritati', 'increase_filter_autoritati');
function increase_filter_autoritati(){

    $args_autoritati = filter_args_generate();

    $args_autoritati['tax_query'][] =
    array(
        'taxonomy' => 'taburi',
        'field' => 'id',
        'terms' => 49,
        'post_status'    => 'publish',
    );


    $query_autoritati = new WP_Query( $args_autoritati );

    if( $query_autoritati->have_posts() ) :

        // $curate_audienta = get_term_by('slug', $_POST['audienta'], 'audienta_tintita' );
        // $curate_name_audienta = $curate_audienta->name;
        // $curate_acoperire = get_term_by('slug', $_POST['acoperire'], 'acoperire_sector' );
        // $curate_name_acoperire = $curate_acoperire->name;
        // $curate_anvergura = get_term_by('slug', $_POST['anvergura'], 'anvergura' );
        // $curate_name_anvergura = $curate_anvergura->name;
        // $curate_instrumentul = get_term_by('slug', $_POST['instrumentul'], 'instrumentul' );
        // $curate_name_instrumentul = $curate_instrumentul->name;
        // $curate_resurse = get_term_by('slug', $_POST['resurse'], 'resurse' );
        // $curate_name_resurse = $curate_resurse->name;
        // $curate_institutia = get_term_by('slug', $_POST['institutia'], 'institutia' );
        // $curate_name_institutia = $curate_institutia->name;
        //


        // echo '
        // <div class="row border-blue-bottom pb-4 mb-4">
        // <div class="col-12">
        //
        // <div class="row">
        // <div class="col-4  d-block ">
        //
        //
        // </div>
        // </div>
        // </div>
        // </div>
        // ';



        // echo $_POST['acoperire'];
        // echo $_POST['anvergura'];
        // echo $_POST['instrumentul'];
        // echo $_POST['resurse'] ;
        // echo $_POST['institutia'] ;

        //     echo '<div class="row">';
        //     while( $query->have_posts() ): $query->the_post();
        //     echo '<div class="col-12 col-sm-4">';
        //
        //     //    get_template_part( 'template-parts/pagina', 'rezultate' );
        //
        //     echo '<a style="text-decoration:none;" href="'.get_permalink( $id ).'">';
        //     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        //     echo '<div class="rounded-bottom rounded-top"
        //     style="background: url( '. $image[0] .') no-repeat center center ;
        //     height: 215px;
        //     width: auto;
        //     -webkit-background-size: cover;
        //     -moz-background-size: cover;
        //     -o-background-size: cover;
        //     background-size: cover;
        //         "></div>';
        //     echo '<div class="my-3 pb-5 h6">';
        //     echo '<div class="small mb-3">';
        //     $post_date = get_the_date( ' j F Y' ); echo $post_date;
        //     echo '</div>';
        //     echo '<h4 class="text-danger mb-3">' . $query->post->post_title . '</h4>';
        //     echo '</a>';
        //     $my_excerpt = get_the_excerpt();
        //     echo $my_excerpt; // Outputs the processed value to the page
        //     echo ' </div>';
        //     echo ' </div>';
        //
        // endwhile;
        // wp_reset_postdata();



        echo '<div class="row">';
        while( $query_autoritati->have_posts() ): $query_autoritati->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}



add_action('wp_ajax_filter_mediuprivat', 'increase_filter_mediuprivat'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_mediuprivat', 'increase_filter_mediuprivat');
function increase_filter_mediuprivat(){

    $args_mediuprivat = filter_args_generate();


    $args_mediuprivat['tax_query'][] =
    array(
        'taxonomy' => 'taburi',
        'field' => 'id',
        'terms' => 50,
        'post_status'    => 'publish',

    );




    $query_mediuprivat = new WP_Query( $args_mediuprivat );

    if( $query_mediuprivat->have_posts() ) :
        echo '<div class="row">';

        while( $query_mediuprivat->have_posts() ): $query_mediuprivat->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}


add_action('wp_ajax_filter_ong', 'increase_filter_ong'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_ong', 'increase_filter_ong');
function increase_filter_ong(){

    $args_ong = filter_args_generate();



    $args_ong['tax_query'][] =
    array(
        'taxonomy' => 'taburi',
        'field' => 'id',
        'terms' => 51,
        'post_status'    => 'publish',
    );

    $query_ong = new WP_Query( $args_ong );

    if( $query_ong->have_posts() ) :
        echo '<div class="row">';
        while( $query_ong->have_posts() ): $query_ong->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}



add_action('wp_ajax_filter_toate', 'increase_filter_toate'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_toate', 'increase_filter_toate');
function increase_filter_toate(){

    $args_toate = filter_args_generate();

    // $array1 = array(
    //         'taxonomy' => 'taburi',
    //         'field' => 'id',
    //         'terms' => 51,
    //
    //     );
    // $array2 = array(
    //             'taxonomy' => 'taburi',
    //             'field' => 'id',
    //             'terms' => 49,
    //
    //         );
    // $array3 = array(
    //     'taxonomy' => 'taburi',
    //     'field' => 'id',
    //     'terms' => 50,
    //
    // );
    //
    // $result = array_merge($array1, $array2, $array3);

    $args_toate['tax_query'][] = $result;

    $args_toate['tax_query'][] =
    array(
        'taxonomy' => 'taburi',
        'field' => 'id',
        'terms' => [49,50,51],

    );
    // array(
    //         'taxonomy' => 'taburi',
    //         'field' => 'id',
    //         'terms' => 49,
    //
    //     );
    // array(
    //     'taxonomy' => 'taburi',
    //     'field' => 'id',
    //     'terms' => 50,
    //
    // );


    // $args_toate = array(
    //     'tax_query' => array(
    //         'relation' => 'OR',
    //         array(
    //             'taxonomy' => 'taburi',
    //             'field' => 'id',
    //             'terms' => 51
    //         ),
    //         array(
    //             'taxonomy' => 'taburi',
    //             'field' => 'id',
    //             'terms' => 50
    //         ),
    //         array(
    //             'taxonomy' => 'taburi',
    //             'field' => 'id',
    //             'terms' => 49
    //         )
    //     )
    // );



    $query_toate = new WP_Query( $args_toate );

    if( $query_toate->have_posts() ) :
        echo '<div class="row">';
        while( $query_toate->have_posts() ): $query_toate->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}



add_action('wp_ajax_filter_toate2', 'increase_filter_toate2'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_toate2', 'increase_filter_toate2');
function increase_filter_toate2(){

    $args_toate2 = filter_args_generate();



    $args_toate2['tax_query'][] = $result;

    $args_toate2['tax_query'][] =
    array(
        'taxonomy' => 'taburi-2',
        'field' => 'id',
        'terms' => [84,85,86],

    );




    $query_toate2 = new WP_Query( $args_toate2 );

    if( $query_toate2->have_posts() ) :
        echo '<div class="row">';
        while( $query_toate2->have_posts() ): $query_toate2->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}




add_action('wp_ajax_filter_autoritati2', 'increase_filter_autoritati2'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_autoritati2', 'increase_filter_autoritati2');
function increase_filter_autoritati2(){

    $args_autoritati2 = filter_args_generate();

    $args_autoritati2['tax_query'][] =
    array(
        'taxonomy' => 'taburi-2',
        'field' => 'id',
        'terms' => 84,
         'post_status'    => 'publish',
    );


    $query_autoritati2 = new WP_Query( $args_autoritati2 );

    if( $query_autoritati2->have_posts() ) :



        echo '<div class="row">';
        while( $query_autoritati2->have_posts() ): $query_autoritati2->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}



add_action('wp_ajax_filter_mediuprivat2', 'increase_filter_mediuprivat2'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_mediuprivat2', 'increase_filter_mediuprivat2');
function increase_filter_mediuprivat2(){

    $args_mediuprivat2 = filter_args_generate();


    $args_mediuprivat2['tax_query'][] =
    array(
        'taxonomy' => 'taburi-2',
        'field' => 'id',
        'terms' => 85,
         'post_status'    => 'publish',
    );



    $query_mediuprivat2 = new WP_Query( $args_mediuprivat2 );

    if( $query_mediuprivat2->have_posts() ) :
        echo '<div class="row">';
        while( $query_mediuprivat2->have_posts() ): $query_mediuprivat2->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}


add_action('wp_ajax_filter_ong2', 'increase_filter_ong2'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_filter_ong2', 'increase_filter_ong2');
function increase_filter_ong2(){

    $args_ong2 = filter_args_generate();



    $args_ong2['tax_query'][] =
    array(
        'taxonomy' => 'taburi-2',
        'field' => 'id',
        'terms' => 86,
        'post_status'    => 'publish',
    );

    $query_ong2 = new WP_Query( $args_ong2 );

    if( $query_ong2->have_posts() ) :
        echo '<div class="row">';
        while( $query_ong2->have_posts() ): $query_ong2->the_post();
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( get_the_ID() ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
        echo '<div class="rounded-bottom rounded-top"
        style="background: url( '. $image[0] .') no-repeat center center ;
        height: 215px;
        width: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        "></div>';
        echo '<div class="my-3 pb-5 h6">';
        echo '<div class="small mb-3">';
        $post_date = get_the_date( ' j F Y' ); echo $post_date;
        echo '</div>';
        echo '<h4 class="text-danger mb-3">' . get_the_title( get_the_ID() ) . '</h4>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';

    endwhile;
    wp_reset_postdata();

    else :
        echo 'No posts found';
    endif;
    echo ' </div>';

    die();
}






?>
