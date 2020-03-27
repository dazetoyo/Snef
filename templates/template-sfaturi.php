<?php /* Template Name: Sfaturi Page */ ?>
<?php get_header(); ?>
</div>
<div class="container-fluid ">

    <div class="wrap">
        <div id="primary" class="content-area  <?php
        if(get_field('increase_page_remove_padding_top')){echo ' pt-0 ';}
        if(get_field('increase_page_remove_padding_bottom')){echo ' pb-0 ';}
        ?>">
        <main id="main" class="site-main" role="main">



            <!-- tab 1 -->
            <div class="row top-margin-sfaturi" >
                <div class="col-12 col-lg-6 p-0 ">
                    <div class="dynamic-sticky" style="
                    background-image: url('<?php echo get_the_post_thumbnail_url() ;?>');
                    height: 100vh;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover; ">

                </div>
            </div>
            <div id="resize-me" class="col-12 col-lg-6 p-0">

                <div class="pl-5 row no-gutters">
                    <div class="col-12 col-xl-9 pt-3">


                    <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'Menu 2',
                                'theme_location' => 'Menu 2',
                                'menu_class'  => 'menu-fix',
                                'depth' => 2,
                                'container' => '',
                                'menu_class' => ' nav navbar-nav ml-md-auto',
                                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                'walker' => new WP_Bootstrap_Navwalker()
                            )
                        );
                     ?>




                    </div>

                    <div class="col-12 col-xl-3">
                        <div class="d-inline-flex  mr-3 my-3"> <p> <?php echo do_shortcode('[addtoany]') ?> </p> </div>
                        <div class="d-inline-flex m-3"> <p> <?php echo do_shortcode('[print-me target=".entry-content"]') ?> </p> </div>
                        <div class="d-inline-flex m-3">

                            <?php
                            if (function_exists('zeno_font_resizer_place')) {
                                zeno_font_resizer_place();
                            }
                            ?>
                        </div>
                    </div>

                </div>


                <!-- tab1 -->
                <?php if( get_field('tab1') ) { ?>
                <div class="row no-gutters pl-5">


                    <!-- VS content -->

                    <?php  if (have_posts()) { ?>

                        <?php while ( have_posts() ) :  the_post();	 ?>


                            <?php get_template_part( 'template-parts/page/content', 'page' ); ?>

                        <?php endwhile; ?>

                    <?php };  ?>

                    <!-- end vs content -->



                    <div class="col-12 ">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab1-text'); ?></div>
                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_audienta" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_audienta" style="display: block;">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_audienta").click(function () {
                            $(".tab1").slideToggle();
                            $("#fold_p_audienta").fadeOut(function () {
                                $("#fold_p_audienta").text(($("#fold_p_audienta").text() == '+') ? '-' : '+').fadeIn();
                            })
                        })
                    });
                    </script>

                    <div class="tab1">
                        <?php echo the_field('tab1'); ?>
                    </div>

                </div>
            <?php }; ?>
                <!-- end tab1 -->


                <!-- tab2 -->
                <?php if( get_field('tab2') ) { ?>
                <div class="row no-gutters pl-5 ">

                    <div class="col-12">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab2-text'); ?></div>

                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_tab2" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_tab2">+</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_tab2").click(function () {
                            $(".tab2").slideToggle();
                            $("#fold_tab2").fadeOut(function () {
                                $("#fold_p_tab2").text(($("#fold_p_tab2").text() == '-') ? '+' : '-').fadeIn();
                            })
                        })
                    });
                    </script>


                    <div class="tab2">

                        <?php echo the_field('tab2'); ?>

                    </div>
                </div>
            <?php }; ?>
                <!-- end tab2 -->



                <!-- tab3 -->
                <?php if( get_field('tab3') ) { ?>
                <div class="row no-gutters pl-5 ">

                    <div class="col-12">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab3-text'); ?></div>

                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_tab3" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_tab3">+</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_tab3").click(function () {
                            $(".tab3").slideToggle();
                            $("#fold_tab3").fadeOut(function () {
                                $("#fold_p_tab3").text(($("#fold_p_tab3").text() == '-') ? '+' : '-').fadeIn();
                            })
                        })
                    });
                    </script>


                    <div class="tab3">

                        <?php echo the_field('tab3'); ?>

                    </div>
                </div>
            <?php }; ?>
                <!-- end tab3 -->


                <!-- tab4 -->
                <?php if( get_field('tab4') ) { ?>
                <div class="row no-gutters pl-5 ">

                    <div class="col-12">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab4-text'); ?></div>

                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_tab4" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_tab4">+</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_tab4").click(function () {
                            $(".tab4").slideToggle();
                            $("#fold_tab4").fadeOut(function () {
                                $("#fold_p_tab4").text(($("#fold_p_tab4").text() == '-') ? '+' : '-').fadeIn();
                            })
                        })
                    });
                    </script>


                    <div class="tab4">

                        <?php echo the_field('tab4'); ?>

                    </div>
                </div>
            <?php }; ?>
                <!-- end tab4 -->



                <!-- tab5 -->
                <?php if( get_field('tab5') ) { ?>
                <div class="row no-gutters pl-5 ">

                    <div class="col-12">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab5-text'); ?></div>

                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_tab5" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_tab5">+</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_tab5").click(function () {
                            $(".tab5").slideToggle();
                            $("#fold_tab5").fadeOut(function () {
                                $("#fold_p_tab5").text(($("#fold_p_tab5").text() == '-') ? '+' : '-').fadeIn();
                            })
                        })
                    });
                    </script>


                    <div class="tab5">

                        <?php echo the_field('tab5'); ?>

                    </div>
                </div>
            <?php }; ?>
                <!-- end tab5 -->

                <!-- tab6 -->
                <?php if( get_field('tab6') ) { ?>
                <div class="row no-gutters pl-5 ">

                    <div class="col-12">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab6-text'); ?></div>

                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_tab6" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_tab6">+</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_tab6").click(function () {
                            $(".tab6").slideToggle();
                            $("#fold_tab6").fadeOut(function () {
                                $("#fold_p_tab6").text(($("#fold_p_tab6").text() == '-') ? '+' : '-').fadeIn();
                            })
                        })
                    });
                    </script>


                    <div class="tab6">

                        <?php echo the_field('tab6'); ?>

                    </div>
                </div>
            <?php }; ?>
                <!-- end tab6 -->

                <!-- tab7 -->
                <?php if( get_field('tab7') ) { ?>
                <div class="row no-gutters pl-5 ">

                    <div class="col-12">
                        <div class="row border-bottom-sfaturi">
                            <div class="col-8 pt-4">
                                <div class="h5 d-inline-flex  font-weight-bold text-dark "><?php echo the_field('tab7-text'); ?></div>

                            </div>
                            <div class="col-4 text-right pt-4">
                                <div id="fold_tab7" class="margin-pointer h3 text-dark d-inline-flex justify-content-end pr-5">
                                    <p id="fold_p_tab7">+</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("#fold_tab7").click(function () {
                            $(".tab7").slideToggle();
                            $("#fold_tab7").fadeOut(function () {
                                $("#fold_p_tab7").text(($("#fold_p_tab7").text() == '-') ? '+' : '-').fadeIn();
                            })
                        })
                    });
                    </script>


                    <div class="tab7">

                        <?php echo the_field('tab7'); ?>

                    </div>
                </div>
            <?php }; ?>
                <!-- end tab7 -->


            </div>

        </div>


    </main>
