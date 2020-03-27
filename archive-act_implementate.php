<?php get_header(); ?>

<?php
// $taxonomies = get_object_taxonomies( $post_type, 'act_implementate' );
// $exclude = array('limba');
?>
<link rel="stylesheet" href="
https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.8.95/css/materialdesignicons.min.css">



<div id="progress" style="display:none;">
    <img src="/wp-content/uploads/2019/07/Ripple-1s-200px.svg"/>
</div>

<div class="row" style="padding-bottom:130px">
    <div class="col-12 ">
        <h5 class="text-danger">
            <a href="/cartea-alba">
                <img class="mb-1 mr-4" style="filter: saturate(0%) grayscale(100%) brightness(69%) contrast(1000%)" width="40" src="/wp-content/uploads/2019/06/Group-11-1.png">
            </a>
            I. Activități implementate în prezent în domeniul educației financiare </h5>
        </div>

        <form  class="col-12 col-xl-3 mt-5" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

            <?php
            if( $terms = get_terms(array('taxonomy' => 'audienta_tintita','orderby' => 'name',
        'hide_empty' => false ))){?>
                <div class="col-12 px-0">
                    <p class="pt-2 h5"> CĂUTARE AVANSATA </p>
                    <div class="box-carte">
                        <div class="row">
                            <div class="col-10">
                                <p class="h5 text-danger d-inline-flex">Grup țintă</p>
                            </div>
                            <div class="col text-right">
                                <div id="fold_audienta"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                                    <p id="fold_p_audienta">-</p>
                                </div>
                            </div>
                        </div>


                        <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $("#fold_audienta").click(function () {
                                $("ul.audienta").slideToggle();
                                $("#fold_p_audienta").fadeOut(function () {
                                    $("#fold_p_audienta").text(($("#fold_p_audienta").text() == '+') ? '-' : '+').fadeIn();
                                })
                            })
                        });
                        </script>


                        <ul class="audienta">
                            <?
                            foreach ( $terms as $term ) {
                                ?>



                                <li>

                                    <div class="pretty p-icon p-pulse">
                                        <input
                                        name="audienta"
                                        type="checkbox"
                                        value="<?php echo $term->slug; ?>"
                                        id="<?php echo $term->slug; ?>" />
                                        <div class="state p-success">
                                            <i class="icon mdi mdi-check"></i>
                                            <label class="h6 font-weight-light ml-2" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                                        </div>
                                    </div>

                                </li>
                                <?php
                            }
                        }
                        ?>
                        <ul>
                        </div>
                    </div>




                    <?php
                    if( $terms = get_terms(array('taxonomy' => 'acoperire_sector','orderby' => 'name',
                'hide_empty' => false ))){?>
                        <!-- echo '<select name="categoryfilter"><option value="">Select category...</option>'; -->
                        <div class="col-12 px-0">
                            <div class="box-carte">
                                <div class="row">
                                    <div class="col-10">
                                        <p class="h5 text-danger d-inline-flex">Acoperire sector</p>
                                    </div>
                                    <div class="col text-right">
                                        <div id="fold_acoperire"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                                            <p id="fold_p_acoperire">+</p>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    $("#fold_acoperire").click(function () {
                                        $("ul.acoperire").slideToggle();
                                        $("#fold_p_acoperire").fadeOut(function () {
                                            $("#fold_p_acoperire").text(($("#fold_p_acoperire").text() == '-') ? '+' : '-').fadeIn();
                                        })
                                    })
                                });
                                </script>


                                <ul class="acoperire">
                                    <?
                                    foreach ( $terms as $term ) {
                                        ?>
                                        <li>
                                            <div class="pretty p-icon p-pulse">
                                                <input
                                                name="acoperire"
                                                type="checkbox"
                                                value="<?php echo $term->slug; ?>"
                                                id="<?php echo $term->slug; ?>" />
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label class="h6 font-weight-light ml-2 ml-2" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                                                </div>

                                            </div>
                                        </li>



                                        <?php
                                    }
                                    // foreach ( $terms as $term ) :
                                    //     echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                                    // endforeach;
                                    // echo '</select>';
                                }
                                ?>
                            </ul>
                        </div>



                    </div>
                    <?php
                    if( $terms = get_terms(array('taxonomy' => 'anvergura','orderby' => 'name',
                'hide_empty' => false ))){?>
                        <div class="col-12 px-0">
                            <div class="box-carte">
                                <div class="row">
                                    <div class="col-10">
                                        <p class="h5 text-danger d-inline-flex">Acoperire teritorială</p>
                                    </div>
                                    <div class="col text-right">
                                        <div id="fold_anvergura"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                                            <p id="fold_p_anvergura">+</p>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    $("#fold_anvergura").click(function () {
                                        $("ul.anvergura").slideToggle();
                                        $("#fold_p_anvergura").fadeOut(function () {
                                            $("#fold_p_anvergura").text(($("#fold_p_anvergura").text() == '-') ? '+' : '-').fadeIn();
                                        })
                                    })
                                });
                                </script>



                                <ul class="anvergura">
                                    <?
                                    foreach ( $terms as $term ) {
                                        ?><li>
                                            <div class="pretty p-icon p-pulse">
                                                <input
                                                name="anvergura"
                                                type="checkbox"
                                                value="<?php echo $term->slug; ?>"
                                                id="<?php echo $term->slug; ?>" />
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label class="h6 font-weight-light ml-2 " for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                                                </div>

                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if( $terms = get_terms(array('taxonomy' => 'instrumentul','orderby' => 'name',
                'hide_empty' => false ))){?>
                        <div class="col-12 px-0">
                            <div class="box-carte">


                                <div class="row">
                                    <div class="col-10">
                                        <p class="h5 text-danger">Instrumentul sau activitatea prin care se implementează inițiativa</p>
                                        <!-- <p class="small">Instrumente si activitati posibile (se poate selecta mai mult de un instrument sau activitate)</p> -->
                                    </div>
                                    <div class="col text-right">
                                        <div id="fold_instrumentul"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                                            <p id="fold_p_instrumentul">+</p>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    $("#fold_instrumentul").click(function () {
                                        $("ul.instrumentul").slideToggle();
                                        $("#fold_p_instrumentul").fadeOut(function () {
                                            $("#fold_p_instrumentul").text(($("#fold_p_instrumentul").text() == '-') ? '+' : '-').fadeIn();
                                        })
                                    })
                                });
                                </script>



                                <ul class="instrumentul">
                                    <?
                                    foreach ( $terms as $term ) {
                                        ?>
                                        <li>
                                            <div class="pretty p-icon p-pulse">
                                                <input
                                                name="instrumentul"
                                                type="checkbox"
                                                value="<?php echo $term->slug; ?>"
                                                id="<?php echo $term->slug; ?>" />
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label class="h6 font-weight-light ml-2 " for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                                                </div>

                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>





                    <!-- -->

                    <div class="col-12 px-0">
                        <div class="box-carte">


                            <div class="row">
                                <div class="col-10">
                                    <p class="h5 text-danger">Număr beneficiari / audiență</p>

                                </div>
                                <div class="col text-right">
                                    <div id="fold_beneficiari"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                                        <p id="fold_p_beneficiari">+</p>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                $("#fold_beneficiari").click(function () {
                                    $(".inp-1").slideToggle();
                                    $("#fold_p_beneficiari").fadeOut(function () {
                                        $("#fold_p_beneficiari").text(($("#fold_p_beneficiari").text() == '-') ? '+' : '-').fadeIn();
                                    })
                                })
                            });
                            </script>




                                            <div class="inp-1">
                            <input type="number" name="price_min" min="0"  />
                            <label alt='Placeholder' placeholder='Număr minim'></label>
                            <input type="number" name="price_max" min="0" />
                            <label alt='Placeholder' placeholder='Număr maxim'></label>
                        </div>


                            <!-- <label for="inp" class="inp inp-1">
                            <input
                            name="beneficiar"
                            value="beneficiar"
                            id="beneficiar"
                            type="number" id="inp" placeholder="&nbsp;">
                            <span class="label">Introduceți numărul</span>

                        </label> -->


                    </ul>
                </div>
            </div>


            <!-- -->
            <?php
            if( $terms = get_terms(array('taxonomy' => 'instrumentul','orderby' => 'name',
        'hide_empty' => false ))){?>
                <div class="col-12 px-0">
                    <div class="box-carte">


                        <div class="row">
                            <div class="col-10">
                                <p class="h5 text-danger">Ziua / Perioada</p>

                            </div>
                            <div class="col text-right">
                                <div id="fold_perioada"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                                    <p id="fold_p_perioada">+</p>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $("#fold_perioada").click(function () {
                                $(".inp-2").slideToggle();
                                $("#fold_p_perioada").fadeOut(function () {
                                    $("#fold_p_perioada").text(($("#fold_p_perioada").text() == '-') ? '+' : '-').fadeIn();
                                })
                            })
                        });
                        </script>

                        <div class="inp-2">
                            <input type="date" name="date_min"  />
                            <label alt='Placeholder' placeholder='Perioada de început'></label>
                            <input type="date" name="date_max"  />
                            <label alt='Placeholder' placeholder='Perioada de sfârșit'></label>
                        </div>




                        <!-- <label for="inp " class="inp inp-2">


                        <span class="label">Introduceți data</span>

                    </label>
                -->



                <?php

            }
            ?>
        </ul>
    </div>
