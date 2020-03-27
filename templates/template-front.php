<?php /* Template Name: Front Page */ ?>
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

                    <div class="video-background">
                        <div class="video-foreground">
                          <iframe src="https://www.youtube.com/embed/BV2oBdDHm9g?controls=0&showinfo=0&rel=0&autoplay=1&mute=1&loop=1&playlist=BV2oBdDHm9g" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                        </div>
                    </div>

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
    var headerH = document.getElementById("masthead").clientHeight;
    var contentH = document.getElementById("content").clientHeight;

    // console.log("window height e", windowH);
    // console.log("masthead e", headerH);

    var dynamicPx = windowH - headerH - contentH ;
    // console.log(dynamicPx);
    jQuery(".dynamic-padding").css("padding-bottom", dynamicPx + 5 );
    jQuery("#content-row").css("margin-top", headerH  );
});

</script>

<style media="screen">
    nav.padding-20.navbar.navbar-expand-lg.navbar-light{
        padding-top:20px;
    }



.video-background {
  background-image: url("/wp-content/uploads/2019/07/background-snef.jpg");
  position: fixed;
  top: 0; right: 0; bottom: 0; left: 0;
  z-index: -99;
}
.video-foreground,
.video-background iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
}
#vidtop-content {
	top: 0;
	color: #fff;
}
@media (min-aspect-ratio: 16/9) {
  .video-foreground { height: 300%; top: -100%; }
}
@media (max-aspect-ratio: 16/9) {
  .video-foreground { width: 300%; left: -100%; }
}
@media all and (max-width: 600px) {
.vid-info { width: 50%; padding: .5rem; }
.vid-info h1 { margin-bottom: .2rem; }
}
@media all and (max-width: 500px) {
.vid-info .acronym { display: none; }
.video-background > div {
    display:none;
}
}

body{
    box-shadow: inset 0 0 0 2000px rgba(109, 70, 72, 0.55);
}

</style>

<?php get_footer();
