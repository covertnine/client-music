<div id="wrapper-navbar" class="header-navbar" itemscope itemtype="http://schema.org/WebSite">

	<nav class="navbar navbar-expand-lg navbar-light">

		<div class="container-fluid">
			<?php

			if (has_custom_logo()) {
				the_custom_logo();
			}
			?>

			<div class="navbar-small-buttons">
				<?php if (!$c9_header_search) { ?>
					<div class="nav-search">
						<a href="#" class="btn-nav-search">
							<i class="fa fa-search"></i>
							<span class="sr-only"><?php esc_html_e('Search', 'c9-music'); ?></span>
						</a>
					</div>
				<?php
				}
				?>
				<div class="nav-order">
					<?php
					if (defined('WC_VERSION')) { //show cart contents if woo is active
						if (!get_theme_mod('c9_header_hide_cart', false)) {
							$count = WC()->cart->get_cart_contents_count();

							//if there are items in the cart, put a number in front of the icon
							if ($count != 0) {
								echo '<div class="nav-woocommerce" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_attr__('Shopping Cart', 'c9-music') . '" class="nav-link nav-shop-link"><span class="sr-only">' . esc_html__('View Cart', 'c9-music') . '</span> <i class="fa fa-shopping-cart fa-md"></i><span class="count">' . $count . '</span></a></div>';
							} else { //if not just put in an icon
								echo '<div class="nav-woocommerce" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="' . esc_attr__('Shopping Cart', 'c9-music') . '" class="nav-link nav-shop-link"><i class="fa fa-shopping-cart fa-md"></i> <span class="sr-only">' . esc_html__('View Cart', 'c9-music') . '</span></a></div>';
							} //end count check
						} // end hide cart setting check
					} //end if woocommerce is active
					?>
				</div>
				<?php if (has_nav_menu('primary')) { ?>

					<div class="nav-toggle">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Navigation', 'c9-music'); ?>">
							<i class="fa fa-bars"></i>
						</button>
					</div>
					<!--.nav-toggle-->
				<?php
				}
				?>
			</div><!-- .navbar-small-buttons-->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'collapse navbar-collapse justify-content-center navbar-expand-lg',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav nav nav-fill justify-content-between',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'link_before'	  => '<span class="nav-link-text">',
					'link_after'	  => '</span><span class="nav-highlight"></span>',
					'depth'           => 3,
					'walker'          => new c9_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .container -->

	</nav><!-- .site-navigation -->
</div><!-- .header-navbar-->
