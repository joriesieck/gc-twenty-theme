<?php
/**
 * GC Twenty.
 *
 * This file adds functions to the GC Twenty Theme.
 *
 * @package GC Twenty
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'gc_twenty_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function gc_twenty_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'gc_twenty_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function gc_twenty_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

add_action( 'after_setup_theme', 'gc_twenty_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function gc_twenty_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'gc_twenty_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function gc_twenty_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
// add_image_size( 'genesis-singular-images', 702, 526, true );	// js edit - we just want to use medium, so remove

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'gc_twenty_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function gc_twenty_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'gc_twenty_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function gc_twenty_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'gc_twenty_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function gc_twenty_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

//* js edit - Modify the read more link
add_filter('excerpt_more','sp_read_more_link');	// this is from the gc-ea theme
function sp_read_more_link() {
	return '<p><a class="more-link" href="' . get_permalink() . '">Continue Reading</a></p>';
}

//* js edit - full width content actually full width on homepage
add_action('genesis_after_header','gc_twenty_full_width_before', 0);
function gc_twenty_full_width_before() {
	if(is_front_page()) {
		echo '<div class="gc-twenty-front-page">';
	}
}
add_action('genesis_before_footer','gc_twenty_full_width_after', 0);
function gc_twenty_full_width_after() {
	if(is_front_page()) {
		echo '</div>';
	}
}

//* js edit - add 'after-post' widget from epik, plus category-specific ones
genesis_register_sidebar(array(
	'id' => 'after-post',
	'name' => __('After Post', 'gc-twenty'),
	'description' => __('This is the after post section', 'gc-twenty')
));
genesis_register_sidebar(array(
	'id' => 'culture-after-post',
	'name' => __('Culture After Post', 'gc-twenty'),
	'description' => __('This is the after post section for the Culture & Communication category', 'gc-twenty')
));
genesis_register_sidebar(array(
	'id' => 'gc-science-after-post',
	'name' => __('GC Science After Post', 'gc-twenty'),
	'description' => __('This is the after post section for the GC Science category', 'gc-twenty')
));
genesis_register_sidebar(array(
	'id' => 'learning-science-after-post',
	'name' => __('Learning Science After Post', 'gc-twenty'),
	'description' => __('This is the after post section for the Learning Science category', 'gc-twenty')
));
genesis_register_sidebar(array(
	'id' => 'learning-skills-after-post',
	'name' => __('Learning Skills After Post', 'gc-twenty'),
	'description' => __('This is the after post section for the Learning Skills category', 'gc-twenty')
));
genesis_register_sidebar(array(
	'id' => 'thinking-after-post',
	'name' => __('Thinking & Deciding After Post', 'gc-twenty'),
	'description' => __('This is the after post section for the Thinking & Deciding category', 'gc-twenty')
));
add_action('genesis_after_entry_content','gc_twenty_after_post');
function gc_twenty_after_post() {
	if(is_singular('post')) {
		genesis_widget_area('after-post',array(
			'before' => '<div class="after-post widget-area">',
			'after' => '</div>'
		));
		if(has_category('culture')) {
			genesis_widget_area('culture-after-post',array(
				'before' => '<div class="after-post culture-after-post widget-area">',
				'after' => '</div>'
			));
		}
		if(has_category('gc-science')) {
			genesis_widget_area('gc-science-after-post',array(
				'before' => '<div class="after-post gc-science-after-post widget-area">',
				'after' => '</div>'
			));
		}
		if(has_category('learning-science')) {
			genesis_widget_area('learning-science-after-post',array(
				'before' => '<div class="after-post learning-science-after-post widget-area">',
				'after' => '</div>'
			));
		}
		if(has_category('learning-skills')) {
			genesis_widget_area('learning-skills-after-post',array(
				'before' => '<div class="after-post learning-skills-after-post widget-area">',
				'after' => '</div>'
			));
		}
		if(has_category('thinking')) {
			genesis_widget_area('thinking-after-post',array(
				'before' => '<div class="after-post thinking-after-post widget-area">',
				'after' => '</div>'
			));
		}
	}
}

//* js edit - Remove description on paginated archives
add_action('genesis_before_content','gc_twenty_archive_description');
function gc_twenty_archive_description() {
	if(get_query_var('paged')>1) {
		remove_action('genesis_before_loop','genesis_do_taxonomy_title_description',15);
		remove_action('genesis_before_loop','genesis_do_author_title_description',15);
	}
}

//* js edit - add font from google api
wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=PT+Sans:400,700', array(), CHILD_THEME_VERSION );

//* js edit - remove genesis-singular-images, just use medium
remove_action( 'genesis_entry_content', 'genesis_do_singular_image', 8 );
add_action( 'genesis_entry_content', 'gc_twenty_do_singular_image', 8 );
function gc_twenty_do_singular_image() {
	if(is_singular()) {
		$img = genesis_get_image( array( 'size' => 'medium', 'fallback' => 'featured' ) );
		if(!empty($img)) {
			echo '<div class="singular-image entry-image">';
			echo $img;
			echo '</div>';
		}
	}
}

/**
 * Gutenberg scripts and styles for custom blocks
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
function be_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor',
		get_stylesheet_directory_uri() . '/assets/js/editor.js',
		array( 'wp-blocks', 'wp-dom' ),
		filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );

//* modify blockquote markup for easier styling
add_filter('render_block','gc_block_quote',10,2);
function gc_block_quote($block_content, $block) {
	if($block['blockName']==='core/quote') {
		$original = '<blockquote class="wp-block-quote">';
		$new = '<blockquote class="wp-block-quote"><div>';
		$block_content = str_replace($original, $new, $block_content);
		$original = '</blockquote>';
		$new = '</div></blockquote>';
		$block_content = str_replace($original, $new, $block_content);
	}
	return $block_content;
}
