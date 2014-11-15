<?php
/* Displays content when nothing more specific matches a query.
   http://codex.wordpress.org/Template_Hierarchy */
get_header(); ?>
				
	<?php if(have_posts()): // start loop if posts exist ?>
		
		<?php while(have_posts()): the_post(); ?>
			
			<?php get_template_part('content', get_post_format()); ?>
			
		<?php endwhile; ?>
		
	<?php endif; ?><!--/have_posts()-->
		
<?php get_footer(); ?>