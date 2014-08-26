<?php
/* The default template for displaying content. 
   Used for both single and index/archive/search. */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php if(is_sticky() && is_home() && ! is_paged()): ?>
			
			<div class="featured-post"><?php _e('Featured post'); ?></div>
			
		<?php endif; ?>
		
		<header>
			
			<?php the_post_thumbnail(); ?>
			
			<?php if(is_single()): ?>
				
				<h1><?php the_title(); ?></h1>
				
			<?php elseif(!is_page()): ?>
				
				<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>
				
				<p class="date"><?php the_date(); ?></p>
				
			<?php endif; ?>
			
		</header>

		<?php if(is_search()): ?>
			
			<div><?php the_excerpt(); ?></div>
			
		<?php else: ?>
			
			<div>
				
				<?php the_content(__('<span class="read-more-arrow r10">&rarr;</span>')); ?>
				
				<?php wp_link_pages( array('before' => '<div>' . __('Pages:'), 'after' => '</div>')); ?>
				
			</div>
			
		<?php endif; ?>

		<footer></footer>
		
	</article>