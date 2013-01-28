<?php
/**
 * The sidebar containing the front page widget areas.
 * If no active widgets in either sidebar, they will be hidden completely
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 * If none of the sidebars have widgets, then we exit early.
 */
if(!is_active_sidebar('sidebar-2') && !is_active_sidebar('sidebar-3'))
	return;
?>
<div class="row" role="complementary">
	<div class="twelve columns panel">
		<div class="four columns">
			<?php if(is_active_sidebar('sidebar-2')): ?>
				<?php dynamic_sidebar('sidebar-2'); ?>
			<?php endif; ?>
		</div>

		<div class="four columns">
		<?php if(is_active_sidebar('sidebar-3')): ?>
			<?php dynamic_sidebar('sidebar-3'); ?>
		<?php endif; ?>
		</div>
	</div>
</div><!--/.row-->