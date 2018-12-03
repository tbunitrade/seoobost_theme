<?php
/*
  Plugin Name: Custom Registration
  Plugin URI: http://sierra-group.in.ua
  Description: Registration user
  Version: 1.0
  Author: P
  Author URI: http://sierra-group.in.ua
 */

function registration_form( $username, $password, $email ) {
echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" class="formSender">
        <div>
        <br>
        <br>            
            <input placeholder="Ваше имя" type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
        </div>
        <div>
            
            <input  placeholder="Ваш Пароль " type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
        </div>
        <div>            
            <input placeholder="Ваш Email" type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
        </div>
        <input class="submit"  type="submit" name="submit" value="Регистрация"/>
    </form>    
    ';
}
?>

<?php
function registration_validation( $username, $password, $email ){
    global $reg_errors;
    $reg_errors = new WP_Error;

    if (empty($username) || empty($password) || empty($email)) {
        $reg_errors->add('field', 'Required form field is missing');
    }
    if (4 > strlen($username)) {
        $reg_errors->add('username_length', 'Username too short. At least 4 characters is required');
    }
    if (username_exists($username))
        $reg_errors->add('user_name', 'Sorry, that username already exists!');

    if (!validate_username($username)) {
        $reg_errors->add('username_invalid', 'Sorry, the username you entered is not valid');
    }
    if (5 > strlen($password)) {
        $reg_errors->add('password', 'Password length must be greater than 5');
    }
    if (!is_email($email)) {
        $reg_errors->add('email_invalid', 'Email is not valid');
    }
    if (email_exists($email)) {
        $reg_errors->add('email', 'Email Already in use');
    }

    if (is_wp_error($reg_errors)) {
        foreach ($reg_errors->get_error_messages() as $error) {
            echo '<div class="errorR">';
            echo '<strong>ERROR </strong>:';
            echo $error . '<br/>';
            echo '</div>';
        }
    }

    function complete_registration()    {
        global $reg_errors, $username, $password, $email;
        if (1 > count($reg_errors->get_error_messages())) {
            $userdata = array(
                'user_login' => $username,
                'user_email' => $email,
                'user_pass' => $password,

            );
            $user = wp_insert_user($userdata);
            echo '<script type="text/javascript">
             $(document).ready( function() {
                    
                        $(".layoutAuthArea").show();
                        $(".loginContainer").css("display","block");
                        $(".regContainer").css("display","none");
                        $(".loginBtn").css("background","#6bbe92");
                        $(".loginBtn").css("color","#fff");
                        $(".regBtn").css("background","#29363d");
                        $(".regBtn").css("color","#a4a8ab");       
            
                    });
            
            </script>';


        }
    }
}

function custom_registration_function()
{
    if (isset($_POST['submit'])) {
        registration_validation(
            $_POST['username'],
            $_POST['password'],
            $_POST['email']
        );

        // sanitize user form input
        global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
        $username = sanitize_user($_POST['username']);
        $password = esc_attr($_POST['password']);
        $email = sanitize_email($_POST['email']);

        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
            $username,
            $password,
            $email
        );
    }

    registration_form(
        $username,
        $password,
        $email
    );
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode('cr_custom_registration', 'custom_registration_shortcode');

// The callback function that will replace [book]
function custom_registration_shortcode()
{
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}

