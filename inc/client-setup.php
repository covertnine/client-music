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
						'post_content'		=>  wp_remote_get(get_template_directory_uri() . '/client/content/home.html')[body]
					),
					'about'			=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('About', 'c9-music'),
						'post_content'		=>  wp_remote_get(get_template_directory_uri() .  '/client/content/about.html')[body]
					),
					'setup'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Setup', 'c9-music'),
						'post_content'		=>  wp_remote_get(get_template_directory_uri() .  '/client/content/setup.html')[body]
					),
					'styleguide'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Style Guide', 'c9-music'),
						'post_content'		=>  wp_remote_get(get_template_directory_uri() .  '/client/content/styleguide.html')[body]
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
					'custom_logo' 			=> '{{logo}}',
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
						))
					)
				)
			)
		);
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
			array('label' => __('C9 Page Template', 'c9-music'))
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
/**
 * Registering block patterns with core Gutenberg blocks
 */
add_action('init', 'c9music_register_block_patterns');
function c9music_register_block_patterns()
{
	if (class_exists('WP_Block_Patterns_Registry')) {

		register_block_pattern(
			'c9-music/c9-coming-soon-core',
			array(
				'title'			=> __('Coming Soon Opt-in', 'c9-music'),
				'description' 	=> __('Start building your audience before you launch with a coming soon page that captures emails or phone numbers.', 'c9-music'),
				'keywords'		=> array('landing page', 'page', 'template', 'splash', 'coming soon'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v4.jpg\",\"id\":2789,\"dimRatio\":70,\"customOverlayColor\":\"#050505\",\"minHeight\":995,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\r\n<div class=\"wp-block-cover alignfull has-background-dim-70 has-background-dim\" style=\"background-image:url(/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v4.jpg);background-color:#050505;min-height:995px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"25%\"} -->\r\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"width\":\"50%\"} -->\r\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\r\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/feather-logo-gradient-rb.svg\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure></div>\r\n<!-- /wp:image -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->\r\n<h1 class=\"has-text-align-center\">Something Great is Coming Soon</h1>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:spacer {\"height\":60} -->\r\n<div style=\"height:60px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer -->\r\n\r\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"small\"} -->\r\n<p class=\"has-text-align-center has-small-font-size\">Click the button below to get notified via email when we're up and running. A good marketer would put the email or text message signup form right here on the page...</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:spacer {\"height\":10} -->\r\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer -->\r\n\r\n<!-- wp:buttons {\"align\":\"center\"} -->\r\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"c9music-mint-green\",\"textColor\":\"c9music-black\"} -->\r\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-c-9-music-black-color has-c-9-music-mint-green-background-color has-text-color has-background\">Get Notifications</a></div>\r\n<!-- /wp:button -->\r\n\r\n<!-- wp:button {\"textColor\":\"color-white\",\"className\":\"is-style-outline\"} -->\r\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-white-color has-text-color\" href=\"/\">Return to HoMe</a></div>\r\n<!-- /wp:button --></div>\r\n<!-- /wp:buttons --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column {\"width\":\"25%\"} -->\r\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns --></div></div>\r\n<!-- /wp:cover -->",
				'categories'	=> array('COVERT NINE', 'header', 'buttons', 'text', 'landingpage', 'columns')
			)
		);
		register_block_pattern(
			'c9-music/c9-video-embed-core',
			array(
				'title'			=> __('Video Embed + YouTube Link', 'c9-music'),
				'description' 	=> __('Feature a video file you upload with a link to a YouTube video link.', 'c9-music'),
				'content'		=> "<!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaId\":1935,\"mediaLink\":\"#\",\"mediaType\":\"video\",\"style\":{\"color\":{\"background\":\"#f3f3f3\"}}} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile has-background\" style=\"background-color:#f3f3f3\"><figure class=\"wp-block-media-text__media\"><video controls src=\"/wp-content/themes/c9-music/client/client-assets/video/c9-website-2019-bg.mp4\"></video></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":3} -->\n<h3>Using C9 Blocks Plugin</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"placeholder\":\"Content…\",\"fontSize\":\"small\"} -->\n<p class=\"has-small-font-size\">If you haven't, we highly recommend installing the C9 Blocks and C9 Admin Dashboard Plugins. <strong>For animations, and additional child theme features like a single page animated website, get on the C9 email list.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"https://www.youtube.com/watch?v=8qyP5abkoe4\" target=\"_blank\" rel=\"noreferrer noopener\">YouTube Video Pop</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text -->",
				'categories'	=> array('COVERT NINE', 'Video', 'header', 'buttons', 'Audio')
			)
		);

		register_block_pattern(
			'c9-music/c9-information-dialog-core',
			array(
				'title'			=> __('Information Dialog Two Buttons', 'c9-music'),
				'description' 	=> __('Highlight important information, and link to two separate places with buttons.', 'c9-music'),
				'content'		=> "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#f7f7f7\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":1,\"fontSize\":\"huge\"} -->\n<h1 class=\"has-huge-font-size\"><strong><span class=\"has-inline-color has-color-yellow-color\">C9</span></strong> — Group Block</h1>\n<!-- /wp:heading -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">COVERT NINE - The nine essentials ingredients for good digital marketing. Copywriting, Design, Development, SEO, PPC, Social Media, Email, Videos, Photograph</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Learn More</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">Contact Us</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:spacer {\"height\":20} -->\n<div style=\"height:20px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div></div>\n<!-- /wp:group -->",
				'categories'	=> array('COVERT NINE', 'text', 'buttons')
			)
		);
		register_block_pattern(
			'c9-music/c9-spotify-core',
			array(
				'title'			=> __('Spotify Embed, Track Listing + Button', 'c9-music'),
				'description' 	=> __('Embed a playlist, track listing or lyrics, and a button to open it up!', 'c9-music'),
				'keywords'		=> array('landing page', 'spotify', 'template', 'embed', 'audio'),
				'content'		=> "<!-- wp:columns {\"backgroundColor\":\"color-info\"} -->\n<div class=\"wp-block-columns has-color-info-background-color has-background\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:embed {\"url\":\"https://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":5} -->\n<h5 class=\"has-text-align-left\">Spotify Stream Block</h5>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Track Listing Song Name</li><li>Under Control</li><li>The October</li><li>Kids \&amp; Knives<br><strong>Savile Remix</strong></li><li>Out of Season (Acoustic)</li><li>1981 (Demo)</li><li>The November</li></ul>\n<!-- /wp:list -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":25,\"textColor\":\"color-success\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-success-color has-text-color\" href=\"https://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\" style=\"border-radius:25px\">Listen on Spotify</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Audio')
			)
		);
		register_block_pattern(
			'c9-music/c9-podcast-embed-core',
			array(
				'title'			=> __('Podcast Episode', 'c9-music'),
				'description' 	=> __('Feature a show photo, audio embed file, and everything you need for a podcast episode post.', 'c9-music'),
				'keywords'		=> array('landing page', 'spotify', 'template', 'embed', 'audio'),
				'content'		=> "<!-- wp:columns {\"style\":{\"color\":{\"background\":\"#f3f3f3\"}}} -->\n<div class=\"wp-block-columns has-background\" style=\"background-color:#f3f3f3\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"70%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:70%\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"fontSize\":\"large\"} -->\n<h1 class=\"has-text-align-center has-large-font-size\">♫ Episode 919 ♫<br><span class=\"has-inline-color has-c-9-music-mint-green-color\">Don't listen to Pew-Pew.m4a</span></h1>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Content…\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-center has-small-font-size\">If you haven\'t, we highly recommend installing the <a href=\"#\">C9 Blocks</a> and <a href=\"#\">C9 Admin Dashboard Plugins</a>. <strong>For animations, and additional child theme features like a single page animated website, get on the C9 email list.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong><strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">✓</span></strong> Song Name</strong> - Track Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">✓</span> Song Name</strong> - Track Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">✓</span> Song Name</strong> - Track Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">⬇</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":19} -->\n<div style=\"height:19px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"https://www.youtube.com/watch?v=8qyP5abkoe4\" target=\"_blank\" rel=\"noreferrer noopener\">YouTube Video Pop</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"id\":1975,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-album-b.jpg\" alt=\"\" class=\"wp-image-1975\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:audio {\"id\":1974} -->\n<figure class=\"wp-block-audio\"><audio controls src=\"/wp-content/themes/c9-music/client/client-assets/audio/pew-pew.m4a\"></audio></figure>\n<!-- /wp:audio --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Video', 'header', 'buttons', 'Audio', 'landingpage')
			)
		);
		register_block_pattern(
			'c9-music/c9-stream-discography-core',
			array(
				'title'			=> __('Stream Discography', 'c9-music'),
				'description' 	=> __('Embed audio from your favorite streaming service to show off a season or discography of work', 'c9-music'),
				'keywords'		=> array('landing page', 'spotify', 'template', 'embed', 'audio', 'music', 'podcast', 'discography', 'albums'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v3.jpg\",\"id\":148,\"minHeight\":546,\"minHeightUnit\":\"px\",\"contentPosition\":\"center center\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim\" style=\"background-image:url(/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v3.jpg);min-height:546px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->\n<h1 class=\"has-text-align-center\">Stream <span class=\"has-inline-color has-c-9-music-mint-green-color\">Discography</span></h1>\n<!-- /wp:heading --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:spacer {\"height\":40} -->\n<div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Of all the things I've lost, I miss my mind the most.</p><cite>Ozzie Osbourne</cite></blockquote>\n<!-- /wp:quote --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:spacer {\"height\":40} -->\n<div style=\"height:40px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns {\"backgroundColor\":\"c9music-black\"} -->\n<div class=\"wp-block-columns has-c-9-music-black-background-color has-background\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":3157,\"sizeSlug\":\"large\",\"className\":\"img-fluid\"} -->\n<figure class=\"wp-block-image size-large img-fluid\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-album-a-1024x1024.jpg\" alt=\"\" class=\"wp-image-3157\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:embed {\"url\":\"https://open.spotify.com/album/49Q3EfStlDspsaOo8VAgtW?si=AFBKe_uuSPK80YWuxOODGA\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/49Q3EfStlDspsaOo8VAgtW?si=AFBKe_uuSPK80YWuxOODGA\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":3158,\"sizeSlug\":\"large\",\"className\":\"img-fluid\"} -->\n<figure class=\"wp-block-image size-large img-fluid\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-album-b-1024x1024.jpg\" alt=\"\" class=\"wp-image-3158\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:embed {\"url\":\"https://open.spotify.com/album/1nzDVfQopF9YBkpPAfUck3?si=lCYs7A3mRhuW34qG0YB_YA\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/1nzDVfQopF9YBkpPAfUck3?si=lCYs7A3mRhuW34qG0YB_YA\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":3159,\"sizeSlug\":\"large\",\"className\":\"img-fluid\"} -->\n<figure class=\"wp-block-image size-large img-fluid\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-album-c-1024x1024.jpg\" alt=\"\" class=\"wp-image-3159\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:embed {\"url\":\"https://open.spotify.com/album/5baJxk2fGaLorySaf6173S?si=8-F5eOhyQ1ut_CkWnAUonQ\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/5baJxk2fGaLorySaf6173S?si=8-F5eOhyQ1ut_CkWnAUonQ\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'text', 'header', 'buttons', 'Audio', 'landingpage')
			)
		);
		register_block_pattern(
			'c9-music/c9-tour-core',
			array(
				'title'			=> __('Tour Schedule', 'c9-music'),
				'description' 	=> __('Add a bunch of dates and places and links to a table with a nice header and FAQ, cause tours are coming back!', 'c9-music'),
				'keywords'		=> array('landing page', 'spotify', 'template', 'embed', 'audio', 'music', 'shows', 'schedule', 'table'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v2.jpg\",\"id\":1895,\"overlayColor\":\"c9music-black\",\"focalPoint\":{\"x\":\"0.49\",\"y\":\"0.67\"},\"minHeight\":849,\"minHeightUnit\":\"px\",\"contentPosition\":\"bottom center\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-c-9-music-black-background-color has-background-dim has-custom-content-position is-position-bottom-center\" style=\"background-image:url(/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v2.jpg);min-height:849px;background-position:49% 67%\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:66.66%\"><!-- wp:image {\"id\":1955,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/feather-logo-gradient-rb.svg\" alt=\"\" class=\"wp-image-1955\" width=\"51\" height=\"38\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"fontSize\":\"large\"} -->\n<h1 class=\"has-text-align-left has-large-font-size\">Tour – OF THE CENTURY<br><span class=\"has-inline-color has-c-9-music-mint-green-color\">told you we'd be back</span></h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"small\"} -->\n<p class=\"has-small-font-size\">↓ SCROLL FOR THE DATES AND LISTEN TO THE JAMS WHILE YOU DO!</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:embed {\"url\":\"https://open.spotify.com/album/1EFnZuLUzXx0B6ZsL9aqum?si=mGx9OSaiSJ2T2GlAojjwDw\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/1EFnZuLUzXx0B6ZsL9aqum?si=mGx9OSaiSJ2T2GlAojjwDw\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:spacer {\"height\":17} -->\n<div style=\"height:17px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:group {\"style\":{\"color\":{\"background\":\"#f7f7f7\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"70%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:70%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":35}}} -->\n<h1 style=\"font-size:35px\"><strong><span class=\"has-inline-color has-c-9-music-red-color\">C9</span></strong> — Tour Block Pattern</h1>\n<!-- /wp:heading -->\n\n<!-- wp:spacer {\"height\":23} -->\n<div style=\"height:23px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">COVERT NINE - The nine essentials ingredients for good digital marketing. Copywriting, Design, Development, SEO, PPC, Social Media, Email, Videos, Photograph</h3>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator -->\n\n<!-- wp:paragraph -->\n<p><strong>Tickets and on-sale information would be great in here. </strong>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Frequently asked questions would go great in here.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>All content editing is done inline. </strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Have fun!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">GET TICKETS</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">ASK TIRESOME QUESTIONS</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"60%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:60%\"><!-- wp:table {\"className\":\"is-style-stripes\"} -->\n<figure class=\"wp-block-table is-style-stripes\"><table><thead><tr><th>Date</th><th>City</th><th class=\"has-text-align-center\" data-align=\"center\">Tickets</th></tr></thead><tbody><tr><td>6-7-2021</td><td>Chicago, IL</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>6-8-2021</td><td>Chicago, IL</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>6-14-2021</td><td>Savannah, GA</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"\">Buy Tickets</a></td></tr><tr><td>6-18-2021</td><td>Los Angeles, CA</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-1-2021</td><td>New York City!</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-12-2021</td><td>Paris, France</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-18-2021</td><td>Washington DC</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-31-2021</td><td>Chicago, IL</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr><tr><td>8-2-2021</td><td>Milwaukee, WI</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr><tr><td>8-4-2021</td><td>Portland, OR</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr><tr><td>8-6-2021</td><td>Seattle, WA</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr></tbody></table></figure>\n<!-- /wp:table --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:spacer {\"height\":35} -->\n<div style=\"height:35px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->",
				'categories'	=> array('COVERT NINE', 'text', 'header', 'buttons', 'Audio', 'landingpage')
			)
		);
		register_block_pattern(
			'c9-music/c9-article-450-core',
			array(
				'title'			=> __('Article 450 Words', 'c9-music'),
				'description' 	=> __('Get your article laid out before writing with a 450 word placeholder and some imagery to tet you started.', 'c9-music'),
				'content'		=> "<!-- wp:image {\"align\":\"full\",\"id\":1908,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image alignfull size-full\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-homepage-hero-1920x1200-v2.jpg\" alt=\"\" class=\"wp-image-1908\"/><figcaption><strong>Full Width Image Block</strong> C9 Logo + Photo CC0.</figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:spacer {\"height\":57} -->\n<div style=\"height:57px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"><!-- wp:paragraph -->\n<p><strong>Author Name</strong><br>Author Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":6,\"textColor\":\"c9music-black\"} -->\n<h6 class=\"has-c-9-music-black-color has-text-color\">December 16th, 2084</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"dropCap\":true} -->\n<p class=\"has-drop-cap\">Dum velit laoreet id donec. In fermentum posuere urna nec tincidunt praesent. Amet purus gravida quis blandit turpis cursus in. Tincidunt tortor aliquam nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Paragraphs inside of columns</strong>. Cras fermentum odio. Facilisi nullam vehicula ipsum a arcu cursus vitae. Id leo in vitae turpis massa sed elementum tempus. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. </p><cite>No one actually said this--Tim</cite></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:audio {\"id\":1974} -->\n<figure class=\"wp-block-audio\"><audio controls src=\"/wp-content/themes/c9-music/client/client-assets/audio/pew-pew.m4a\"></audio><figcaption>Pew Pew audio file.</figcaption></figure>\n<!-- /wp:audio -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Heading inside of article</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In fermentum posuere urna nec. Velit scelerisque in dictum non consectetur a erat nam. Gravida dictum fusce ut placerat orci. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. In eu mi bibendum neque egestas congue quisque egestas diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Vel fringilla est ullamcorper eget nulla. Lacinia at quis risus sed vulputate odio ut enim blandit. Ut pharetra sit amet aliquam id diam. Tristique nulla aliquet enim tortor at auctor. Justo nec ultrices dui sapien. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Dictum sit amet justo donec.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"10%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:10%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":1983,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-album-b-1024x1024.jpg\" alt=\"\" class=\"wp-image-1983\"/><figcaption>Photo Caption</figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"dropCap\":true,\"fontSize\":\"medium\"} -->\n<p class=\"has-drop-cap has-medium-font-size\">Bring complex landing pages to life in minutes from section + page templates or build pages from scratch using C9 Grid and C9 Post Grid blocks. But, you cannot do that if you doo not download C9 Blocks when you install the C9 Theme.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":18}}} -->\n<p style=\"font-size:18px\">This layout uses core blocks from WordPress including columns, images, paragraphs, and more paragraphs!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Now go make your own theme!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/feather-logo-gradient-rb.svg\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":1982,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-album-a-1024x1024.jpg\" alt=\"\" class=\"wp-image-1982\"/><figcaption><strong>Photo Caption</strong></figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. Quam pellentesque nec nam aliquam sem. Ut diam quam nulla porttitor massa id neque aliquam vestibulum. Mauris augue neque gravida in fermentum et. Risus commodo viverra maecenas accumsan. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Elit eget gravida cum sociis natoque penatibus. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Nec sagittis aliquam malesuada bibendum arcu vitae elementum. Id cursus metus aliquam eleifend mi in nulla posuere. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nec tincidunt praesent semper feugiat nibh sed pulvinar. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\"} -->\n<p class=\"has-text-align-left\">Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-left has-small-font-size\"><strong>Share with your bestie</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:social-links {\"align\":\"left\"} -->\n<ul class=\"wp-block-social-links alignleft\"><!-- wp:social-link {\"url\":\"facebook.com/covertnine\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://twitter.com/covertnine\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://instagram.com/covertnine\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://github.com/covertnine\",\"service\":\"github\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://www.linkedin.com/company/10990511\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'landingpage', 'text', 'header', 'columns')
			)
		);
		register_block_pattern(
			'c9-music/c9-article-560-core',
			array(
				'title'			=> __('Article 560 Words', 'c9-music'),
				'description' 	=> __('Get your article laid out before writing with a 600 word placeholder and some imagery to tet you started.', 'c9-music'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v1.jpg\",\"id\":1894,\"hasParallax\":true,\"dimRatio\":30,\"overlayColor\":\"c9music-black\",\"minHeight\":772,\"minHeightUnit\":\"px\",\"contentPosition\":\"bottom left\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-30 has-c-9-music-black-background-color has-background-dim has-parallax has-custom-content-position is-position-bottom-left\" style=\"background-image:url(/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v1.jpg);min-height:772px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Write title…\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\"><strong>C9 Music Article </strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">Block Pattern</span></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"><!-- wp:paragraph -->\n<p><strong>Author Name</strong><br>Author Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":6,\"textColor\":\"c9music-black\"} -->\n<h6 class=\"has-c-9-music-black-color has-text-color\">December 16th, 2084</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"><!-- wp:paragraph {\"dropCap\":true} -->\n<p class=\"has-drop-cap\">Dum velit laoreet id donec. In fermentum posuere urna nec tincidunt praesent. Amet purus gravida quis blandit turpis cursus in. Tincidunt tortor aliquam nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Paragraphs inside of columns</strong>. Cras fermentum odio. Facilisi nullam vehicula ipsum a arcu cursus vitae. Id leo in vitae turpis massa sed elementum tempus. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Maecenas accumsan lacus vel facilisis volutpat. Arcu risus quis varius quam quisque. Semper feugiat nibh sed pulvinar. Molestie a iaculis at erat pellentesque. Ullamcorper malesuada proin libero nunc consequat interdum varius sit. Nisl nisi scelerisque eu ultrices vitae auctor eu augue. Orci sagittis eu volutpat odio facilisis mauris sit. Senectus et netus et malesuada fames.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:pullquote -->\n<figure class=\"wp-block-pullquote\"><blockquote><p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. </p><cite>No one actually said this--Tim</cite></blockquote></figure>\n<!-- /wp:pullquote -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:audio {\"id\":1974} -->\n<figure class=\"wp-block-audio\"><audio controls src=\"/wp-content/themes/c9-music/client/client-assets/audio/pew-pew.m4a\"></audio><figcaption>Do not listen to the pew-pew.m4a.</figcaption></figure>\n<!-- /wp:audio -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:image {\"align\":\"right\",\"id\":1896,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"alignright size-large\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v3-1024x661.jpg\" alt=\"\" class=\"wp-image-1896\"/><figcaption><strong>Photo is CC0.</strong></figcaption></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Heading inside of article</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In fermentum posuere urna nec. Velit scelerisque in dictum non consectetur a erat nam. Gravida dictum fusce ut placerat orci. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. In eu mi bibendum neque egestas congue quisque egestas diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Vel fringilla est ullamcorper eget nulla. Lacinia at quis risus sed vulputate odio ut enim blandit. Ut pharetra sit amet aliquam id diam. Tristique nulla aliquet enim tortor at auctor. Justo nec ultrices dui sapien. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Dictum sit amet justo donec.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":28} -->\n<div style=\"height:28px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"10%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:10%\"><!-- wp:image {\"id\":1986,\"width\":171,\"height\":256,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><a href=\"/wp-content/themes/c9-music/client/client-assets/img/c9-event-placeholder-flyer.jpg\"><img src=\"/wp-content/themes/c9-music/client/client-assets/img/c9-event-placeholder-flyer-683x1024.jpg\" alt=\"\" class=\"wp-image-1986\" width=\"171\" height=\"256\"/></a><figcaption><strong>Event Flyer</strong></figcaption></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:cover {\"url\":\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v4.jpg\",\"id\":1897,\"hasParallax\":true,\"minHeight\":537,\"minHeightUnit\":\"px\",\"contentPosition\":\"bottom left\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim has-parallax has-custom-content-position is-position-bottom-left\" style=\"background-image:url(/wp-content/themes/c9-music/client/client-assets/img/widescreen-placeholder-hero-1920x1200-v4.jpg);min-height:537px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading -->\n<h2>New tour dates <span class=\"has-inline-color has-c-9-music-mint-green-color\">coming soon</span>.</h2>\n<!-- /wp:heading --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:paragraph -->\n<p>Turpis nunc eget lorem dolor sed viverra ipsum nunc aliquet. Est ante in nibh mauris cursus mattis. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Ac ut consequat semper viverra nam libero justo laoreet sit. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote {\"align\":\"left\"} -->\n<blockquote class=\"wp-block-quote has-text-align-left\"><p>Massa tempor nec feugiat nisl pretium fusce id. Tristique risus nec feugiat in fermentum. Senectus et netus et malesuada. Quis imperdiet massa tincidunt nunc pulvinar. Dolor sit amet consectetur adipiscing elit duis. Nullam eget felis eget nunc.</p><cite>Quote Format.</cite></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>Consectetur lorem donec massa sapien faucibus et. Vitae purus faucibus ornare suspendisse sed nisi. Nisl tincidunt eget nullam non nisi est sit. Lectus arcu bibendum at varius. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Pharetra convallis posuere morbi leo urna molestie at elementum. Turpis egestas pretium aenean pharetra magna ac. Donec ac odio tempor orci dapibus. Risus feugiat in ante metus dictum at tempor. Amet mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Posuere ac ut consequat semper viverra nam libero justo. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Adipiscing elit ut aliquam purus sit amet luctus venenatis. Elementum integer enim neque volutpat ac. Quam elementum pulvinar etiam non. Gravida neque convallis a cras semper auctor neque vitae. Posuere morbi leo urna molestie at. In eu mi bibendum neque egestas congue quisque egestas. Lacus viverra vitae congue eu consequat ac. Vel risus commodo viverra maecenas accumsan. Pellentesque habitant morbi tristique senectus et netus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>Now share this article or my boss will yell at me.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:social-links {\"align\":\"center\"} -->\n<ul class=\"wp-block-social-links aligncenter\"><!-- wp:social-link {\"url\":\"facebook.com/covertnine\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://twitter.com/covertnine\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://instagram.com/covertnine\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://github.com/covertnine\",\"service\":\"github\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://www.linkedin.com/company/10990511\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links -->",
				'categories'	=> array('COVERT NINE', 'landingpage', 'text', 'header', 'columns')
			)
		);
		register_block_pattern(
			'c9-music/c9-style-guide-core',
			array(
				'title'			=> __('C9 Music Style Guide', 'c9-music'),
				'description'	=> __('A style guide with type, buttons, and core blocks frequently used.', 'c9-music'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-music/client/client-assets/img/widescreen-homepage-hero-1920x1200-v2.jpg\",\"id\":2805,\"dimRatio\":70,\"minHeight\":677,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-70 has-background-dim\" style=\"background-image:url(/wp-content/themes/c9-music/client/client-assets/img/widescreen-homepage-hero-1920x1200-v2.jpg);min-height:677px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"color-white\",\"fontSize\":\"huge\"} -->\n<h1 class=\"has-text-align-center has-color-white-color has-text-color has-huge-font-size\"><strong>Know where you're going?</strong><br>C9 Helper Style Guide</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":2,\"backgroundColor\":\"color-success\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-color-success-background-color has-background\" href=\"#\" style=\"border-radius:2px\" target=\"_blank\" rel=\"noreferrer noopener\">Download now</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"borderRadius\":2,\"textColor\":\"color-white\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-white-color has-text-color\" href=\"#\" style=\"border-radius:2px\">Tutorial Videos</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:spacer -->\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:search {\"label\":\"Or search through our archives\",\"placeholder\":\"How to design a signup page using C9 Blocks....\",\"width\":50,\"widthUnit\":\"%\",\"buttonText\":\"Search\",\"align\":\"center\"} /--></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:group {\"align\":\"wide\"} -->\n<div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-black\"} -->\n<p class=\"has-text-align-center has-color-black-color has-text-color\">Three calls to action so your visitors can pick their lane, and what they want to see next.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Ask a question</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-black\"} -->\n<p class=\"has-text-align-center has-color-black-color has-text-color\">Sign up for a newsletter or hit the most popular category of your shop.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Sign up for alerts</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-black\"} -->\n<p class=\"has-text-align-center has-color-black-color has-text-color\">Consider your three most popular user paths and use those links in these three buttons.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Buy Tickets</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:spacer {\"height\":70} -->\n<div style=\"height:70px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"textAlign\":\"center\"} -->\n<h2 class=\"has-text-align-center\"><span class=\"has-inline-color has-color-black-color\">C9 Music</span> Core Blocks Typography</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"color-yellow\"} -->\n<h1 class=\"has-text-align-center has-color-yellow-color has-text-color\">Heading One</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"textColor\":\"color-orange\"} -->\n<h2 class=\"has-text-align-center has-color-orange-color has-text-color\">Heading Two</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"color-gray\"} -->\n<h3 class=\"has-text-align-center has-color-gray-color has-text-color\">Heading Three</h3>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"textColor\":\"color-black\"} -->\n<h4 class=\"has-text-align-center has-color-black-color has-text-color\">Heading Four</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":5,\"textColor\":\"color-danger\"} -->\n<h5 class=\"has-text-align-center has-color-danger-color has-text-color\">Heading Five</h5>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\n<h6 class=\"has-text-align-center\">Heading Six</h6>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"c9music-faded-red\"} -->\n<h1 class=\"has-text-align-center has-c-9-music-faded-red-color has-text-color\">Heading One</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"textColor\":\"c9music-black\"} -->\n<h2 class=\"has-text-align-center has-c-9-music-black-color has-text-color\">Heading Two</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"c9music-dark-gray\"} -->\n<h3 class=\"has-text-align-center has-c-9-music-dark-gray-color has-text-color\">Heading Three</h3>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"textColor\":\"c9music-red\"} -->\n<h4 class=\"has-text-align-center has-c-9-music-red-color has-text-color\">Heading Four</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":5,\"textColor\":\"c9music-mint-green\"} -->\n<h5 class=\"has-text-align-center has-c-9-music-mint-green-color has-text-color\">Heading Five</h5>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\n<h6 class=\"has-text-align-center\">Heading Six</h6>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"fontSize\":\"small\"} -->\n<p class=\"has-small-font-size\"><strong>Small Font Paragraph. </strong>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"dropCap\":true,\"fontSize\":\"normal\"} -->\n<p class=\"has-drop-cap has-normal-font-size\">Pat enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"normal\"} -->\n<p class=\"has-normal-font-size\"><strong>Normal Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\"><strong>Medium Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\"><strong>Large Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"huge\"} -->\n<p class=\"has-huge-font-size\"><strong>Large Font Paragraph. </strong>Ut enim ad minim veniam, quis. </p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":6} -->\n<h6>Ordered List</h6>\n<!-- /wp:heading -->\n\n<!-- wp:list {\"ordered\":true} -->\n<ol><li>List Item</li><li>List Item</li><li>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin.</li><li>List Item</li></ol>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":6} -->\n<h6>Unordered List</h6>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>List Item</li><li>List Item</li><li>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin.</li><li>List Item</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\n<h6 class=\"has-text-align-center\">Separators (HR)</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-faded-red\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-faded-red-background-color has-c-9-music-faded-red-color\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-mint-green\",\"className\":\"is-style-wide\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-mint-green-background-color has-c-9-music-mint-green-color is-style-wide\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-red\",\"className\":\"is-style-dots\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-red-background-color has-c-9-music-red-color is-style-dots\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-black\",\"className\":\"is-style-dots\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-black-background-color has-c-9-music-black-color is-style-dots\"/>\n<!-- /wp:separator -->\n\n<!-- wp:spacer -->\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->",
				'categories'	=> array('COVERT NINE', 'landingpage', 'text', 'header', 'columns')
			)
		);
	}
}
