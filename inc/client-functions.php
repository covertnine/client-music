<?php
// Band Client Functions

/****************************************************************************************/
/***************************** load client scripts for frontend styling
/****************************************************************************************/
if (!function_exists('client_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function client_scripts()
	{

		wp_enqueue_style('client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.min.css', array('c9-styles'));
		wp_enqueue_script('client-scripts', get_template_directory_uri() . '/client/client-assets/custom-client.js', array('jquery'), '', true);
	}
} // endif function_exists( 'client_scripts' ).
add_action('wp_enqueue_scripts', 'client_scripts', 99);

/* add client compiled files to gutenberg editor */
if (!function_exists('c9_client_editor_style')) {
	function c9_client_editor_style()
	{

		wp_enqueue_style('c9-client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.css');
		wp_enqueue_style('c9-client-editor-styles', get_template_directory_uri() . '/client/client-assets/dist/client-editor.min.css', 99999);
	}
	add_action('enqueue_block_editor_assets', 'c9_client_editor_style', 99999999);
} //end if function exists


add_action('after_setup_theme', 'c9_client_setup');
if (!function_exists('c9_client_setup')) {

	function c9_client_setup()
	{
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support('post-formats', array(
			'video',
			'quote'
		));
	}
}

/****************************************************************************************/
/* WooCommerce */
/****************************************************************************************/
include("woocommerce-functions.php");
/****************************************************************************************/
