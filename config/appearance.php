<?php
/**
 * GC Twenty appearance settings.
 *
 * @package GC Twenty
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

$gc_twenty_default_colors = [
	'light-gray' => '#f2f2f2',	// site bg
	'dark-gray' => '#444',	// text
	'burgundy'   => '#800020',	// links
	'dark-blue' => '#293f5e',	// header, buttons, etc
	'medium-blue' => '#466ba0',	// block quotes
	'light-blue' => '#a6bbd8', 	// fancy quote box bg
	'super-light-blue' => '#edf1f7',	// references bg
];

$gc_twenty_link_color = get_theme_mod(
	'gc_twenty_link_color',
	$gc_twenty_default_colors['burgundy']
);

$gc_twenty_button_color = get_theme_mod(
	'gc_twenty_button_color',
	$gc_twenty_default_colors['dark-blue']
);

// $gc_twenty_accent_color = get_theme_mod(
// 	'gc_twenty_accent_color',
// 	$gc_twenty_default_colors['accent']
// );

$gc_twenty_link_color_contrast   = gc_twenty_color_contrast( $gc_twenty_link_color );
$gc_twenty_link_color_brightness = gc_twenty_color_brightness( $gc_twenty_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $gc_twenty_button_color,
	'button-color'         => '#fff',
	// 'button-outline-hover' => $gc_twenty_link_color_brightness,
	'link-color'           => $gc_twenty_link_color,
	'default-colors'       => $gc_twenty_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Dark Blue', 'gc-twenty' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'dark-blue',
			'color' => $gc_twenty_default_colors['dark-blue'],
		],
		[
			'name'  => __( 'Medium Blue', 'gc-twenty' ),
			'slug'  => 'medium-blue',
			'color' => $gc_twenty_default_colors['medium-blue'],
		],
		[
			'name'  => __( 'Light Blue', 'gc-twenty' ),
			'slug'  => 'light-blue',
			'color' => $gc_twenty_default_colors['light-blue'],
		],
		[
			'name'  => __( 'Super Light Blue', 'gc-twenty' ),
			'slug'  => 'super-light-blue',
			'color' => $gc_twenty_default_colors['super-light-blue'],
		],
		[
			'name'  => __( 'Burgundy', 'gc-twenty' ),
			'slug'  => 'burgundy',
			'color' => $gc_twenty_default_colors['burgundy'],
		]
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'gc-twenty' ),
			'size' => 14,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'gc-twenty' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'gc-twenty' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'gc-twenty' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
