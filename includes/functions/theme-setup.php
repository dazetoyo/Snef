<?php
if ( ! function_exists( 'increase_theme_setup' ) ){
	
	function increase_theme_setup() {
		
		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/increase
		 */
		load_theme_textdomain( 'increase', get_template_directory() . '/languages' );
		
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style( array( 'assets/css/editor-style.css' ) );
		
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 320,
			'height'      => 160,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			
			'header_menu' => __( 'Header Menu', 'increase' ),
		
		) );
		
		
	}

}

add_action( 'after_setup_theme', 'increase_theme_setup' );


/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function increase_excerpt_length( $length ) {
	return 40;
}

add_filter( 'excerpt_length', 'increase_excerpt_length' );


/**
 * Register widget area.
 */
function increase_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'increase' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'increase' ),
		'before_widget' => '<section id="%1$s" class="widget mb-3 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'increase' ),
		'id'            => 'sidebar-footer',
		'description'   => __( 'Add widgets here to appear in your footer. All of the widgets are in a bootstrap .row class. For each added widget you need to add a .col-* class to customize the footer to your liking.', 'increase' ),
		'before_widget' => '<section id="%1$s" class="widget mb-3 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'increase_widgets_init' );


//ADAUGAT DE DANIEL MAI JOS

add_action( 'tgmpa_register', 'increase_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 */
function increase_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		
		array(
			'name'      => 'BuddyPress',
			'slug'      => 'buddypress',
			'required'  => true,
		),
	
	);
	
	
	$config = array(
		'id'           => 'increase',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		
		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'increase' ),
			'menu_title'                      => __( 'Install Plugins', 'increase' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'increase' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'increase' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'increase' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'increase'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'increase'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'increase'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'increase'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'increase'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'increase'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'increase'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'increase'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'increase'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'increase' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'increase' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'increase' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'increase' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'increase' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'increase' ),
			'dismiss'                         => __( 'Dismiss this notice', 'increase' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'increase' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'increase' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);
	
	tgmpa( $plugins, $config );
}