</div>


<?php
if( $terms = get_terms(array('taxonomy' => 'resurse','orderby' => 'name',
'hide_empty' => false ))){?>
    <div class="col-12 px-0">
        <div class="box-carte">

            <div class="row">
                <div class="col-10">
                    <p class="h5 text-danger">Sursa de informații / Referințe
                    </p>
                </div>
                <div class="col text-right">
                    <div id="fold_resurse"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                        <p id="fold_p_resurse">+</p>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#fold_resurse").click(function () {
                    $("ul.resurse").slideToggle();
                    $("#fold_p_resurse").fadeOut(function () {
                        $("#fold_p_resurse").text(($("#fold_p_resurse").text() == '-') ? '+' : '-').fadeIn();
                    })
                })
            });
            </script>


            <ul class="resurse">
                <?
                foreach ( $terms as $term ) {
                    ?>
                    <li>
                        <div class="pretty p-icon p-pulse">
                            <input
                            name="resurse"
                            type="checkbox"
                            value="<?php echo $term->slug; ?>"
                            id="<?php echo $term->slug; ?>" />
                            <div class="state p-success">
                                <i class="icon mdi mdi-check"></i>
                                <label class="h6 font-weight-light ml-2 " for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                            </div>

                        </div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>
<?php
if( $terms = get_terms(array('taxonomy' => 'institutia','orderby' => 'name',
'hide_empty' => false ))){?>
    <div class="col-12 px-0">
        <div class="box-carte border-0">


            <div class="row">
                <div class="col-10">
                    <p class="h5 text-danger">Instituția sau organizația
                    </p>
                </div>
                <div class="col text-right">
                    <div id="fold_institutia"  class="margin-pointer h3 text-danger d-inline-flex justify-content-end">
                        <p id="fold_p_institutia">+</p>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#fold_institutia").click(function () {
                    $("ul.institutia").slideToggle();
                    $("#fold_p_institutia").fadeOut(function () {
                        $("#fold_p_institutia").text(($("#fold_p_institutia").text() == '-') ? '+' : '-').fadeIn();
                    })
                })
            });
            </script>

            <ul class="institutia">
                <?
                foreach ( $terms as $term ) {
                    ?>
                    <li>
                        <div class="pretty p-icon p-pulse">
                            <input
                            name="institutia"
                            type="checkbox"
                            value="<?php echo $term->slug; ?>"
                            id="<?php echo $term->slug; ?>" />
                            <div class="state p-success">
                                <i class="icon mdi mdi-check"></i>
                                <label class="h6 font-weight-light ml-2" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
                            </div>

                        </div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>


<!-- <div class="row">
<div class="col-12 d-flex justify-content-center mt-3 mb-5 pb-5">
<button class=" btn rounded-snef bg-info text-light px-3">
<span class="h6 text-light px-2"> Cauta </span> <img width="20px" src="/wp-content/uploads/2019/07/Path-7.png">
</button>
</div>
</div> -->

<!-- <input type="hidden" name="action" value="filter_autoritati"> -->
</form>

<div class="col-12 col-xl-8 mt-5" id="response">
    <ul class="h5 nav nav-tabs  text-uppercase" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                        <?php $term = get_term_by( 'id', 49 , 'taburi');

                        echo $term->name?></a>
                    </li>
        <li class="nav-item">
            <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" >
                <?php $term = get_term_by( 'id', 50 , 'taburi');

                echo $term->name?>
            </a>
        </li>
                <li class="nav-item">
                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">
                        <?php $term = get_term_by( 'id', 51 , 'taburi');

                        echo $term->name?>
                    </a>
                </li>

            <li class="nav-item">
                <a class="nav-link active" id="toate-tab" data-toggle="tab" href="#toate" role="tab" aria-controls="toate" aria-selected="true">Toate</a>
            </li>
        </ul>
    <div class="tab-content" id="myTabContent">


        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php
            global $post;
            $args = array(
                'post_type' => 'act_implementate',
                'posts_per_page' =>-1,
                'orderby' => 'title',
                'tax_query' => array(
                        array(
                            'taxonomy' => 'taburi',
                            'field' => 'id',
                            'terms' => 51
                        )

                )
            );
            $myposts = get_posts( $args );
            echo '<div class="row">';
            foreach( $myposts as $post ) :
                setup_postdata($post);
                echo '<div class="col-12 col-sm-4">';

                //    get_template_part( 'template-parts/pagina', 'rezultate' );

                echo '<a style="text-decoration:none;" href="'.get_permalink( $id ).'">';
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
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
                echo '<h5 class="text-danger mb-3">' . get_the_title( $ID ) . '</h5>';
                echo '</a>';
                //$my_excerpt = get_the_excerpt();
                //echo $my_excerpt; // Outputs the processed value to the page
                echo ' </div>';
                echo ' </div>';
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php
        global $post;
        $args = array(
            'post_type' => 'act_implementate',
            'posts_per_page' =>-1,
            'orderby' => 'title',
            'tax_query' => array(
                array(
                    'taxonomy' => 'taburi',
                    'field' => 'id',
                    'terms' => 50
                )
            )
        );
        $myposts = get_posts( $args );
        echo '<div class="row">';
        foreach( $myposts as $post ) :
            setup_postdata($post);
            echo '<div class="col-12 col-sm-4">';

            //    get_template_part( 'template-parts/pagina', 'rezultate' );

            echo '<a style="text-decoration:none;" href="'.get_permalink( $id ).'">';
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
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
            echo '<h5 class="text-danger mb-3">' .  get_the_title( $ID ) . '</h5>';
            echo '</a>';
            //$my_excerpt = get_the_excerpt();
            //echo $my_excerpt; // Outputs the processed value to the page
            echo ' </div>';
            echo ' </div>';
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <?php
    global $post;
    $args = array(
        'post_type' => 'act_implementate',
        'posts_per_page' =>-1,
        'orderby' => 'title',
        'tax_query' => array(
                array(
                    'taxonomy' => 'taburi',
                    'field' => 'id',
                    'terms' => 49
                )

        )
    );
    $myposts = get_posts( $args );
    echo '<div class="row">';
    foreach( $myposts as $post ) :
        setup_postdata($post);
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( $id ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
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
        echo '<h5 class="text-danger mb-3">' .  get_the_title( $ID ) . '</h5>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';
    endforeach;
    wp_reset_postdata();
    ?>
</div>
</div>



<div class="tab-pane fade show active" id="toate" role="tabpanel" aria-labelledby="toate-tab">
    <?php
    global $post;
    $args = array(
        'post_type' => 'act_implementate',
        'posts_per_page' =>-1,
        'orderby' => 'title',
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'taburi',
                'field' => 'id',
                'terms' => 51
            ),
            array(
                'taxonomy' => 'taburi',
                'field' => 'id',
                'terms' => 50
            ),
            array(
                'taxonomy' => 'taburi',
                'field' => 'id',
                'terms' => 49
            )
        )
    );
    $myposts = get_posts( $args );
    echo '<div class="row">';
    foreach( $myposts as $post ) :
        setup_postdata($post);
        echo '<div class="col-12 col-sm-4">';

        //    get_template_part( 'template-parts/pagina', 'rezultate' );

        echo '<a style="text-decoration:none;" href="'.get_permalink( $id ).'">';
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
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
        echo '<h5 class="text-danger mb-3">' .  get_the_title( $ID ) . '</h5>';
        echo '</a>';
        //$my_excerpt = get_the_excerpt();
        //echo $my_excerpt; // Outputs the processed value to the page
        echo ' </div>';
        echo ' </div>';
    endforeach;
    wp_reset_postdata();
    ?>
