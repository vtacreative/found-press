<?php
/**The template for displaying Comments.
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		
		<h2 class="comments-title">
			
			<?php printf( _n( 'One comment', '%1$s comments', get_comments_number(), '' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
			
		</h2>

		<ol class="commentlist">
			
			<?php wp_list_comments( array( 'style' => 'ol' ) ); ?>
			
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			
		<nav id="comment-nav-below" class="navigation" role="navigation">
			
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation' ); ?></h1>
			
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments' ) ); ?></div>
			
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?></div>
			
		</nav>
		
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			
			<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
			
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->