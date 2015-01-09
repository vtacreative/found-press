<?php
/* Displays content when nothing more specific matches a query.
   http://codex.wordpress.org/Template_Hierarchy */
get_header(); ?>

	<?php if(have_posts()): // start loop if posts exist ?>
		
		<?php while(have_posts()): the_post(); ?>
			
			<?php get_template_part('content', get_post_format()); ?>
			
		<?php endwhile; ?>
		
		<div id="page-navigation" class="row">
		
			<div class="medium-12 large-12 columns">
			
				<h6><?php posts_nav_link( '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;' , '&larr; Newer Posts' , 'Older Posts &rarr;' ); ?></h6>
				
				</div>
			
		</div>
		
	<?php endif; ?><!--/have_posts()-->
		
<?php get_footer(); ?>