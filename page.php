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



<?php get_footer();
