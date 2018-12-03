<?php
/**
 *   Template Name: reyting-kommentatorov
 *
 * https://codex.wordpress.org/Creating_a_Search_Page
 */
?>
<?php get_header(); ?>

<div id="primary" class="container content-area commentTabs">
    <main id="main" class="site-main" role="main">

           <ul id="tabs">
               <li><a class="" title="tab1">за неделю</a> </li>
               <li><a class="" title="tab2">за месяц</a> </li>
               <li><a class="" title="tab3">за все время</a> </li>
           </ul>

            <div id="content" class="container">
                <div id="tab1">
                    <table>
                        <tr class="row">
                            <th class="col-md-3">Пользователь</th>
                            <th class="col-md-3">Кол-во комментариев</th>
                            <th class="col-md-3">Место</th>
                        </tr>
                        <tr class="row">
                            <td class="col-md-3"><?php

                                $userid=1;
                                $comment_count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) AS total FROM $wpdb->comments WHERE comment_approved = 1 AND user_id = %s", $userid ) );
                                echo "Number of comments for user $userid is $comment_count";



                                ?></td>
                            <td class="col-md-3"> <?php

                                commentCount();

                                ?></td>
                            <td class="col-md-3"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div id="tab2">
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </div>
                <div id="tab3">
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </div>
            </div>
    </main>

</div>






    <script type="text/javascript">
        $(document).ready(function() {
            $("#content div").hide(); // Скрываем содержание
            $("#tabs li:first").attr("id","current"); // Активируем первую закладку
            $("#content div:first").fadeIn(); // Выводим содержание

            $('#tabs a').click(function(e) {
                e.preventDefault();
                $("#content div").hide(); //Скрыть все сожержание
                $("#tabs li").attr("id",""); //Сброс ID
                $(this).parent().attr("id","current"); // Активируем закладку
                $('#' + $(this).attr('title')).fadeIn(); // Выводим содержание текущей закладки
            });
        })
    </script>

<?php

get_footer(); ?>