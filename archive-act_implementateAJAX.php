<?php get_header(); ?>

<?php
// $taxonomies = get_object_taxonomies( $post_type, 'act_implementate' );
// $exclude = array('limba');
?>
<div class="row">
    <div class="col-12 hide-success">

        <h5 class="text-danger pt-5 mt-5">
            <a href="/cartea-alba">
                <img class="mb-1 mr-4" style="filter: saturate(0%) grayscale(100%) brightness(69%) contrast(1000%)" width="40" src="/wp-content/uploads/2019/06/Group-11-1.png">
            </a>
            I. Activitati implementate si implementate in prezent in domeniul educatiei financiare </h5>

        </div>

        <form  class="hide-success" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
            <div class="row">

                <?php
                if( $terms = get_terms(array('taxonomy' => 'audienta_tintita','orderby' => 'name' ))){?>
                    <div class="col-12 col-lg-3 px-0 mt-5">
                        <div class="box-carte">
                            <p class="h5 text-danger">Audienta tintita</p>
                            <p class="small text-secondary">Daca este posibil, va rugam sa desfintati Limita de varsta a <br/> grupurilor tinta care au ca tinta aceasta activitate.</p>
                            <ul class="audienta">
                                <?
                                foreach ( $terms as $term ) {
                                    ?>
                                    <li><input
                                        name="audienta"
                                        type="checkbox"
                                        value="<?php echo $term->slug; ?>"
                                        id="<?php echo $term->slug; ?>" />
                                        <label class="h6 text-secondary font-weight-light font-weight-light font-weight-light mb-1" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label></li>
                                        <?php
                                    }
                                }
                                ?>
                                <ul>
                                </div>
                            </div>

                            <?php
                            if( $terms = get_terms(array('taxonomy' => 'acoperire_sector','orderby' => 'name' ))){?>
                                <!-- echo '<select name="categoryfilter"><option value="">Select category...</option>'; -->
                                <div class="col-12 col-lg-3 px-0 mt-5">
                                    <div class="box-carte">
                                        <p class="h5 text-danger">Acoperire sector</p>
                                        <p class="small text-secondary"><br/></p>
                                        <ul class="acoperire">
                                            <?
                                            foreach ( $terms as $term ) {
                                                ?>

                                                <li><input
                                                    name="acoperire"
                                                    type="checkbox"
                                                    value="<?php echo $term->slug; ?>"
                                                    id="<?php echo $term->slug; ?>" />
                                                    <label class="h6 text-secondary font-weight-light font-weight-light font-weight-light" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label></li>
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
                                if( $terms = get_terms(array('taxonomy' => 'anvergura','orderby' => 'name' ))){?>
                                    <div class="col-12 col-lg-3 px-0 mt-5">
                                        <div class="box-carte">
                                            <p class="h5 text-danger">Anvergura teritoriala</p>
                                            <p class="small text-secondary"><br/></p>
                                            <ul class="anvergura">
                                                <?
                                                foreach ( $terms as $term ) {
                                                    ?>
                                                    <li><input
                                                        name="anvergura"
                                                        type="checkbox"
                                                        value="<?php echo $term->slug; ?>"
                                                        id="<?php echo $term->slug; ?>" />
                                                        <label class="h6 text-secondary font-weight-light font-weight-light font-weight-light" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label></li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <?php
                                    if( $terms = get_terms(array('taxonomy' => 'instrumentul','orderby' => 'name' ))){?>
                                        <div class="col-12 col-lg-3 px-0 mt-5">
                                            <div class="box-carte">
                                                <p class="h5 text-danger">Instrumentul sau activitatea cu care se implementeaza initiativa *</p>
                                                <p class="small text-secondary">Instrumente si activitati posibile (se poate selecta mai mult de un instrument sau activitate)</p>
                                                <ul class="instrumentul">
                                                    <?
                                                    foreach ( $terms as $term ) {
                                                        ?>
                                                        <li><input
                                                            name="instrumentul"
                                                            type="checkbox"
                                                            value="<?php echo $term->slug; ?>"
                                                            id="<?php echo $term->slug; ?>" />
                                                            <label class="h6 text-secondary font-weight-light font-weight-light font-weight-light" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                        if( $terms = get_terms(array('taxonomy' => 'resurse','orderby' => 'name' ))){?>
                                            <div class="col-12 col-lg-3 px-0 mt-5">
                                                <div class="box-carte border-0">
                                                    <p class="h5 text-danger">Comentarii, numele cursului, resursele de informatii
                                                    </p>
                                                    <p class="small text-secondary"><br/></p>
                                                    <ul class="resurse">
                                                        <?
                                                        foreach ( $terms as $term ) {
                                                            ?>
                                                            <li><input
                                                                name="resurse"
                                                                type="checkbox"
                                                                value="<?php echo $term->slug; ?>"
                                                                id="<?php echo $term->slug; ?>" />
                                                                <label class="h6 text-secondary font-weight-light font-weight-light font-weight-light" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label></li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                            if( $terms = get_terms(array('taxonomy' => 'institutia','orderby' => 'name' ))){?>
                                                <div class="col-12 col-lg-3 px-0 mt-5">
                                                    <div class="box-carte border-0">
                                                        <p class="h5 text-danger">
                                                            Institutia sau organizatia
                                                        </p>
                                                        <p class="small text-secondary"><br/></p>

                                                        <ul class="institutia">
                                                            <?
                                                            foreach ( $terms as $term ) {
                                                                ?>
                                                                <li><input
                                                                    name="institutia"
                                                                    type="checkbox"
                                                                    value="<?php echo $term->slug; ?>"
                                                                    id="<?php echo $term->slug; ?>" />
                                                                    <label class="h6 text-secondary font-weight-light font-weight-light font-weight-light" for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label></li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center mt-3 mb-5 pb-5">
                                                    <button class=" btn rounded-snef bg-info text-light px-3">
                                                        <span class="h6 text-light px-2"> Cauta </span> <img width="20px" src="/wp-content/uploads/2019/07/Path-7.png">
                                                    </button>
                                                </div>
                                            </div>

                                            <input type="hidden" name="action" value="myfilter">
                                        </form>
                                    </div>

                                    <div id="response"></div>

                                    <script type="text/javascript">
                                    jQuery(function($){

                                        // $( "input:checkbox" ).on( "click", function() {
                                        //     $( this  ).next().css("color", "yellow");
                                        // });


                                        $('ul.audienta > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.audienta > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });

                                        $('ul.acoperire > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.acoperire > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });



                                        $('ul.anvergura > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.anvergura > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });


                                        $('ul.audienta > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.audienta > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });


                                        $('ul.instrumentul > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.instrumentul > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });

                                        $('ul.resurse > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.resurse > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });

                                        $('ul.institutia > li > input:checkbox').change(function(){
                                            //first remove class from all
                                            $('ul.institutia > li > input:checkbox').next().removeClass("checkbox-active");
                                            //now add the class to checked checkbox
                                            if($(this).is(":checked")){
                                                $(this).next().addClass("checkbox-active");
                                            }
                                        });

                                        $('#filter').submit(function(){
                                            var filter = $('#filter');
                                            $.ajax({
                                                url:filter.attr('action'),
                                                data:filter.serialize(), // form data
                                                type:filter.attr('method'), // POST
                                                beforeSend:function(xhr){
                                                    filter.find('button').text('Processing...'); // changing the button label
                                                },



                                                success:function(data){
                                                    $(".hide-success").fadeOut();
                                                    $(window).scrollTop(0);
                                                    $("#response").hide().fadeIn(1500);
                                                    filter.find('button').text('Cauta'); // changing the button label back
                                                    $('#response').html(data); // insert data
                                                    $( ".criterii" ).on( "click", function() {
                                                        $(".hide-success").hide().fadeIn(1500);
                                                        $("#response").fadeOut(1500);
                                                    });
                                                    $( ".go-back" ).on( "click", function() {
                                                        $(".hide-success").hide().fadeIn(1500);
                                                        $("#response").fadeOut(1500);
                                                    });

                                                }



                                            });
                                            return false;
                                        });
                                    });
                                    </script>

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
                                        height: 500px;
                                        padding: 40px;
                                        margin: 0 25px;
                                        border-bottom: 1px solid #911919;
                                    }

                                    .box-carte{
                                        background-color:#ffffff00;
                                        transition:0.3s;
                                    }

                                    .box-carte:hover{
                                        background-color: #fff;
                                    }
                                    .checkbox-active{
                                        color:#B3696D !important;
                                    }
                                    #content{
                                        margin-top:113px;
                                    }
                                    </style>
                                    <?php get_footer();
