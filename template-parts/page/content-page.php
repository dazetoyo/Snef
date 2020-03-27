<article <?php post_class(); ?> id="page-<?php the_ID(); ?>">
	<?php if(!get_field('increase_page_remove_title')){ ?>
		<header class="entry-header">
			<h1 class="title">
				<?php the_title(); ?>
			</h1>
		</header>
	<?php } ?>
	<div class="entry-content">
		<?php
			the_content();
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>