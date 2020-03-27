<?php
/**
* Header template.
*/

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <?php wp_head(); ?>

</head>
<?php if(wp_is_mobile()){$deviceType = 'touch-device';}else{$deviceType = 'not-touch-device';} ?>
<body <?php body_class( $deviceType ); ?>>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'increase' ); ?></a>

    <?php/* if ( has_nav_menu( 'top' ) ) : ?>
    <div class="navigation-top">
    <div class="wrap">
    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
    </div><!-- .wrap -->
    </div><!-- .navigation-top -->
    <?php endif; */?>

    <?php $navbar_text_color = esc_attr(get_field( 'increase_options_header_text_color' , 'options' )); ?>
    <header class="pt-2 pb-1 fixed-top header increase-header-<?php echo esc_attr(get_field( 'increase_options_header_text_color' , 'options' )); ?>" id="masthead" style="background-color: <?php echo esc_attr(get_field( 'increase_options_header_background_color' , 'options' )); ?>;">

        <nav class="padding-20 navbar navbar-expand-lg <?php if($navbar_text_color == 'light'){ echo 'navbar-light'; }else{ echo 'navbar-dark'; }; ?>">
            <a class="navbar-brand" href="<?php echo esc_url(get_bloginfo('url')); ?>">
                <?php $custom_logo_id = esc_attr(get_theme_mod( 'custom_logo' ));
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if(has_custom_logo()){ ?>
                    <img src="<?php echo esc_url( $logo[0] ); ?>" class="d-inline-block" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <style>
                    .header .navbar-brand img{
                        max-height: <?php // echo esc_attr(get_field( 'increase_options_header_logo_height' , 'options' )); ?>75px;
                    }

                    @media (max-width: 991px) {
                        .header .navbar-brand img{
                            max-height: <?php echo esc_attr(get_field( 'increase_options_header_logo_height_mobile' , 'options' )); ?>px
                        }
                    }
                    </style>
                <?php }else{ ?>
                    <?php echo esc_attr(get_bloginfo('name')); ?>
                <?php } ?>
            </a>
            <div class="d-lg-none">
                <?php if(!get_field('header_phone_numbers','options')){ ?>


                    <button class="btn <?php if($navbar_text_color == 'light'){ echo 'btn-outline-dark'; }else{ echo 'btn-light'; }; ?>" type="button" data-toggle="collapse" data-target="#header-phones" aria-controls="header-phones" aria-expanded="false" aria-label="Phone number">
                        <span class="icon-custom increaseicons-phone navbar-custom-icon"></span>
                    </button>



                <?php }else{ ?>
                    <a href="tel:<?php the_field('header_phone_number_full','options'); ?>" class="btn <?php if($navbar_text_color == 'light'){ echo 'btn-outline-dark'; }else{ echo 'btn-light'; }; ?>" aria-label="Phone number">
                        <span class="icon-custom increaseicons-phone navbar-custom-icon"></span>
                    </a>
                <?php } ?>
                <?php if ( has_nav_menu( 'header_menu' ) ) { ?>
                    <button class=" btn <?php if($navbar_text_color == 'light'){ echo 'btn-outline-dark'; }else{ echo 'btn-light'; }; ?>" type="button" data-toggle="collapse" data-target="#header-menu" aria-controls="header-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-custom increaseicons-burger navbar-custom-icon"></span>
                    </button>
                <?php } ?>
            </div>
            <div class="collapse navbar-collapse h6 justify-content-end mb-0" id="header-menu">
                <?php if ( has_nav_menu( 'header_menu' ) ) {
                    wp_nav_menu(
                        array(
                            'menu' => 'header_menu',
                            'theme_location' => 'header_menu',
                            'depth' => 2,
                            'container' => '',
                            'menu_class' => ' nav navbar-nav ml-md-auto',
                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                            'walker' => new WP_Bootstrap_Navwalker()
                        )
                    );
                } ?>


                <!-- <div style="margin-bottom: 6px;" class="d-flex d-lg-none menu-item menu-item-type-post_type nav-item justify-content-center">
                    <button class="px-4 py-1 btn rounded-snef bg-info text-light">
                        <img width="20px" src="/wp-content/uploads/2019/06/pdf-icon.svg"><span class="h6 text-light"> Descarca brosura </span>
                    </button>
                </div> -->



                <!-- <div class="d-flex d-lg-none position-relative  pb-2 justify-content-center">
                    <img style="filter: invert(53%) sepia(23%) saturate(798%) hue-rotate(308deg) brightness(85%) contrast(91%);" width="70px" src="/wp-content/uploads/2019/06/calendar-icon.svg">
                </div> -->

                <form role="search" method="get" class="d-flex d-lg-none justify-content-center search-form" action="<?php echo home_url( '/' ); ?>">

                    <div class="search-png">
                        <input type="submit" class="search-submit background-search"  value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
                    </div>

                </form>

            </div>

            <!-- <div style="margin-bottom: 6px;" class="d-none d-lg-flex menu-item menu-item-type-post_type nav-item ml-3">
                <button class="px-4 py-1 btn rounded-snef bg-info text-light mr-30">
                    <img width="20px" src="/wp-content/uploads/2019/06/pdf-icon.svg"><span class="h6 text-light"> Descarca brosura </span>
                </button>
            </div>

            <div class="d-none d-lg-flex position-relative border-right-abs pb-2">
                <img  style="filter: invert(53%) sepia(23%) saturate(798%) hue-rotate(308deg) brightness(85%) contrast(91%);" width="30px" src="/wp-content/uploads/2019/06/calendar-icon.svg">
            </div> -->


            <form style="width:130px; margin-left:-10px; margin-top: 2px;" role="search" method="get" class="d-none d-lg-block search-form" action="<?php echo home_url( '/' ); ?>">

                <div class="search-png p-0">
                    <input style="margin-right: 15px;" type="submit" class="search-submit cursor-pointer background-search"  value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
                </div>
                <label>
                    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                        <input style="width:50px;" type="search" class=" cursor-pointer search-field border-0 h6 text-secondary"
                        placeholder="<?php echo esc_attr_x( 'Caută', 'placeholder' ) ?>"
                        value="<?php echo get_search_query() ?>" name="s"
                        title="<?php echo esc_attr_x( 'Caută', 'label' ) ?>" />
                    </label>
                </form>

                <?php if(!get_field('header_phone_numbers','options')){ ?>
                    <div class="collapse w-100" id="header-phones">
                        <?php
                        if( have_rows('sale_agents', 'options') ){ ?>
                            <ul id="menu-head-phones" class="nav navbar-nav ml-md-auto">
                                <?php $i=1; while ( have_rows('sale_agents', 'options') ) : the_row(); ?>
                                    <li id="menu-phones-<?php echo $i; ?>" class="menu-item menu-item-type-post_type nav-item">
                                        <a class="nav-link" href="tel:<?php echo esc_attr(get_sub_field('sale_agent_full_phone', 'options')); ?>"><?php echo esc_attr(get_sub_field('sale_agent_show_phone', 'options')); ?> - <?php echo esc_attr(get_sub_field('sale_agent_name', 'options')); ?></a>
                                    </li>
                                    <?php $i++; endwhile; ?>
                                </ul>
                            <?php }	?>

                        </div>
                    <?php }	?>
                </nav>
                <div class="container p-0">
                </div>
            </header>


<div id="preloader" class="d-none d-sm-block">
    <img src="/wp-content/uploads/2019/07/Ripple-1s-200px.svg"/>
</div>


<script>
	jQuery(window).load(function($){
		setTimeout(function(){
	    	jQuery('#preloader').fadeOut('slow',function(){
	    		jQuery(this).remove();
	    	});
		}, 500);
	});
</script>

<style media="screen">

        #preloader{
            width: 100%;
            position: fixed;
            z-index: 999999;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            background-color: rgba(246, 246, 246, 1);
            text-align: center;
        }

        #preloader > img {
            position: fixed;
            top: 35%;
            left: 41%;
            padding: 30px;
            text-align: center;
        }

</style>

            <div id="content">
                <div class="container">