</div>
</div>



</div>


</div> <!-- response -->
</div>




<style media="screen">
li {
    list-style: none; /* Remove list bullets */
}
ul{
    padding:0;
}
label{
    display:inline;
}
.box-carte{
    /* height: 500px;
    padding: 40px;
    margin: 0 25px; */
    padding:25px 25px 0 25px;
    border-bottom: 1px solid #911919;
}

.box-carte{
    background-color:#ffffff00;
    transition:0.3s;
}

/* .box-carte:hover{
background-color: #fff;
} */
.checkbox-active{
    color:#B3696D !important;
}
#content{
    margin-top:113px;
}
/* .tab-content > .active{
display: contents;
} */

/* .fade:not(.show) {
opacity: 1;
} */
.tab-content{
    padding-top:25px;
    border-color:#911919;
}

ul#myTab{
    padding-bottom:25px;
    border-color:#911919;
}

.nav-tabs .nav-link.active:before,
.nav-tabs .nav-item.show .nav-link:before{
    content: '';
    border-bottom:6px solid #911919;
    position:absolute;
    width: 100%;
    bottom: -26px;
    left: 0;
}

.nav-tabs .nav-link{
    border:none;
}

.nav-tabs .nav-link.active , .nav-tabs .nav-item.show .nav-link{
    position:relative;
}

