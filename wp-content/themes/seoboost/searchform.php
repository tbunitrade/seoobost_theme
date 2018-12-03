<?php
/**
 * Template for displaying search forms in seoboost
 *
 * @package seoboost
 * @version 1.2.1
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'seoboost' ); ?></span>
        <input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'seoboost' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
    	<span class="screen-reader-text">
			<?php echo _x( 'Search', 'submit button', 'seoboost' ); ?>
        </span>
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</form>
