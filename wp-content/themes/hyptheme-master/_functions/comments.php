<?php
// ===================================================
// ==== Comments  ==================
// ===================================================

function commentCount() {
    global $wpdb;
    $count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' WHERE comment_author_email = "' . get_comment_author_email() . '"');
    echo $count . ' comments';
}

/*Activate HTML5 features*/

add_theme_support('html5', array('comment-list', 'comment-form', 'search-form' ,'gallery','caption'));


add_action('comment_post','comment_ratings');

function comment_ratings($comment_id) {
    add_comment_meta($comment_id, 'rate', $_POST['rate']);
}

function comment_template($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
        <div class="comment-author vcard">
            <?php echo get_avatar($comment,$size='48'); ?>

            <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
        </div>

        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
            <br />
        <?php endif; ?>

        <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

        <?php
        $rate = get_comment_meta($comment->comment_ID, 'rate');
        if ($rate[0] <> '') {
            _e('Grade: ');
            echo movie_grade($rate[0]);
        }
        ?>

        <?php comment_text() ?>

        <div class="reply">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
    </div>
    <?php
}


function movie_grade($grade) {
    switch ($grade) {
        case '0':
            $alt = 'Zero - 0 stars';
            break;
        case '1':
            $alt = 'Really bad - 1 star';
            break;
        case '2':
            $alt = 'Bad - 2 stars';
            break;
        case '3':
            $alt = 'Good - 3 stars';
            break;
        case '4':
            $alt = 'Very good - 4 stars';
            break;
        case '5':
            $alt = 'Excellent - 5 stars';
            break;
        default:
            $alt = 'No grade';
            break;
    }

    if (!isset($grade) || $grade == '')
        echo $alt;
    else {
        for ($i = 0; $i < 5; $i++) {
            if ($grade > $i)
                echo '<img src="'.get_stylesheet_directory_uri().'/images/star_on.png" alt="'.$alt.'" title="'.$alt.'" />';
            else
                echo '<img src="'.get_stylesheet_directory_uri().'/images/star_off.png" alt="'.$alt.'" title="'.$alt.'" />';
        }
    }
}
