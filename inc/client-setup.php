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

		global $wp_filesystem;
		// Initialize the WP filesystem, no more using 'file-put-contents' function
		if (empty($wp_filesystem)) {
			require_once(ABSPATH . '/wp-admin/includes/file.php');
			require_once(ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php');
			require_once(ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php');
			WP_Filesystem();
		}

		/**
		 * Apearance > Customizer for fresh sites
		 * Customizer Sample Content
		 */
		add_theme_support(
			'starter-content',
			array(
				'attachments' => array(
					'logo' => array(
						'post_title' => _x('C9 Music Logo', 'C9 Music Logo', 'c9-music'),
						'file' => '/client/client-assets/img/c9-music-logo.svg',
					),
					'featured-image-1' => array(
						'post_title' => _x('Featured Image 1', 'C9 Featured Image 1', 'c9-music'),
						'file' => '/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v1.jpg',
					),
					'featured-image-populate_roles_260()' => array(
						'post_title' => _x('Featured Image populate_roles_260()', 'C9 Featured Image 2', 'c9-music'),
						'file' => '/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v2.jpg',
					),
					'featured-image-3' => array(
						'post_title' => _x('Featured Image 3', 'C9 Featured Image 3', 'c9-music'),
						'file' => '/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v3.jpg',
					),
					'featured-image-4' => array(
						'post_title' => _x('Featured Image 4', 'C9 Featured Image 4', 'c9-music'),
						'file' => '/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v4.jpg',
					),
					'featured-image-5' => array(
						'post_title' => _x('Featured Image 5', 'C9 Featured Image 5', 'c9-music'),
						'file' => '/client/client-assets/img/widescreen-homepage-hero-1920x1200-v2.jpg',
					),
				),
				'posts'	=> array(
					'home'			=> array(
						'comment_status'	=> 'closed',
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/home.html')
					),
					'about'			=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('About', 'c9-music'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/about.html')
					),
					'setup'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Setup', 'c9-music'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/setup.html')
					),
					'styleguide'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Style Guide', 'c9-music'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/styleguide.html')
					),
					'blog'			=> array(
						'post_content'			=> __('This page will show all of the blog posts once you have populated your database with blog items.', 'c9-music')
					),
					'first-blog-post' => array(
						'post_type' => 'post',
						'post_title' => __('First Blog Post', 'c9-music'),
						'thumbnail' => '{{featured-image-1}}',
					),
					'second-blog-post' => array(
						'post_type' => 'post',
						'post_title' => __('Second Blog Post', 'c9-music'),
						'thumbnail' => '{{featured-image-2}}',
					),
					'third-blog-post' => array(
						'post_type' => 'post',
						'post_title' => __('Third Blog Post', 'c9-music'),
						'thumbnail' => '{{featured-image-3}}',
					),
					'fourth-blog-post' => array(
						'post_type' => 'post',
						'post_title' => __('Fourth Blog Post', 'c9-music'),
						'thumbnail' => '{{featured-image-4}}',
					),
					'fifth-blog-post' => array(
						'post_type' => 'post',
						'post_title' => __('Fifth Blog Post', 'c9-music'),
						'thumbnail' => '{{featured-image-5}}',
					)
				),
				'options'			=> array(
					'show_on_front'		=> 'page',
					'page_on_front'		=> '{{home}}',
					'page_for_posts' 	=> '{{blog}}',
					'blogname'			=> 'C9 Music',
					'blogdescription'	=> __('C9 Music is a block-based theme for WordPress 5 that uses Bootstrap\'s responsive grid system, a single level dropdown menu navbar, Gutenberg blocks with custom pagination and WooCommerce.', 'c9-music'),
				),
				'theme_mods'		=> array(
					'custom_logo' 			=> '/client/client-assets/img/c9-music-logo.svg',
					'c9_show_search'		=> 'show',
					'c9_copyright_content'	=> '&copy; 2020. <a href="https://www.covertnine.com" title="Web design company in Chicago" target="_blank">WordPress Website by COVERT NINE</a>.',
					'c9_default_font'		=> 'yes',
					'c9_heading_font'		=> 'Rubik:ital,wght@0,300;0,400;0,700;1,400;1,700',
					'c9_subheading_font'	=> 'Rubik:ital,wght@0,300;0,400;0,700;1,400;1,700',
					'c9_body_font'			=> 'Rubik:ital,wght@0,300;0,400;0,700;1,400;1,700',
					'c9_author_visible'		=> 'hide',
					'c9_blog_sidebar'		=> 'hide',
					'c9_archive_sidebar'	=> 'hide',
					'c9_show_social'		=> 'show',
					'c9_twitter'			=> '#',
					'c9_instagram'			=> '#',
					'c9_spotify'			=> '#',
					'c9_youtube'			=> '#',
					'c9_linkedin'			=> '#',


				),
				'nav_menus'		=> array(
					'primary'		=> array(
						'name'			=>	__('Top Navigation Menu', 'c9-music'),
						'items'			=> array(
							'page_home',
							'page_about'	=> array(
								'type'		=> 'post_type',
								'object'	=> 'page',
								'object_id'	=> '{{about}}',
							),
							'page_setup'	=> array(
								'type'		=> 'post_type',
								'object'	=> 'page',
								'object_id'	=> '{{setup}}',
							),
							'page_styleguide'	=> array(
								'type'		=> 'post_type',
								'object'	=> 'page',
								'object_id'	=> '{{styleguide}}',
							),
							'page_blog'
						),
					),
				),
				'widgets'	=> array(
					'footerfull'	=> array(
						'c9music_resources'	=> array(
							'text',
							array(
								'title'	=> __('Secondary Menu', 'c9-music'),
								'text'	=> '<ul id="menu-footer-resources" class="menu">
									<li class="menu-item">
										<a href="{{setup}}">Setup</a>
									</li>
									<li class="menu-item">
										<a href="{{blog}}">Blog</a>
									</li>
									<li class="menu-item">
										<a href="{{styleguide}}">Style Guide</a>
									</li>
									<li class="menu-item">
										<a href="{{home}}">Home</a>
									</li>
								</ul>'
							)
						),
						'c9music_company'	=> array(
							'text',
							array(
								'title'	=> __('Information Menu', 'c9-music'),
								'text'	=> '<ul id="menu-footer-company" class="menu">
									<li class="menu-item">
										<a href="#">Placeholder Link</a>
									</li>
									<li class="menu-item">
										<a href="#">Sample Menu Link</a>
									</li>
									<li class="menu-item">
										<a href="#">Test Page Link</a>
									</li>
									<li class="menu-item">
										<a href="#">Contact</a>
									</li>
									<li class="menu-item">
										<a href="#">Privacy</a>
									</li>
								</ul>'
							)
						),
						'meta_custom' => array('meta', array(
							'title'	=> __('WordPress Meta', 'c9-music'),
						)),
						'c9music_about' => array(
							'text',
							array(
								'title'	=> __('About C9-Music', 'c9-music'),
								'text'	=> __('Be sure to activate the <strong>C9 Blocks Plugin</strong> during theme setup. The blocks plugin includes the custom WordPress blocks for tabs, toggles, and the responsive grid system that makes the theme look super duper. WooCommerce is also fully supported for selling your stuff!', 'c9-music')
							)
						)
					),
					'right-sidebar'	=> array(
						'search',
						'c9music_about' => array(
							'text',
							array(
								'title'	=> __('About C9-Music', 'c9-music'),
								'text'	=> __('Be sure to activate the <strong>C9 Blocks Plugin</strong> and <strong>C9 Admin Dashboard</strong> during theme setup. The blocks plugin includes the custom WordPress blocks for tabs, toggles, and the responsive grid system that makes the theme look super duper.', 'c9-music')
							)
						),
						'meta_custom' => array('meta', array(
							'title'	=> 'Meta Widget',
						)),
					),
					'left-sidebar'	=> array(
						'search',
						'c9music_about' => array(
							'text',
							array(
								'title'	=> __('About C9-Music', 'c9-music'),
								'text'	=> __('Be sure to activate the <strong>C9 Blocks Plugin</strong> and <strong>C9 Admin Dashboard</strong> during theme setup. The blocks plugin includes the custom WordPress blocks for tabs, toggles, and the responsive grid system that makes the theme look super duper.', 'c9-music')
							)
						),
						'meta_custom' => array('meta', array(
							'title'	=> __('Meta Widget', 'c9-music'),
						)),
					),
				),
			)
		);
	}
}
