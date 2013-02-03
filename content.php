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
		<?php else: ?>
			<div>
				<?php the_content(__('Read more <span>&rarr;</span>')); ?>
				<?php wp_link_pages( array('before' => '<div>' . __('Pages:'), 'after' => '</div>')); ?>
			</div>
		<?php endif; ?>

		<footer>
			<?php fp_meta(); ?>
		</footer>
	</article>