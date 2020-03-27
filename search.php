<?php get_header(); ?>
<?php
// $increase_sidebar_position = get_field('increase_options_sidebar_position','options');
?>

			<div id="primary" class="content-area" >
				<main id="main" class="site-main" role="main">
					<?php if ( have_posts() ) { ?>
						<div class="posts-wrap">
							<?php while (have_posts()) : the_post();

								get_template_part('template-parts/post/content', 'excerpt');

							endwhile;

							if ($wp_query->max_num_pages > 1) {
								if (function_exists('wp_pagenavi')) {
									wp_pagenavi();
								} else {
									?><div class="alignleft"><?php next_posts_link( __( '<span>&laquo;</span> Older posts', 'increase' ) );?></div>
									<div class="alignright"><?php previous_posts_link( __( 'Newer posts <span>&raquo;</span>', 'increase' ) );?></div><?php
								}
							} ?>
						</div>
					<?php }else{ ?>

						<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'increase'); ?></p>
						<?php get_search_form(); ?>

					<?php } ?>

				</main>
			</div>

	</div>

	<style media="screen">
		#main{
			margin-top:120px;
		}
	</style>
<?php get_footer();
