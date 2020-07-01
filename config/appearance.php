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
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$gc_twenty_link_color = get_theme_mod(
	'gc_twenty_link_color',
	$gc_twenty_default_colors['link']
);

$gc_twenty_accent_color = get_theme_mod(
	'gc_twenty_accent_color',
	$gc_twenty_default_colors['accent']
);

$gc_twenty_link_color_contrast   = gc_twenty_color_contrast( $gc_twenty_link_color );
$gc_twenty_link_color_brightness = gc_twenty_color_brightness( $gc_twenty_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $gc_twenty_link_color,
	'button-color'         => $gc_twenty_link_color_contrast,
	'button-outline-hover' => $gc_twenty_link_color_brightness,
	'link-color'           => $gc_twenty_link_color,
	'default-colors'       => $gc_twenty_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'gc-twenty' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $gc_twenty_link_color,
		],
		[
			'name'  => __( 'Accent color', 'gc-twenty' ),
			'slug'  => 'theme-secondary',
			'color' => $gc_twenty_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'gc-twenty' ),
			'size' => 12,
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
