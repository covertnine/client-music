<?php

/**
 * Client-specific scripts for frontend
 *
 * @package c9-togo
 */

if (!function_exists('c9music_client_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function c9music_client_scripts()
	{

		$c9_default_font = get_theme_mod('c9_default_font');

		if ($c9_default_font == 'no') {
			wp_enqueue_style('c9music-font-default', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,700;1,400;1,700&display=swap', array('c9-styles'));
		}

		wp_enqueue_style('c9music-client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.min.css', array('c9-styles'));
		wp_enqueue_script('c9music-client-scripts', get_template_directory_uri() . '/client/client-assets/custom-client.js', array('jquery', 'c9-scripts'), false, true);
		wp_add_inline_style('c9music-client-styles', c9_music_custom_css_output());
	}
} // endif function_exists( 'client_scripts' ).
add_action('wp_enqueue_scripts', 'c9music_client_scripts', 99);
