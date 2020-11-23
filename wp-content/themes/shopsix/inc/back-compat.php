<?php
/**
 * shopsix back compat functionality
 *
 * Prevents shopsix from running on shopsix versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package shopsix
 * @subpackage shopsix
 * @since shopsix 1.0
 */

/**
 * Prevent switching to shopsix on old versions of shopsix.
 *
 * Switches to the default theme.
 *
 * @since shopsix 1.0
 */
function shopsix_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'shopsix_upgrade_notice' );
}
add_action( 'after_switch_theme', 'shopsix_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * shopsix on shopsix versions prior to 4.7.
 *
 * @since shopsix 1.0
 *
 * @global string $wp_version shopsix version.
 */
function shopsix_upgrade_notice() {
	/* translators: %s: The current shopsix version. */
	$message = sprintf( __( 'shopsix requires at least shopsix version 4.7. You are running version %s. Please upgrade and try again.', 'shopsix' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on shopsix versions prior to 4.7.
 *
 * @since shopsix 1.0
 *
 * @global string $wp_version shopsix version.
 */
function shopsix_customize() {
	wp_die(
		/* translators: %s: The current shopsix version. */
		sprintf( __( 'shopsix requires at least shopsix version 4.7. You are running version %s. Please upgrade and try again.', 'shopsix' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'shopsix_customize' );

/**
 * Prevents the Theme Preview from being loaded on shopsix versions prior to 4.7.
 *
 * @since shopsix 1.0
 *
 * @global string $wp_version shopsix version.
 */
function shopsix_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: The current shopsix version. */
		wp_die( sprintf( __( 'shopsix requires at least shopsix version 4.7. You are running version %s. Please upgrade and try again.', 'shopsix' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'shopsix_preview' );
