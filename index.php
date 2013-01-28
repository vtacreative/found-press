<?php
/*
 * The main template file.
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
*/

get_header(); ?>
		<div class="row" role="main">
			
				<?php if(have_posts()): ?>
					<?php while(have_posts()): the_post(); ?>
						<div class="twelve columns panel rb">
							<?php get_template_part('content', get_post_format()); ?>
						</div>
					<?php endwhile; ?>
					<?php twentytwelve_content_nav('nav-below'); ?>
					
				<?php else: ?>
					<article>
					<?php if(current_user_can('edit_posts')): ?>
						<header>
							<h1><?php _e('No posts.'); ?></h1>
						</header>
						<p><?php printf( __('<a href="%s">Publish a post</a>.'), admin_url('post-new.php')); ?></p>
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