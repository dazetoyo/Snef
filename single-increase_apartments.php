<?php get_header(); ?>
	<div id="primary" class="content-area">
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
<?php get_footer();