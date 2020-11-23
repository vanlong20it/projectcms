<?php
/**
 * @subpackage shopsix
 * @since shopsix 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses shopsix_header_style()
 */
function shopsix_custom_header_setup() {

	add_theme_support(
		'custom-header',
		/**
		 * Filter shopsix custom-header support arguments.
		 *
		 * @since shopsix 1.0
		 *
		 * @param array $args {
		 *     An array of custom-header support arguments.
		 *
		 *     @type string $default-image    Default image of the header.
		 *     @type int    $width            Width in pixels of the custom header image. Default 954.
		 *     @type int    $height           Height in pixels of the custom header image. Default 1300.
		 *     @type string $flex-height      Flex support for height of header.
		 *     @type string $video            Video support for header.
		 *     @type string $wp-head-callback Callback function used to styles the header image and text
		 *                                    displayed on the blog.
		 * }
		 */
		apply_filters(
			'shopsix_custom_header_args',
			array(
				'default-image'    => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
				'width'            => 2000,
				'height'           => 1200,
				'flex-height'      => true,
				'video'            => true,
				'wp-head-callback' => 'shopsix_header_style',
			)
		)
	);

	register_default_headers(
		array(
			'default-image' => array(
				'url'           => '%s/assets/images/header.jpg',
				'thumbnail_url' => '%s/assets/images/header.jpg',
				'description'   => __( 'Default Header Image', 'shopsix' ),
			),
		)
	);
}
add_action( 'after_setup_theme', 'shopsix_custom_header_setup' );

if ( ! function_exists( 'shopsix_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see shopsix_custom_header_setup().
	 */
	function shopsix_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail.
		// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style id="shopsix-custom-header-styles" type="text/css">
		<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
			?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
		.site-title a,
		.colors-dark .site-title a,
		.colors-custom .site-title a,
		body.has-header-image .site-title a,
		body.has-header-video .site-title a,
		body.has-header-image.colors-dark .site-title a,
		body.has-header-video.colors-dark .site-title a,
		body.has-header-image.colors-custom .site-title a,
		body.has-header-video.colors-custom .site-title a,
		.site-description,
		.colors-dark .site-description,
		.colors-custom .site-description,
		body.has-header-image .site-description,
		body.has-header-video .site-description,
		body.has-header-image.colors-dark .site-description,
		body.has-header-video.colors-dark .site-description,
		body.has-header-image.colors-custom .site-description,
		body.has-header-video.colors-custom .site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
		<?php
	}
endif; // End of shopsix_header_style().

/**
 * Customize video play/pause button in the custom header.
 *
 * @param array $settings Video settings.
 * @return array The filtered video settings.
 */
function shopsix_video_controls( $settings ) {
	$settings['l10n']['play']  = '<span class="screen-reader-text">' . __( 'Play background video', 'shopsix' ) . '</span>' . shopsix_get_svg( array( 'icon' => 'play' ) );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'shopsix' ) . '</span>' . shopsix_get_svg( array( 'icon' => 'pause' ) );
	return $settings;
}
add_filter( 'header_video_settings', 'shopsix_video_controls' );
