<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="row">

<?php if( get_field('article_gallery') ) { ?>

        <div class="col-12 col-lg-6 p-0">

            <?php

            $images = get_field('article_gallery');

            if( $images ): ?>
            <div class="dynamic-sticky increase-gallery increase-gallery-slick-slider increase-full-left">
                <?php foreach( $images as $image ): ?>
                    <!-- <a href="<?php //echo $image['url']; ?>"> -->
                    <div class="increase-gallery-item thumb-bg" style="background-image:url(<?php echo $image['url']; ?>)">
                        <div class="dynamic-padding" style="padding-top: 80%" class="position-relative">
                            <div style="font-size:18px; bottom:0; right:0; background:white;     padding:25px 35px 45px 35px; " class="pagingInfo position-absolute">
                            </div>
                            <a style="
                            position: absolute;
                            right: 22px;
                            bottom: 8px;"
                            class="fancybox" href="<?php echo  $image['url']; ?>" data-fancybox="page-template-gallery">
                            <img width="30" src="/wp-content/uploads/2019/07/large.svg">
                        </a>
                    </div>
                </div>
                <!-- </a> -->
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <script>
    jQuery(document).ready(function($){
        var $status = $('.pagingInfo');
        var $slickElement = $('.increase-gallery');
        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            //$status.text( i + '</div>'  + '/' + slick.slideCount);
            $status.text( i );
            $status.append( '<br />' );
            $status.append( '    <span class="line-trough">' );
            $status.append( '<div class="text-secondary">' + slick.slideCount + '</div>' );
            $status.append( '    </span>' );
            $status.append( '<br />' );
        });

        var slick_slider = jQuery('.increase-gallery')
        .slick({
            dots: false,
            infinite: true,
            speed: 200,
            accessibility: false,
            arrows: true,
            appendDots: false,
            autoplay: false,
            lazyLoad: 'ondemand',
            pauseOnHover: false,
            pauseOnFocus: false,
            autoplaySpeed: 7000,
            touchMove: true,
            swipe: true,
            swipeToSlide: true
        });

        slick_slider.on('afterChange', function(event, slick, currentSlide, nextSlide, lazyInstance){
            jQuery('.lazy').Lazy();
        });

        var windowH = window.innerHeight;
        var headerH = document.getElementById("masthead").clientHeight;
        // var headerH = jQuery("#masthead").scrollHeight();
        console.log("window height e", windowH);
        console.log("masthead e", headerH);
        var dynamicPx = windowH - headerH ;
        console.log(dynamicPx);
        jQuery(".dynamic-padding").css("padding-top", dynamicPx);
        jQuery(".dynamic-content-margin").css("margin-top", headerH);
        jQuery(".dynamic-sticky").css("top", headerH);

    });
    </script>
</div>

<?php } else { ?>
    <div style="margin-top:100px;" class="col-12">


    </div>

<?php } ?>

