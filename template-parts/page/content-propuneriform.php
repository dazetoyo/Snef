
<form id="new_post2" name="new_post2" method="post" action="" enctype='multipart/form-data'>


    <div class=" hidden-post active-post step-1"><label for="nume-2"></label><br />
        <div class="post-meta">Nume și prenume</div>
        <input type="text" id="nume-2" value="" tabindex="1" name="nume-2" required/>
    </div>



    <div class=" hidden-post active-post step-1"><label for="functie-2"></label><br />
        <div class="post-meta">Funcție</div>
        <input type="text" id="functie-2" value="" tabindex="1" name="functie-2" required/>
    </div>


    <div class=" hidden-post active-post step-1"><label for="telefon-2"></label><br />
        <div class="post-meta">Telefon</div>
        <input type="number" id="telefon-2" value="" tabindex="1" name="telefon-2" required/>
    </div>


    <div class=" hidden-post active-post step-1"><label for="email-2"></label><br />
        <div class="post-meta">Adresa de Email</div>
        <input type="email" id="email-2" value="" tabindex="1" name="email-2" required/>
    </div>



    <!-- post name -->
    <div class=" hidden-post step-2"><label for="title-2"></label><br />
        <div class="post-meta">Denumire proiect</div>
        <input type="text" id="title-2" value="" tabindex="1" name="title-2" />
    </div>

    <?php /*

    <select name="audienta_tintita" id="audienta_tintita" class="postform">
    <option value="-1">Choose one...</option>
    <?php

    $terms = get_terms("audienta_tintita");

    foreach ($terms as $term) {
    printf( '<option class="level-0" value="%s">%s</option>', $term->slug, $term->name, $term->term_id );

}
echo '</select>';
?> */ ?>



<?php /*
<!-- post Category -->
<p><label for="audienta_tintita">Category:</label><br />
<p><?php wp_dropdown_categories(

array(
'show_option_all'    => 'Choose a region',
'show_option_none'   => '',
'orderby'            => 'ID',
'order'              => 'ASC',
'show_count'         => 0,
'hide_empty'         => 0,
'child_of'           => 0,
'exclude'            => '',
'echo'               => 1,
// 'selected'           => $selected_id,
'hierarchical'       => 1,
'name'               => 'audienta_tintita',     // important
// 'name'               => 'tax_input['.'audienta_tintita'.']',     // important
// 'id'                 => $id,
'class'              => 'form-no-clear',
'depth'              => 0,
'tab_index'          => 0,
'taxonomy'           => 'audienta_tintita',
'hide_if_empty'      => false
)

); ?></p>
*/?>






<div class="hidden-post  step-2 form-group file-area">
    <label for="post_thumbnail-2">Imagine reprezentativă PROPUNERI
        <!-- <span class="d-block">Imaginea trebuie să fie de rezoluție 16:9</span> -->
    </label>
    <input type="file" name="post_thumbnail-2" type="file" id="post_thumbnail-2"   accept=".jpg, .jpeg"/>
    <div class="file-dummy">
        <div class="success">Ai selectat imaginea reprezentativă</div>
        <div class="default">Selectează o imagine JPEG/ JPG ca imagine reprezentativă</div>
    </div>
    <p class="small font-italic">Imaginea trebuie să fie cel puțin 1200x600 </p>
</div>

<div class="hidden-post  step-2">Primul paragraf evidențiat
    <input placeholder="First Paragraph" type="text" id="article_first_paragraph"  name="article_first_paragraph" />
</div>



<div class="hidden-post step-2 form-group file-area">
    <label for="upload_attachment2">Imagini galerie
        <!-- <span class="d-block">Imaginile trebuie să fie de rezoluție 16:9</span> -->
    </label>
    <input name="upload_attachment-2[]" type="file" id="upload_attachment-2" multiple="multiple"    accept=".jpg, .jpeg"/>

    <div class="file-dummy">
        <div class="success">Ai selectat imaginile pentru galerie</div>
        <div class="default">Selectează imagini JPEG/JPG pentru a fi afișate în galerie</div>
    </div>
    <p class="small font-italic">Imaginile trebuie să fie cel puțin 1200x600 </p>
