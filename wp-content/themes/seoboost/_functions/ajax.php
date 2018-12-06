<?php


/*
 * ============
 * Ajax functions
 * ============
 */

add_action('wp_ajax_nopriv_sunset_load_more','sunset_load_more');
add_action('wp_ajax_sunset_load_more','sunset_load_more');

add_action('wp_ajax_nopriv_sunset_load_more_category1','sunset_load_more_category1');
add_action('wp_ajax_sunset_load_more_category1','sunset_load_more_category1');

add_action('wp_ajax_nopriv_sunset_load_more_category2','sunset_load_more_category2');
add_action('wp_ajax_sunset_load_more_category2','sunset_load_more_category2');


function sunset_load_more() {
    //load more posts
    $paged = $_POST["page"]+1;
    $postsPerPage = 6;
    //echo $paged;

    $query = new WP_Query ( array(

        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $postsPerPage,
        'paged' => $paged

    ) );

    if ($query->have_posts()):
        #echo '<div class="row myy page-limit" data-page="'. site_url().'/lenta/page/'. $paged .'">';
        echo '<div class="row myy page-limit" data-page="'. site_url().'/'. $paged .'">';
            while ( $query->have_posts()): $query->the_post();
                get_template_part('template-parts/postforajax');

            endwhile;
        echo '</div>';
    endif;

    wp_reset_postdata();

    die();
}

function sunset_load_more_category1() {
    //load more posts
    $paged = $_POST["page"]+1;
    $postsPerPage = 6;
    //echo $paged;

    $query = new WP_Query ( array(

        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'rubrika1',  
        'posts_per_page' => $postsPerPage,
        'paged' => $paged

    ) );

    if ($query->have_posts()):
        #echo '<div class="row myy page-limit" data-page="'. site_url().'/lenta/page/'. $paged .'">';
        echo '<div class="row myy page-limit" data-page="'. site_url().'/'. $paged .'">';
            while ( $query->have_posts()): $query->the_post();
                get_template_part('template-parts/postforajax-category1');

            endwhile;
        echo '</div>';
    endif;

    wp_reset_postdata();

    die();
}

function sunset_load_more_category2() {
    //load more posts
    $paged = $_POST["page"]+1;
    $postsPerPage = 6;
    //echo $paged;

    $query = new WP_Query ( array(

        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'rubrika2',  
        'posts_per_page' => $postsPerPage,
        'paged' => $paged

    ) );

    if ($query->have_posts()):
        #echo '<div class="row myy page-limit" data-page="'. site_url().'/lenta/page/'. $paged .'">';
        echo '<div class="row myy page-limit" data-page="'. site_url().'/'. $paged .'">';
            while ( $query->have_posts()): $query->the_post();
                get_template_part('template-parts/postforajax-category2');

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