<div  class="col-12 col-lg-6 left-desktop-85-padding">
    <header class="entry-header">
        <div class="d-inline-flex  mr-3 my-3"> <p> <?php echo do_shortcode('[addtoany]') ?> </p> </div> <div class="d-inline-flex m-3"> <p> <?php echo do_shortcode('[print-me target=".entry-content"]') ?> </p> </div>
        <div class="d-inline-flex m-3">

            <?php
            if (function_exists('zeno_font_resizer_place')) {
                zeno_font_resizer_place();
            }
            ?>
        </div>
        <p class="h5 font-semibold attach-here py-3"><?php echo get_the_date( '  j F Y' ) ?></p>
        <h1 class="display-2 text-primary font-weight-bold pb-3">
            <?php the_title(); ?>
        </h1>
        <div class="row">
            <div class="col-12 col-md-4">
                <hr style="background:#707070;">
            </div>
            <?php /*
            <div class="col-12 col-md-8  d-flex align-items-end">
                <p class="h6 text-dark semibold hashtag-spacing"><?php the_field('article_hashtag'); ?></p>
            </div> */ ?>
        </div>
    </header>
    <div id="resize-me" class="entry-content ">
        <?php if( get_field('article_first_paragraph') ) { ?>
        <p class="semibold text-dark pb-4" ><?php the_field('article_first_paragraph'); ?> </p>
        <?php } ?>
        <?php
        /* translators: %s: Name of current post */

        the_content( sprintf(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
            get_the_title()
            ) );

            wp_link_pages( array(
                'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ) );
            ?>
        </div>

<?php if (get_field('article_gallery')){ ?>


        <div class="font-italic my-5">
            <p class="h3 font-weight-bold">Categorii: </p>
            <?php


                if ( is_singular( 'act_implementate' ) ) {
                        $term_obj_list = wp_get_post_terms( $post->ID,  array(
                                'audienta_tintita'

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Grup țintă: </strong>';
                        // echo '<a href="/activitati-implementate/">';
                        echo  $terms_string;
                        // echo '</a>';
                        echo "</div>";



                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'acoperire_sector',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Acoperire sector: </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'anvergura',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Acoperire teritorială: </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'instrumentul',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Instrumentul sau activitatea prin care se implementează inițiativa </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'resurse',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Anvergura: </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'institutia',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Instituția sau organizația </strong>';
                        echo  $terms_string;
                        echo "</div>";


                }





                if ( is_singular( 'act_propuneri' ) ) {
                        $term_obj_list = wp_get_post_terms( $post->ID,  array(
                                'audienta_tintita-2'

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Grup țintă: </strong>';
                        // echo '<a href="/activitati-implementate/">';
                        echo  $terms_string;
                        // echo '</a>';
                        echo "</div>";



                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'acoperire_sector-2',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Acoperire sector: </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'anvergura-2',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Acoperire teritorială: </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'instrumentul-2',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Instrumentul sau activitatea prin care se implementează inițiativa </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'resurse-2',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Anvergura: </strong>';
                        echo  $terms_string;
                        echo "</div>";

                        $term_obj_list = wp_get_post_terms( $post->ID,  array(

                                'institutia-2',

                            ) );
                        $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                        echo '<div><strong> Instituția sau organizația </strong>';
                        echo  $terms_string;
                        echo "</div>";


                }


             ?>

        </div>

<?php } ?>


    <?php
            the_post_navigation( array(
                'prev_text' =>
                ' <span class="nav-title-left "><span class="nav-title-icon-wrapper">
                  </span>Citește articolul precedent</span>',
                'next_text' =>
                 '<span class="nav-title-right">Citește următorul articol<span class="nav-title-icon-wrapper"> </span></span>',
            ) );
    ?>

</div> <!-- col-6 -->
<?php if (!get_field('article_gallery')){ ?>
    <div style="margin-top:100px" class="font-italic col-12 col-lg-6">
        <p class="h3">Categorii:</p>
        <?php


            if ( is_singular( 'act_implementate' ) ) {
                    $term_obj_list = wp_get_post_terms( $post->ID,  array(
                            'audienta_tintita'

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Grup țintă: </strong>';
                    // echo '<a href="/activitati-implementate/">';
                    echo  $terms_string;
                    // echo '</a>';
                    echo "</div>";



                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'acoperire_sector',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Acoperire sector: </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'anvergura',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Acoperire teritorială: </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'instrumentul',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Instrumentul sau activitatea prin care se implementează inițiativa </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'resurse',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Anvergura: </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'institutia',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Instituția sau organizația </strong>';
                    echo  $terms_string;
                    echo "</div>";


            }





            if ( is_singular( 'act_propuneri' ) ) {
                    $term_obj_list = wp_get_post_terms( $post->ID,  array(
                            'audienta_tintita-2'

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Grup țintă: </strong>';
                    // echo '<a href="/activitati-implementate/">';
                    echo  $terms_string;
                    // echo '</a>';
                    echo "</div>";



                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'acoperire_sector-2',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Acoperire sector: </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'anvergura-2',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Acoperire teritorială: </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'instrumentul-2',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Instrumentul sau activitatea prin care se implementează inițiativa </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'resurse-2',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Anvergura: </strong>';
                    echo  $terms_string;
                    echo "</div>";

                    $term_obj_list = wp_get_post_terms( $post->ID,  array(

                            'institutia-2',

                        ) );
                    $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                    echo '<div><strong> Instituția sau organizația </strong>';
                    echo  $terms_string;
                    echo "</div>";


            }



         ?>
    </div>
<?php } ?>

</div> <!-- row -->





<style>
.dynamic-padding{
    position:relative;
}
.increase-gallery-item{
    cursor: e-resize;
}

</style>


<?php
/*
$term_obj_list_aud = wp_get_post_terms( $post->ID,  array(
    'audienta_tintita'

) );
$terms_string_aud = join(', ', wp_list_pluck($term_obj_list, 'slug'));
*/
 ?>
 <?php /*
<script type="text/javascript">
    sessionStorage.setItem("Grup țintă", <?php echo $terms_string_aud; ?>);
</script> */ ?>
</article>
