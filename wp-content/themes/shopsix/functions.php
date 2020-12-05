<?php

if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function shopsix_setup()
{
	load_theme_textdomain('shopsix');

	add_theme_support('automatic-feed-links');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	add_image_size('shopsix-featured-image', 2000, 1200, true);

	add_image_size('shopsix-thumbnail-avatar', 100, 100, true);

	$GLOBALS['content_width'] = 525;

	register_nav_menus(
		array(
			'top'    => __('Top Menu', 'shopsix'),
			'social' => __('Social Links Menu', 'shopsix'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
	add_editor_style(array('assets/css/editor-style.css', shopsix_fonts_url()));

	// Load regular editor styles into the new block-based editor.
	add_theme_support('editor-styles');

	// Load default block styles.
	add_theme_support('wp-block-styles');

	// Add support for responsive embeds.
	add_theme_support('responsive-embeds');

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x('Espresso', 'Theme starter content', 'shopsix'),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x('Sandwich', 'Theme starter content', 'shopsix'),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x('Coffee', 'Theme starter content', 'shopsix'),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __('Top Menu', 'shopsix'),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __('Social Links Menu', 'shopsix'),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters shopsix array of starter content.
	 *
	 * @since shopsix 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters('shopsix_starter_content', $starter_content);

	add_theme_support('starter-content', $starter_content);
}
add_action('after_setup_theme', 'shopsix_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shopsix_content_width()
{

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod('page_layout');

	// Check if layout is one column.
	if ('one-column' === $page_layout) {
		if (shopsix_is_frontpage()) {
			$content_width = 644;
		} elseif (is_page()) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if (is_single() && !is_active_sidebar('sidebar-1')) {
		$content_width = 740;
	}

	/**
	 * Filter shopsix content width of the theme.
	 *
	 * @since shopsix 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters('shopsix_content_width', $content_width);
}
add_action('template_redirect', 'shopsix_content_width', 0);

/**
 * Register custom fonts.
 */
function shopsix_fonts_url()
{
	$fonts_url = '';

	/*
	 * translators: If there are characters in your language that are not supported
	 * by Libre Franklin, translate this to 'off'. Do not translate into your own language.
	 */
	$libre_franklin = _x('on', 'Libre Franklin font: on or off', 'shopsix');

	if ('off' !== $libre_franklin) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family'  => urlencode(implode('|', $font_families)),
			'subset'  => urlencode('latin,latin-ext'),
			'display' => urlencode('fallback'),
		);

		$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	}

	return esc_url_raw($fonts_url);
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since shopsix 1.0
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function shopsix_resource_hints($urls, $relation_type)
{
	if (wp_style_is('shopsix-fonts', 'queue') && 'preconnect' === $relation_type) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter('wp_resource_hints', 'shopsix_resource_hints', 10, 2);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopsix_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Blog Sidebar', 'shopsix'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'shopsix'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __('Footer 1', 'shopsix'),
			'id'            => 'sidebar-2',
			'description'   => __('Add widgets here to appear in your footer.', 'shopsix'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __('Footer 2', 'shopsix'),
			'id'            => 'sidebar-3',
			'description'   => __('Add widgets here to appear in your footer.', 'shopsix'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'shopsix_widgets_init');

/**
 * @since shopsix 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function shopsix_excerpt_more($link)
{
	if (is_admin()) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url(get_permalink(get_the_ID())),
		/* translators: %s: Post title. */
		sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'shopsix'), get_the_title(get_the_ID()))
	);
	return ' &hellip; ' . $link;
}
add_filter('excerpt_more', 'shopsix_excerpt_more');

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since shopsix 1.0
 */
function shopsix_javascript_detection()
{
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'shopsix_javascript_detection', 0);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function shopsix_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'shopsix_pingback_header');

/**
 * Display custom color CSS.
 */
function shopsix_colors_css_wrap()
{
	if ('custom' !== get_theme_mod('colorscheme') && !is_customize_preview()) {
		return;
	}

	require_once get_parent_theme_file_path('/inc/color-patterns.php');
	$hue = absint(get_theme_mod('colorscheme_hue', 250));

	$customize_preview_data_hue = '';
	if (is_customize_preview()) {
		$customize_preview_data_hue = 'data-hue="' . $hue . '"';
	}
?>
	<style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
		<?php echo shopsix_custom_colors_css(); ?>
	</style>
<?php
}
add_action('wp_head', 'shopsix_colors_css_wrap');

/**
 * Enqueues scripts and styles.
 */
function shopsix_scripts()
{
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style('shopsix-fonts', shopsix_fonts_url(), array(), null);

	// Theme stylesheet.
	wp_enqueue_style('shopsix-style', get_stylesheet_uri(), array(), '20190507');

	// Theme block stylesheet.
	wp_enqueue_style('shopsix-block-style', get_theme_file_uri('/assets/css/blocks.css'), array('shopsix-style'), '20190105');

	// Load the dark colorscheme.
	if ('dark' === get_theme_mod('colorscheme', 'light') || is_customize_preview()) {
		wp_enqueue_style('shopsix-colors-dark', get_theme_file_uri('/assets/css/colors-dark.css'), array('shopsix-style'), '20190408');
	}

	if (is_customize_preview()) {
		wp_enqueue_style('shopsix-ie9', get_theme_file_uri('/assets/css/ie9.css'), array('shopsix-style'), '20161202');
		wp_style_add_data('shopsix-ie9', 'conditional', 'IE 9');
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style('shopsix-ie8', get_theme_file_uri('/assets/css/ie8.css'), array('shopsix-style'), '20161202');
	wp_style_add_data('shopsix-ie8', 'conditional', 'lt IE 9');

	// Custom style	
	wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/fontawesome/css/all.min.css'));
	wp_enqueue_style('splide', get_theme_file_uri('/assets/css/splide.min.css'));
	wp_enqueue_style('wp-custom-style', get_theme_file_uri('/assets/css/styles.css'), array('shopsix-style'), '20190105');
	// Load the html5 shiv.
	wp_enqueue_script('html5', get_theme_file_uri('/assets/js/html5.js'), array(), '20161020');
	wp_script_add_data('html5', 'conditional', 'lt IE 9');

	wp_enqueue_script('shopsix-skip-link-focus-fix', get_theme_file_uri('/assets/js/skip-link-focus-fix.js'), array(), '20161114', true);

	$shopsix_l10n = array(
		'quote' => shopsix_get_svg(array('icon' => 'quote-right')),
	);

	if (has_nav_menu('top')) {
		wp_enqueue_script('shopsix-navigation', get_theme_file_uri('/assets/js/navigation.js'), array('jquery'), '20161203', true);
		$shopsix_l10n['expand']   = __('Expand child menu', 'shopsix');
		$shopsix_l10n['collapse'] = __('Collapse child menu', 'shopsix');
		$shopsix_l10n['icon']     = shopsix_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script('shopsix-global', get_theme_file_uri('/assets/js/global.js'), array('jquery'), '20190121', true);

	wp_enqueue_script('jquery-scrollto', get_theme_file_uri('/assets/js/jquery.scrollTo.js'), array('jquery'), '2.1.2', true);

	// Custom script
	wp_enqueue_script('popper', get_theme_file_uri('/assets/js/popper.min.js'), ['jquery'], '1.2', true);
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), ['jquery'], true, true);
	wp_enqueue_script('fontawesome', get_theme_file_uri('/assets/fontawesome/js/all.min.js'), ['jquery'], true, true);
	wp_enqueue_script('splide', get_theme_file_uri('/assets/js/splide.min.js'), ['jquery'], true, true);
	wp_enqueue_script('apps', get_theme_file_uri('/assets/js/apps.js'), ['jquery'], true, true);
	wp_localize_script('shopsix-skip-link-focus-fix', 'shopsixScreenReaderText', $shopsix_l10n);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'shopsix_scripts');

/**
 * Enqueues styles for the block-based editor.
 *
 * @since shopsix 1.8
 */
function shopsix_block_editor_styles()
{
	// Block styles.
	wp_enqueue_style('shopsix-block-editor-style', get_theme_file_uri('/assets/css/editor-blocks.css'), array(), '20190328');
	// Add custom fonts.
	wp_enqueue_style('shopsix-fonts', shopsix_fonts_url(), array(), null);
}
add_action('enqueue_block_editor_assets', 'shopsix_block_editor_styles');

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since shopsix 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function shopsix_content_image_sizes_attr($sizes, $size)
{
	$width = $size[0];

	if (740 <= $width) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if (is_active_sidebar('sidebar-1') || is_archive() || is_search() || is_home() || is_page()) {
		if (!(is_page() && 'one-column' === get_theme_mod('page_options')) && 767 <= $width) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter('wp_calculate_image_sizes', 'shopsix_content_image_sizes_attr', 10, 2);

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since shopsix 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function shopsix_header_image_tag($html, $header, $attr)
{
	if (isset($attr['sizes'])) {
		$html = str_replace($attr['sizes'], '100vw', $html);
	}
	return $html;
}
add_filter('get_header_image_tag', 'shopsix_header_image_tag', 10, 3);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since shopsix 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function shopsix_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
	if (is_archive() || is_search() || is_home()) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'shopsix_post_thumbnail_sizes_attr', 10, 3);

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since shopsix 1.0
 *
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php),
 *                otherwise $template.
 */
function shopsix_front_page_template($template)
{
	return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'shopsix_front_page_template');

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since shopsix 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function shopsix_widget_tag_cloud_args($args)
{
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter('widget_tag_cloud_args', 'shopsix_widget_tag_cloud_args');

/**
 * Gets unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since shopsix 2.0
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function shopsix_unique_id($prefix = '')
{
	static $id_counter = 0;
	if (function_exists('wp_unique_id')) {
		return wp_unique_id($prefix);
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path('/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path('/inc/template-tags.php');

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path('/inc/template-functions.php');

/**
 * Customizer additions.
 */
require get_parent_theme_file_path('/inc/customizer.php');

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path('/inc/icon-functions.php');
