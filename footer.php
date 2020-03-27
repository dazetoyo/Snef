
</div><!-- .container -->

</div><!-- #content -->



<footer id="site-footer" class="site-footer">
    <div class="container">
        <?php if(is_active_sidebar( 'sidebar-footer' )){ ?>
            <div class="row  footer-border ">
                <div class="col-12 col-sm-8">
                    <aside class="widget-area" aria-label="<?php esc_attr_e( 'Footer', 'increase' ); ?>">
                        <div class="row pt-3">
                            <?php dynamic_sidebar('sidebar-footer'); ?>
                        </div>
                    </aside><!-- .widget-area -->
                </div>
                <div class="col-12 col-sm-4">
                    <!-- language switcher -->
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12 col-sm-9 font-12">
                <div class="row">
                    <div class="col-4 text-center text-sm-left  pb-3 small">   INFORMARE PRIVIND CONFIDENTIALITATEA DATELOR.  </div>
                    <div class="col-4 text-center text-sm-left  pb-3 small">     POLITICA DE UTLIZARE A COOKIE-URILOR. </div>
                </div>
            </div>
            <div class="col-12 col-sm-3">
            </div>
        </div>
    </div>
</footer><!-- #colophon -->


<?php


if ($_GET["logo"]): ?>

<script type="text/javascript">
// jQuery(document).ready(function($) {
//
//     $(".change-logo > figure > div > img").attr("src","/wp-content/uploads/2019/07/SNEF-white.svg");
//     $(".navbar-brand > img ").attr("src","/wp-content/uploads/2019/07/Logo1.svg");
//
//
// });
</script>
<!-- <?php //elseif ($_GET["logo"] === "1"):?>
<script type="text/javascript">
// jQuery(document).ready(function($) {
//     $(".change-logo > figure > div > img").attr("src","/wp-content/uploads/2019/07/Logo2.svg");
//     $(".navbar-brand > img ").attr("src","/wp-content/uploads/2019/07/Logo2.svg");
//     });
</script> -->
<?php else :?>
    <script type="text/javascript">
    // jQuery(document).ready(function($) {
    //     $(".change-logo > figure > div > img").attr("src","/wp-content/uploads/2019/07/Logo2.svg");
    //     $(".navbar-brand > img ").attr("src","/wp-content/uploads/2019/07/Logo2.svg");
    //     $(".change-logo").addClass("filter-white");
    //     $(".navbar-brand > ").css("max-height", "75px");
    //
    // });
    //
    //

    // jQuery(document).ready(function($) {
    //     $(".change-logo > figure > div > img").attr("src","/wp-content/uploads/2019/07/logo-mare.svg");
    //     $(".navbar-brand > img ").attr("src","/wp-content/uploads/2019/07/logo_mic.svg");
    //     });
</script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
