<?php
/* The Template for displaying all single posts */

get_header(); ?>

	<div class="row" role="main">
		<div class="twelve columns panel rb">
			<?php while(have_posts()): the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
			<nav>
				<h3 class="assistive-text"><?php _e('Post navigation'); ?></h3>
				<span><?php previous_post_link('%link', '<span>' . _x('&larr;', 'Previous post link') . '</span> %title'); ?></span>
				<span><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link') . '</span>'); ?></span>
			</nav>
			<?php comments_template('', true); ?>
		<?php endwhile; ?>
		</div>
	</div><!--/.row -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>