.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
    background:transparent;
    color:black;
    border:none;
}

.nav-item > a {
    color:gray;
}
/* .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus{
border:none;
}
.nav-tabs .nav-link{
border-top-left-radius: 0;
border-top-right-radius: 0;
} */
div.col-12 > h5.text-danger {
    padding-top:50px;
}
p.h5.text-danger{
    padding-bottom:25px;
    margin-bottom:0;
}

#progress{
    width: 100%;
    position: fixed;
    z-index: 900;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 30px;
    background-color: rgba(246, 246, 246, 0.72);
    text-align: center;
    webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -ms-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}

#progress > img {
    position: fixed;
    top: 39%;
    left: 41%;
    padding: 30px;
    text-align: center;
    webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -ms-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;

}
li > div > div > label{
    margin-left:5px;
}
.small.mb-3{
    color:#707070;
}
.margin-pointer{
    margin-top:-9px;
    cursor:pointer;
}

/* checkbox */

.pretty .state label:after, .pretty .state label:before{
    top: 0 !important;
}
.pretty.p-icon .state .icon{
    top:-2px !important;
}
.pretty.p-icon .state .icon:before{
    margin: 1px 0;
}
.pretty input:checked~.state.p-success label:after, .pretty.p-toggle .state.p-success label:after{
    background-color:#b3696d !important;
}

