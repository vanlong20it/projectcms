<?php

/**
 * @subpackage shopsix
 * @since shopsix 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
		<?php
		if ($rating && wc_review_ratings_enabled()) {
			echo wc_get_rating_html($rating); // WPCS: XSS ok.
		}
		?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ('1' === $comments_number) {
				/* translators: %s: Post title. */
				printf(_x('One Reply to &ldquo;%s&rdquo;', 'comments title', 'shopsix'), get_the_title());
			} else {
				printf(
					/* translators: 1: Number of comments, 2: Post title. */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'shopsix'
					),
					number_format_i18n($comments_number),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => shopsix_get_svg(array('icon' => 'mail-reply')) . __('Reply', 'shopsix'),
				)
			);
			?>
		</ol>

	<?php
		the_comments_pagination(
			array(
				'prev_text' => shopsix_get_svg(array('icon' => 'arrow-left')) . '<span class="screen-reader-text">' . __('Previous', 'shopsix') . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __('Next', 'shopsix') . '</span>' . shopsix_get_svg(array('icon' => 'arrow-right')),
			)
		);

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
	?>

		<p class="no-comments"><?php _e('Comments are closed.', 'shopsix'); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->