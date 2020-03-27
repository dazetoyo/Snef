<?php


if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {


// Do some minor form validation to make sure there is content
if (isset ($_POST['title'])) {
$title =  $_POST['title'];
} else {
echo 'Please enter a  title';
}
if (isset ($_POST['description'])) {
$description = $_POST['description'];
} else {
echo 'Please enter the content';
}

if (isset ($_POST['article_hashtag'])) {
$hashtag =  $_POST['article_hashtag'];
}

if (isset ($_POST['article_first_paragraph'])) {
$article_first_paragraph =  $_POST['article_first_paragraph'];
}


if (isset ($_POST['date_min'])) {
$date_min =  $_POST['date_min'];
}


if (isset ($_POST['date_max'])) {
$date_max =  $_POST['date_max'];
}


if (isset ($_POST['beneficiari'])) {
$beneficiari =  $_POST['beneficiari'];
}


if (isset ($_POST['nume'])) {
$nume_prenume =  $_POST['nume'];
}

if (isset ($_POST['functie'])) {
$functie =  $_POST['functie'];
}


if (isset ($_POST['telefon'])) {
$telefon =  $_POST['telefon'];
}


if (isset ($_POST['email'])) {
$email =  $_POST['email'];
}



// These files need to be included as dependencies when on the front end.
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );



if (in_array($_FILES['post_thumbnail']['type'], array('image/jpg','image/jpeg','image/png'))) {


    $img_id = media_handle_upload( 'post_thumbnail', 0 );



    if ( is_wp_error( $img_id ) ) {
    echo "Error";
    } else {

     update_user_meta( $current_user->ID, 'post_thumbnail', $img_id );

    }

}

else {
    //update_field("upload_thumbnail_admin", "utilizatorul a încercat să încarce fișier de tip ".$_FILES['post_thumbnail']['type'], $pid );
    echo "Ați încercat să introduceți fișiere inadmisibile.";
}


if (!empty($_FILES['upload_attachment']['name'][0])) {


        $files = $_FILES['upload_attachment'];
        $count = 0;
        $galleryImages = array();


        foreach ($files['name'] as $count => $value) {


            if ($files['name'][$count]) {

                $file = array(
                    'name'     => $files['name'][$count],
                    'type'     => $files['type'][$count],
                    'tmp_name' => $files['tmp_name'][$count],
                    'error'    => $files['error'][$count],
                    'size'     => $files['size'][$count]
                );


                // We are only allowing images
                $allowedMimes = array(
                    'jpg|jpeg|jpe' => 'image/jpeg',
                //    'gif'          => 'image/gif',
                    'png'          => 'image/png',
                );

                $upload_overrides = array( 'test_form' => false,
                'mimes'     => $allowedMimes );

                $upload = wp_handle_upload($file, $upload_overrides);


                // $filename should be the path to a file in the upload directory.
                $filename = $upload['file'];

                // The ID of the post this attachment is for.
                $parent_post_id = $post_id;


                // Check the type of tile. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype( basename( $filename ), $allowedMimes );


                if (!empty($filetype['ext'])) {

                // Get the path to the upload directory.
                $wp_upload_dir = wp_upload_dir();

                // Prepare an array of post data for the attachment.
                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );

                // Insert the attachment.
                $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );

                // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                require_once( ABSPATH . 'wp-admin/includes/image.php' );

                // Generate the metadata for the attachment, and update the database record.
                $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                wp_update_attachment_metadata( $attach_id, $attach_data );

                array_push($galleryImages, $attach_id);
                } else {
                    echo "Ați încărcat un tip de fișier invalid";
                }



            }

            $count++;

            // add images to the gallery field


        }



    }





// Add the content of the form to $post as an array
$new_post = array(
'post_title'    => $title,
'post_thumbnail' => $imagine,
// 'article_gallery' => $article_gallery,
'article_first_paragraph' => $article_first_paragraph,
'post_beneficiari' => $beneficiari,
'date_min' => $date_min,
'date_max' => $date_max,
'article_hashtag' => $hashtag,
'post_content'  => $description,
'tax_input'     => array(
'audienta_tintita' =>   $_POST['audienta_tintita'] ,
'acoperire_sector' =>   $_POST['acoperire_sector'] ,
'anvergura' =>   $_POST['anvergura'] ,
'instrumentul' =>   $_POST['instrumentul'] ,
'resurse' =>   $_POST['resurse'] ,
'institutia' =>   $_POST['institutia'] ,
'taburi' =>   $_POST['taburi'] ,

//    'field' => 'id',
),

// 'tags_input'    => array($tags),
'post_status'   => 'private',           // Choose: publish, preview, future, draft, etc.
'post_type' => 'act_implementate',  //'post',page' or use a custom post type if you want to

);
//save the new post




$pid = wp_insert_post($new_post);
//

update_post_meta(  $pid , '_thumbnail_id', $img_id );
update_field( 'article_hashtag', $hashtag , $pid );
update_field( 'article_first_paragraph', $article_first_paragraph , $pid );
update_field( 'date_min', $date_min , $pid );
update_field( 'date_max', $date_max , $pid );
update_field( 'beneficiari', $beneficiari , $pid );
update_field('article_gallery', $galleryImages, $pid);
update_field('nume', $nume_prenume, $pid);
update_field('functie', $functie, $pid);
update_field('telefon', $telefon, $pid);
update_field('email', $email, $pid);






//wp_redirect(get_permalink($pid));
//
// exit;
//insert taxonomies
}
?>