.pretty{
    padding-bottom:10px;
    white-space: normal;
}

ul.acoperire,
ul.anvergura,
ul.instrumentul,
ul.resurse,
ul.institutia{
    display:none;
}



/* input */
.inp-1, .inp-2{
    display:none;
    padding-top:10px;
}

input[type="number"],
input[type="date"] {
    box-sizing: border-box;
    width: 100%;
    height: calc(3em + 2px);
    margin: 0 0 1em;
    padding: 1em;
    border: 1px solid #ccc;
    border-radius: 1.5em;
    background: #fff;
    resize: none;
    outline: none;
}
input[type="number"]:focus,
input[type="date"]:focus {
    border-color: #b3696d;
}
input[type="number"]:focus + label[placeholder]:before,
input[type="date"]:focus + label[placeholder]:before {
    color: #b3696d;
}
input[type="number"]:focus + label[placeholder]:before,
input[type="number"]:valid + label[placeholder]:before,
input[type="date"]:focus + label[placeholder]:before,
input[type="date"]:valid + label[placeholder]:before {
    transition-duration: 0.2s;
    -webkit-transform: translate(0, -1.5em) scale(0.9, 0.9);
    transform: translate(0, -1.5em) scale(0.9, 0.9);
}
input[type="number"]:invalid + label[placeholder][alt]:before,
input[type="date"]:invalid + label[placeholder][alt]:before  {
    content: attr(alt);
}
input[type="number"] + label[placeholder],
input[type="date"] + label[placeholder] {
    display: block;
    pointer-events: none;
    line-height: 1.25em;
    margin-top: calc(-3em - 2px);
    margin-bottom: calc((3em - 1em) + 2px);
}
input[type="number"] + label[placeholder]:before,
input[type="date"] + label[placeholder]:before {
    content: attr(placeholder);
    display: inline-block;
    margin: 0 calc(1em + 2px);
    padding: 0 2px;
    color: #898989;
    white-space: nowrap;
    transition: 0.3s ease-in-out;
    background-image: linear-gradient(to bottom, #fff, #fff);
    background-size: 100% 5px;
    background-repeat: no-repeat;
    background-position: center;
}

</style>


<script type="text/javascript">
jQuery(function($){

    $(' input:checkbox').change(function(){
        //first remove class from all

        if($(this).is(":checked")){
            $(this).next().addClass("checkbox-active");
        }
    });

    // $('ul.acoperire > li > input:checkbox').change(function(){
    //     //first remove class from all
    //     $('ul.acoperire > li > input:checkbox').next().removeClass("checkbox-active");
    //     //now add the class to checked checkbox
    //     if($(this).is(":checked")){
    //         $(this).next().addClass("checkbox-active");
    //     }
    // });
    //
    //
    $('#filter').change(function(){
        var filter = $('#filter');
        $('#progress').show();
        $.ajax({
            url:filter.attr('action'),
            data:filter.serialize()+'&action=filter_autoritati', // form data
            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
                filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data){
                $(window).scrollTop(0);
                $('#progress').hide(); //hide progress bar
                $('#response > div > div:nth-child(1)').html(data); // insert data

                //    filter.find('button').text('Cauta'); // changing the button label back

            }

        });

        $.ajax({
            url:filter.attr('action'),
            // action: 'filter_mediuprivat',
            data:filter.serialize()+'&action=filter_mediuprivat', // form data
            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
                filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data){
                $(window).scrollTop(0);
                //    filter.find('button').text('Cauta'); // changing the button label back
                $('#response > div > div:nth-child(2)').html(data); // insert data
            }

        });

        $.ajax({
            url:filter.attr('action'),
            data:filter.serialize()+'&action=filter_ong', // form data
            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
                filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data){
                $(window).scrollTop(0);
                //    filter.find('button').text('Cauta'); // changing the button label back
                $('#response > div > div:nth-child(3)').html(data); // insert data
            }

        });

        $.ajax({
            url:filter.attr('action'),
            data:filter.serialize()+'&action=filter_toate', // form data

            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
                filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data){
                $(window).scrollTop(0);
                //    filter.find('button').text('Cauta'); // changing the button label back
                $('#response > div > div:nth-child(4)').html(data); // insert data
            }

        });


        return false;
    });
});

// jQuery(document).ready(function($) {
//
//
//     var lastname = sessionStorage.getItem("Grup țintă");
//
//     if ("Grup țintă" in sessionStorage) {
//       $( "#"+lastname ).click();
//     }
//
// });


</script>

<?php get_footer();
