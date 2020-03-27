<div class="increase-gallery row no-gutters">
    <?php

    $images = explode(",", $images);
    $i = 1; foreach( $images as $image_id ){
        $image = wp_get_attachment_url($image_id);

        ?>
        <div class="<?php if((($i-1) % 8 == 0) || (($i-2) % 8 == 0)){echo 'col-md-6';}else{echo 'col-md-4';}?> col-6 p-1">
            <a class="fancybox" href="<?php echo $image; ?>" data-fancybox="page-template-gallery" style="background-image:url(<?php echo $image; ?>)">

            </a>
        </div>
        <?php $i++; } ?>
</div>