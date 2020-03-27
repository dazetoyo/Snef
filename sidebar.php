<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>

	<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'increase' ); ?>">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</aside>
	
<?php } ?>