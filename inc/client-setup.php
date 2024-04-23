<?php

/**
 * C9 Music Client Setup
 *
 * @package c9-music
 */

/* Custom Block Styles */
// Registers a style variation for headings (blueprints behind heading)
register_block_style(
	'core/list',
	array(
		'name'         => 'light-list',
		'label'        => __('White Text', 'c9-music'),
	)
);

/* add style for turning links white */
register_block_style(
	'c9-blocks/grid',
	array(
		'name'         => 'light-links',
		'label'        => __('White Links', 'c9-music'),
	)
);

add_action('after_setup_theme', 'c9_client_setup');
if (!function_exists('c9_client_setup')) {

	function c9_client_setup()
	{

		// Make specific theme colors available in the editor.
		add_theme_support('editor-color-palette', array(
			array(
				'name' => 'faded-red',
				'color'    => '#a74e4e',
				'slug' => 'c9music-faded-red',
			),
			array(
				'name' => 'white',
				'color'    => '#ffffff',
				'slug' => 'c9music-white',
			),
			array(
				'name' => 'black',
				'color'    => '#000000',
				'slug'    => 'c9music-black',
			),
			array(
				'name' => 'dark-gray',
				'color'    => '#2f2f2f',
				'slug'    => 'c9music-dark-gray',
			),
			array(
				'name' => 'red',
				'color'    => '#f90000',
				'slug'    => 'c9music-red',
			),
			array(
				'name' => 'mint-green',
				'color'    => '#4caab1',
				'slug'    => 'c9music-mint-green',
			),
		));
	}
}
/**
 * Registering block patterns category with core Gutenberg blocks
 */
add_action('init', 'c9music_register_block_patterns_cat');
function c9music_register_block_patterns_cat()
{
	if (class_exists('WP_Block_Patterns_Registry')) {
		register_block_pattern_category(
			'COVERT NINE',
			array('label' => __('C9 All Patterns', 'c9-music'))
		);
		register_block_pattern_category(
			'landingpage',
			array('label' => __('C9 Page Templates', 'c9-music'))
		);
		register_block_pattern_category(
			'Video',
			array('label' => __('C9 Video', 'c9-music'))
		);
		register_block_pattern_category(
			'Audio',
			array('label' => __('C9 Audio', 'c9-music'))
		);
	}
}
