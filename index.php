<?php get_header(); ?>
<?php
$increase_sidebar_position = get_field('increase_options_sidebar_position','options');
?>
	<div class="wrap <?php if($increase_sidebar_position != 'disabled'){echo 'row';} ?>">
		<?php if($increase_sidebar_position != 'disabled'){ ?>
			<div class="col-md-8 col-lg-9">
		<?php } ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="entry-header">
					<h1 class="title"><?php single_post_title(); ?></h1>
				</header>
			<?php else : ?>
				<header class="entry-header">
					<h1 class="title"><?php _e( 'Posts', 'increase' ); ?></h1>
				</header>
			<?php endif; ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php if (have_posts()) { ?>
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
					<?php } else {
						
						
						if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
							
							<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'increase' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
						
						<?php } else { ?>
							
							<p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'increase'); ?></p>
							<?php
							get_search_form();
							
						};
						
					}; ?>
				</main>
			</div>
		<?php if($increase_sidebar_position != 'disabled'){ ?>
			</div>
			<div class="col-md-4 col-lg-3 <?php if($increase_sidebar_position == 'left'){echo 'order-md-first';} ?>">
				<?php get_sidebar(); ?>
			</div>
		<?php } ?>
	</div>
<?php get_footer();