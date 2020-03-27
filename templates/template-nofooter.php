<?php /* Template Name: No footer */ ?>
<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area  <?php
    if(get_field('increase_page_remove_padding_top')){echo ' pt-0 ';}
    if(get_field('increase_page_remove_padding_bottom')){echo ' pb-0 ';}
    ?>">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) { ?>
            <div class="post-wrap">
                <?php while ( have_posts() ) :  the_post();	 ?>

                    <?php get_template_part( 'template-parts/page/content', 'page' ); ?>

                <?php endwhile; ?>
            </div>
        <?php }; ?>
    </main>
</div>
</div>


<script type="text/javascript">

jQuery(document).ready(function() {
    var windowH = window.innerHeight;
    var headerH = jQuery("#masthead").innerHeight();
    var contentH = jQuery("#content-row").innerHeight();
    // console.log(contentH);
    // console.log(headerH);
    // console.log(windowH);
    var dynamicPx = windowH - headerH - contentH;
    // console.log(dynamicPx);
    jQuery(".dynamic-padding").css("padding-bottom", dynamicPx);
});

</script>

<style media="screen">
    .site-footer{
        display:none;
    }
</style>

<?php get_footer();
