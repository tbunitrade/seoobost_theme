<?php

// ===================================================
// ==== Excerpt ==================
// ===================================================
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
//function wpdocs_custom_excerpt_length( $length ) {
//    return 63;
//}
//add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_content() , true );
    echo wp_trim_words($content, $word_count_limit);
}

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    //return '[.....]';
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