</div>
</div>

<style media="screen">
body{
    overflow-x:hidden;
}

strong {
    color:black;
    font-weight:600;
}

.border-bottom-sfaturi{
    border-bottom:1px solid #707070;
}

.tab1{
    margin-top:25px;
}

.tab2, .tab3, .tab4, .tab5, .tab6, .tab7{
    display:none;
    margin-top:25px;
}

.dynamic-sticky {
    position: sticky;
    top: 0;
}
.margin-pointer.h3.text-dark.d-inline-flex{
    cursor:pointer;
}
.top-margin-sfaturi{
    margin-top:65px;
}
@media (max-width: 575px) {
    .top-margin-sfaturi{
        margin-top:10px;
    }
    .dynamic-sticky{
        height:50vh !important;
    }


}
@media (max-width: 1431px) {

    a.btn.btn-sm.rounded-snef {
        margin-bottom: 25px;
    }
}


.btn.btn-sm.rounded-snef.bg-info{
    margin:10px 0;
    border:1px solid black;
    color:white !important;
}

.btn.btn-sm.rounded-snef > a {
    white-space: initial;
    color:white;
}
.navbar-nav{
    display:block;
    font-size:14px;
}
.nav-link{
    padding: 0.2rem 1rem;
}

.title{
    margin-top:30px;
}
</style>
<?php get_footer();
