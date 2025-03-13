
<?php
/* Custom search form */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
	<div class="input-group">
		<input type="search" class="form-control border-0" placeholder="SEARCH" aria-label="search nico" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
	</div>
</form>
 