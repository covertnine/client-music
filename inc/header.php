<div id="wrapper-navbar" class="header-navbar" itemscope itemtype="http://schema.org/WebSite">

	<nav class="navbar navbar-expand-lg navbar-light">

		<div class="container">
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
				if (has_nav_menu('primary')) { ?>

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
					'link_after'	  => '<span class="nav-highlight"></span>',
					'depth'           => 2,
					'walker'          => new c9_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .container -->

	</nav><!-- .site-navigation -->
</div><!-- .header-navbar-->
