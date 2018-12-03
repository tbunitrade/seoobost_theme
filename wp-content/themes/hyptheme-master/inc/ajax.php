<?php
/**
 * @package twentyseventeen

 ==============================
    Ajax function
 ==============================

 * Switches to the default theme.
 *
 * @since Twenty Seventeen 1.0
 */

add_action ('wp_ajax_nopriv_hyip_load_more','hyip_load_more');
add_action ('wp_ajax_hyip_load_more','hyip_load_more');

function hyip_load_more () {
    //load more post, we need hook
    $paged = $_POST["page"]+1;
    $prev = $_POST["prev"];

//    echo $prev;

    if ( $prev == 1 && $_POST["page"] != 1 ) {
        $paged = $_POST["page"]-1;
    }



    $query = new WP_Query( array(
       'post_type'  => 'post',
       'post_status'=> 'publish',
       'paged'      => $paged
    ));


    if ( $query->have_posts() ) :

        echo'<div class="page-limit" data-page="/page/' . $paged . '">';

        /* Start the Loop */
        while (  $query->have_posts() ) :  $query->the_post();
            get_template_part( 'template-parts/post/content', get_post_format() );
        endwhile;

        echo '</div>';
    else:
        echo 0;


    endif;
//    echo $paged;
    wp_reset_postdata();
    die();
}


function hyip_check_paged( $num = null ){
    $output = '';

    if( is_paged() ) { $output = 'page/' . get_query_var( 'paged '); }

    if ( $num == 1 ) {
            $paged = ( get_query_var('paged') == 0 ? 1 : get_query_var('paged'));
            return $paged;

    } else {
        return $output;
    }

}



























