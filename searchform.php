<form role="search" method="get" class="search-form a" action="<?php echo home_url( '/' ); ?>">

	<div class="small-5 small-offset-7 columns">
	
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		
	</div>
	
</form>