<?php
/*
 * The main template file. Displays a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
*/

get_header(); ?>
		<div class="row" role="main">
			
				<?php if(have_posts()): // start loop if posts exist ?>
					
					<?php while(have_posts()): the_post(); ?>
						<div class="twelve columns panel rb">
							<?php get_template_part('content', get_post_format()); ?>
						</div>
					<?php endwhile; ?>
					
				<?php else: // print error messages if no posts exist ?>
					
					<article>
					<?php if(current_user_can('edit_posts')): ?>
						<header>
							<h1><?php _e('No posts.'); ?></h1>
						</header>
						<p><?php printf( __('To publish your first post, click <a href="%s">here</a>.'), admin_url('post-new.php')); ?></p>
					<?php else: ?>
						<header>
							<h1><?php _e('No posts.'); ?></h1>
						</header>
						<p><?php _e('Try searching maybe?'); ?></p>
						<?php get_search_form(); ?>
					<?php endif; ?><!--/current_user_can()-->
					</article>

				<?php endif; ?><!--/have_posts()-->
			
		</div><!--/.row -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>