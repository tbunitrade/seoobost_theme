<?php
/*
Template Name: Search Page
*/


get_header(); ?>


<div id="primary" class="content-area container">

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
