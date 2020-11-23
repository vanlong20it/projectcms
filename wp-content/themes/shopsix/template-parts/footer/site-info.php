<?php
/**
 * @subpackage shopsix
 * @since shopsix 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://shopsix.org/', 'shopsix' ) ); ?>" class="imprint">
		<?php
			/* translators: %s: shopsix */
		printf( __( 'Proudly powered by %s', 'shopsix' ), 'shopsix' );
		?>
	</a>
</div><!-- .site-info -->
