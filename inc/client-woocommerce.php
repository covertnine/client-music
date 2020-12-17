<?php
/* WooCommerce Specific filters and functionality for C9 Music */

add_action('after_setup_theme', 'c9_add_woocommerce_support');
function c9_add_woocommerce_support()
{

	add_theme_support('woocommerce');
	// remove related products from single
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}

/****************************************************************************************/
/******** Adding shopping cart icon to the navigation
/****************************************************************************************/

// append shopping cart if enabled
add_filter('wp_nav_menu_items', 'c9music_add_woocommerce_icon', 9, 2);
function c9music_add_woocommerce_icon($items, $args)
{

	if (defined('WC_VERSION')) { //show cart contents if woo is active
		if (!get_theme_mod('c9_header_hide_cart', false)) {

			$count = esc_attr(WC()->cart->get_cart_contents_count());

			//if there are items in the cart, put a number in front of the icon
			if ($count != 0) {
				$items .= '<li itemscope="itemscope" class="nav-woocommerce menu-item nav-item" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_html__('Shopping Cart', 'c9-music') . '" class="nav-link"><span class="view-cart sr-only">' . esc_html__('View Cart', 'c9-music') . '</span> <i class="fa fa-shopping-cart fa-md"></i><span class="count">' . $count . '</span></a></li>';
			} else { //if not just put in an icon
				$items .= '<li itemscope="itemscope" class="nav-woocommerce menu-item nav-item" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_html__('Shopping Cart', 'c9-music') . '" class="nav-link"><span class="view-cart sr-only">' . esc_html__('View Cart', 'c9-music') . '</span> <i class="fa fa-shopping-cart fa-md"></i></a></li>';
			} //end count check

		} //end checking active theme menu location
	} //end checking if woocommerce is active
	return $items;
}

/****************************************************************************************/
// $path defaults to 'woocommerce/' (in client folder)
/****************************************************************************************/
add_filter('woocommerce_template_path', function () {
	return 'client/woocommerce/';
});


/****************************************************************************************/
//remove related items
/****************************************************************************************/
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/****************************************************************************************/
/******** Adding filter to look for client folder templates before child theme templates
/****************************************************************************************/
add_filter('template_include', function ($template) {
	$path = explode('/', $template);
	$template_chosen = end($path);
	$grandchild_template = get_template_directory() . '/client/' . $template_chosen;
	if (file_exists($grandchild_template)) {
		$template = $grandchild_template;
	}
	return $template;
}, 99);
/****************************************************************************************/