</div>






<div class="hidden-post  step-2">Perioada de început
    <input type="date" id="date_min" name="date_min"  >
</div>


<div class="hidden-post  step-2">Perioada de sfârșit
    <input type="date" id="date_max" name="date_max"  >
</div>






<div class="hidden-post  step-2">Cuvinte cheie
    <input placeholder="Exemplu1, Exemplu2" type="text" id="article_hashtag"  name="article_hashtag"  />
</div>


<div class="hidden-post  step-2">Număr beneficiari
    <input type="number" name="beneficiari" id="beneficiari">
</div>



<!-- Audienta start -->
<div class="hidden-post  step-3">
    <?php
    if( $terms = get_terms(array('taxonomy' => 'audienta_tintita-2','orderby' => 'name' , 'hide_empty' => false))){?>
        <div class="col-12 px-0">

            <div class="box-carte">
                <div class="row">
                    <div class="col-10">
                        <p class="h1 d-inline-flex mb-3">Grup țintă</p>
                    </div>

                </div>

                <ul >
                    <?
                    foreach ( $terms as $term ) {
                        ?>
                        <li>
                            <div class="pretty p-icon p-pulse">
                                <input
                                name="audienta_tintita-2[]"
                                type="checkbox"
                                value="<?php echo $term->term_id; ?>"
                                id="<?php echo $term->term_id; ?>" />
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
        </div>

        <!-- Audienta end -->




        <!-- Acoperire sector start -->
        <div class="hidden-post step-3">
            <?php
            if( $terms = get_terms(array('taxonomy' => 'acoperire_sector-2','orderby' => 'name', 'hide_empty' => false ))){?>
                <div class="col-12 px-0">

                    <div class="box-carte">
                        <div class="row">
                            <div class="col-10">
                                <p class="h1 d-inline-flex mb-3">Acoperire Sector</p>
                            </div>

                        </div>

                        <ul >
                            <?
                            foreach ( $terms as $term ) {
                                ?>
                                <li>
                                    <div class="pretty p-icon p-pulse">
                                        <input
                                        name="acoperire_sector-2[]"
                                        type="checkbox"
                                        value="<?php echo $term->term_id; ?>"
                                        id="<?php echo $term->term_id; ?>" />
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
                </div>

                <!-- Acoperire sector end -->



                <!-- Anvergura start -->
                <div class="hidden-post step-4">
                    <?php
                    if( $terms = get_terms(array('taxonomy' => 'anvergura-2','orderby' => 'name' , 'hide_empty' => false ))){?>
                        <div class="col-12 px-0">

                            <div class="box-carte">
                                <div class="row">
                                    <div class="col-10">
                                        <p class="h1 d-inline-flex mb-3">Anvergura</p>
                                    </div>

                                </div>

                                <ul >
                                    <?
                                    foreach ( $terms as $term ) {
                                        ?>
                                        <li>
                                            <div class="pretty p-icon p-pulse">
                                                <input
                                                name="anvergura-2[]"
                                                type="checkbox"
                                                value="<?php echo $term->term_id; ?>"
                                                id="<?php echo $term->term_id; ?>" />
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
                        </div>

                        <!-- Instrumentul end -->




                        <!-- Instrumentul start -->
                        <div class="hidden-post step-4">
                            <?php
                            if( $terms = get_terms(array('taxonomy' => 'instrumentul-2','orderby' => 'name',  'hide_empty' => false ))){?>
                                <div class="col-12 px-0">

                                    <div class="box-carte">
                                        <div class="row">
                                            <div class="col-10">
                                                <p class="h1 d-inline-flex mb-3">Instrumentul</p>
                                            </div>

                                        </div>

                                        <ul >
                                            <?
                                            foreach ( $terms as $term ) {
                                                ?>
                                                <li>
                                                    <div class="pretty p-icon p-pulse">
                                                        <input
                                                        name="instrumentul-2[]"
                                                        type="checkbox"
                                                        value="<?php echo $term->term_id; ?>"
                                                        id="<?php echo $term->term_id; ?>" />
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
                                </div>

                                <!-- Instrumentul end -->



                                <!-- Resurse sector start -->
                                <div class="hidden-post step-5">
                                    <?php
                                    if( $terms = get_terms(array('taxonomy' => 'resurse-2','orderby' => 'name' , 'hide_empty' => false ))){?>
                                        <div class="col-12 px-0">

                                            <div class="box-carte">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <p class="h1 d-inline-flex mb-3">Resurse</p>
                                                    </div>

                                                </div>

                                                <ul >
                                                    <?
                                                    foreach ( $terms as $term ) {
                                                        ?>
                                                        <li>
                                                            <div class="pretty p-icon p-pulse">
                                                                <input
                                                                name="resurse-2[]"
                                                                type="checkbox"
                                                                value="<?php echo $term->term_id; ?>"
                                                                id="<?php echo $term->term_id; ?>" />
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
                                        </div>

                                        <!-- Resurse sector end -->

                                        <!-- Institutia sector start -->
                                        <div class="hidden-post step-5">
                                            <?php
                                            if( $terms = get_terms(array('taxonomy' => 'institutia-2','orderby' => 'name' , 'hide_empty' => false ))){?>
                                                <div class="col-12 px-0">

                                                    <div class="box-carte">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p class="h1 d-inline-flex mb-3">Institutia</p>
                                                            </div>

                                                        </div>

                                                        <ul>
                                                            <?
                                                            foreach ( $terms as $term ) {
                                                                ?>
                                                                <li>
                                                                    <div class="pretty p-icon p-pulse">
                                                                        <input
                                                                        name="institutia-2[]"
                                                                        type="checkbox"
                                                                        value="<?php echo $term->term_id; ?>"
                                                                        id="<?php echo $term->term_id; ?>" />
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
                                                </div>

                                                <!-- institutia sector end -->



                                                <!-- Taburi  start -->
                                                <div class="hidden-post step-6">
                                                    <?php
                                                    if( $terms = get_terms(array('taxonomy' => 'taburi-2','orderby' => 'name' , 'hide_empty' => false))){?>
                                                        <div class="col-12 px-0">

                                                            <div class="box-carte">
                                                                <div class="row">
                                                                    <div class="col-10">
                                                                        <p class="h1 d-inline-flex mb-3">Organizații</p>
                                                                    </div>

                                                                </div>

                                                                <ul >
                                                                    <?
                                                                    foreach ( $terms as $term ) {
                                                                        ?>
                                                                        <li>
                                                                            <div class="pretty p-icon p-pulse">
                                                                                <input
                                                                                name="taburi-2[]"
                                                                                type="checkbox"
                                                                                value="<?php echo $term->term_id; ?>"
                                                                                id="<?php echo $term->term_id; ?>" />
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
                                                        </div>

                                                        <!-- Taburi end -->


                                                        <!-- post Content -->
                                                        <div class="hidden-post step-6"><label for="description">Content</label><br />

                                                            <textarea id="description-2" tabindex="4" name="description-2"  style="width: 500px; height: 300px;">Conținut proiect</textarea>

                                                        </div>



                                                        <!-- post tags -->
                                                        <!-- <div class="hidden-post step-9"><label for="post_tags">Tags:</label>
                                                        <input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" /></div> -->
                                                        <div class="hidden-post step-7" align="right" style="display:none !important">
                                                            <input type="submit" value="Publish" tabindex="6" id="submit-2" name="submit-2" class="btn-success btn rounded shadow" />
                                                        </div>



                                                        <input type="hidden" name="action" value="new_post2" />
                                                        <?php wp_nonce_field( 'new-post' ); ?>
                                                    </form>
