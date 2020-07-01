<?php
/**
 * GC Twenty child theme.
 *
 * Theme supports.
 *
 * @package GC Twenty
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/gc-twenty/
 */

return [
	'genesis-custom-logo'             => [
		'height'      => 120,
		'width'       => 700,
		'flex-height' => true,
		'flex-width'  => true,
	],
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	],
	'genesis-accessibility'           => [
		'drop-down-menu',
		'headings',
		'search-form',
		'skip-links',
	],
	'genesis-lazy-load-images'        => '',
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 3,
	'genesis-menus'                   => [
		'primary'   => __( 'Header Menu', 'gc-twenty' ),
		'secondary' => __( 'Footer Menu', 'gc-twenty' ),
	],
];
