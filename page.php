<?php
/* Default page layout
   http://codex.wordpress.org/Template_Hierarchy */
get_header(); ?>
		<div class="row" role="main">
			<div class="twelve columns">
				<?php if(have_posts()): // start loop if posts exist ?>
					<?php while(have_posts()): the_post(); ?>
						<?php get_template_part('content', get_post_format()); ?>
					<?php endwhile; ?>
				<?php endif; ?><!--/have_posts()-->
			</div>
		</div><!--/.row -->
<?php get_footer(); ?>