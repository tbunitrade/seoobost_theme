<?php


/*
 * ============
 * Ajax functions
 * ============
 */

add_action('wp_ajax_nopriv_sunset_load_more','sunset_load_more');
add_action('wp_ajax_sunset_load_more','sunset_load_more');


function sunset_load_more() {
    //load more posts
    $paged = $_POST["page"]+1;
    $postsPerPage = 3;
    //echo $paged;

    $query = new WP_Query ( array(

        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $postsPerPage,
        'paged' => $paged

    ) );

    if ($query->have_posts()):

        echo '<div class="row myy page-limit" data-page="'. site_url().'/lenta/page/'. $paged .'">';
            while ( $query->have_posts()): $query->the_post();
                get_template_part('template-parts/postforajax');

            endwhile;
        echo '</div>';
    endif;

    wp_reset_postdata();

    die();
}

function sunset_check_paged( $num = null) {
    $output = '';

    if (is_paged() ){ $output = 'page/' . get_query_var('paged');}

    if ( $num == 1) {
        $paged = ( get_query_var('paged') == 0 ? 1 : get_query_var ('paged'));
        return $paged;
    } else {
        return $output;
    }
}