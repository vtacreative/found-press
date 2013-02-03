<?php
/*
 * The main template file. Displays a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
*/

get_header(); ?>

		<div class="row" role="main">
			
				<div class="nine columns">
					<?php if(have_posts()): // start loop if posts exist ?>
						<?php while(have_posts()): the_post(); ?>
							<div class="panel rb">
								<?php get_template_part('content', get_post_format()); ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?><!--/have_posts()-->
				</div>
				<div class="three columns panel rb">
					<?php get_sidebar(); ?>
				</div>
			</div><!--/.row -->
			
<?php get_footer(); ?>