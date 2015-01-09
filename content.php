<?php
/* The default template for displaying content. 
   Used for both single and index/archive/search. */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(is_sticky() && is_home() && ! is_paged()): ?>

		<div class="featured-post"><?php _e('Featured post'); ?></div>

	<?php endif; ?>

		<div class="row">

			<div class="medium-4 columns">

				<?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "img-circle attachment-post-thumbnail")); ?>
				
				<br><br><br><br>

			</div><!--/medium-4 columns-->
			
			

			<div class="medium-8 columns">

				<header>

					<?php if(is_single()): ?>

						<h1><?php the_title(); ?></h1>

					<?php elseif(!is_page()): ?>

						<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s'), the_title_attribute('echo=0'))); ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>

						<p class="date"><?php the_date(); ?></p>

					<?php endif; ?>

				</header>
				
				
		
				<div class="content-body">
			
					<?php if(is_search()): ?>

						<?php the_excerpt(); ?>

					<?php else: ?>
						
						<?php the_content('Read More &rarr;'); ?>

						<?php wp_link_pages( array('before' => '<div>' . __('Pages:'), 'after' => '</div>')); ?>

					<?php endif; ?>
			
				</div><!--/.content-body-->

			</div><!--/.medium-8 columns-->
			
			<hr style="padding-bottom:30px;">
	
		</div><!--/.row-->

		<footer></footer>
		
	</article>