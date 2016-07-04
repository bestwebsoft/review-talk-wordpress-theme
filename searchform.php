<?php
/**
 * The template part for search form.
 *
 * @subpackage Reviewer
 * @since      Reviewer 1.0
 */ ?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>/">
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="&#xf002;" />
	<input type="hidden" value="submit" />
</form>
