<?php
/* WooCommerce Specific filters and functionality for C9 */

add_action( 'after_setup_theme', 'c9_add_woocommerce_support' );
function c9_add_woocommerce_support() {

	add_theme_support( 'woocommerce' );
    // remove related products from single
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    remove_theme_support( 'wc-product-gallery-zoom' );
    //remove_theme_support( 'wc-product-gallery-lightbox' );
    remove_theme_support( 'wc-product-gallery-slider' );

}

/* remove jetpack messages */
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );

// $path defaults to 'woocommerce/' (in client folder)
add_filter('woocommerce_template_path', function () {
    return 'client/woocommerce/';
});

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/* fixes gravity forms ugly ass spinner */
add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );
function gf_spinner_replace( $image_src, $form ) {
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}

/* rename menu item for my subscription */
add_filter ( 'woocommerce_account_menu_items', 'c9_rename_subscription' );
function c9_rename_subscription( $menu_links ){

	// $menu_links['TAB ID HERE'] = 'NEW TAB NAME HERE';
	$menu_links['subscriptions'] = 'Subscription Fees';

	return $menu_links;
}


/* Note the low hook priority, this should give to your other plugins the time to add their own items */
// add_filter( 'woocommerce_account_menu_items', 'c9_menu_items', 99, 1 );
// function c9_menu_items( $items ) {
//     $my_items = array(
//     //  endpoint   => label
//         'campaign-request' => __( 'Campaign Request', 'c9' ),
//     );

//     $my_items = array_slice( $items, 0, 1, true ) +
//         $my_items +
//         array_slice( $items, 1, count( $items ), true );

//     return $my_items;
// }

/****************************************************************************************/

