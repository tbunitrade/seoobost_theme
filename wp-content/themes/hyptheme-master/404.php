<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <div class="sideBar"> </div>
	<main id="main" class="site-main" role="main">

        <h4 align="center" style="    margin-bottom: 30px; font-size: 24px">
            Ошибка 404, адрес к данному материалу устарел,<br> Вы найдете то, что искали ниже</h4>

        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('sidebar404'); ?>
            </div>
        </div>






    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer();?>
