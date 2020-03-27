<?php get_header(); ?>
	<div class="wrap">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
				<section class="error-404 not-found">
					<header class="entry-header">
						<h1 class="title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'increase' ); ?></h1>
					</header>
					<div class="entry-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'increase' ); ?></p>
						
						<?php get_search_form(); ?>
					
					</div>
				</section>
			</main>
		</div>
	</div>
<?php get_footer();