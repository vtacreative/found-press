<?php
/* The default template for displaying content. 
   Used for both single and index/archive/search. */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if(is_sticky() && is_home() && ! is_paged()): ?>
			<div class="featured-post">
				<?php _e('Featured post'); ?>
			</div>
		<?php endif; ?>
		
		<header>
			<?php the_post_thumbnail(); ?>
			<?php if(is_single()): ?>
				<h1><?php the_title(); ?></h1>
				<?php else: ?>
				<h1><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf( __( 'Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>
			<?php if(comments_open()): ?>
				<div><?php comments_popup_link('<span>' . __('Leave a reply') . '</span>', __('1 Reply'), __('% Replies')); ?></div>
			<?php endif; ?>
		</header>

		<?php if(is_search()): ?>
			<div><?php the_excerpt(); ?></div>
		<?php else : ?>
			<div>
				<?php the_content( __('Read more <span class="meta-nav">&rarr;</span>')); ?>
				<?php wp_link_pages( array('before' => '<div>' . __('Pages:'), 'after' => '</div>')); ?>
			</div>
		<?php endif; ?>

		<footer>
			
			<?php edit_post_link( __('Edit'), '<span>', '</span>'); ?>
			<?php if(is_singular() && get_the_author_meta('description') && is_multi_author()): // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
