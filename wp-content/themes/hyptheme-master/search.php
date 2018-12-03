<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area container">

    <header class="page-header">
        <?php if ( have_posts() ) : ?>
            <h1 class="page-title"><?php printf( __( 'Вы нашли: %s', 'hyiptheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        <?php else : ?>
            <h1 class="page-title"><?php _e( 'Ничего не найдено', 'hyiptheme' ); ?></h1>
        <?php endif; ?>
    </header><!-- .page-header -->

    <div class="googleSearch">
        <script>
            (function() {
                var cx = '016004673611404643148:j_sypcb0qum';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
            })();
        </script>
        <gcse:search></gcse:search>
    </div>

</div><!-- #primary -->


<?php get_footer();?>
