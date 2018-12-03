<div class="loginPanel col-md-2">
    <a id="startLog" href="#">Вход</a> <span id="spanLogReg">|</span> <a  id="startReg" href="#">Регистрация</a>
    <div id="ifLogIn">  <?php wp_register('',''); ?></div>
</div>

<script type="text/javascript">
    $(document).ready( function() {

        $("#startLog").click ( function () {
            $(".layoutAuthArea").show();
            $(".loginContainer").css("display","block");
            $(".regContainer").css("display","none");
            $(".loginBtn").css("background","#6bbe92");
            $(".loginBtn").css("color","#fff");
            $(".regBtn").css("background","#29363d");
            $(".regBtn").css("color","#a4a8ab");
        });


        $("#startReg").click ( function () {
            $(".layoutAuthArea").show();
            $(".loginContainer").css("display","none");
            $(".regContainer").css("display","block");
            $(".regBtn").css("background","#6bbe92");
            $(".regBtn").css("color","#fff");
            $(".loginBtn").css("background","#29363d");
            $(".loginBtn").css("color","#a4a8ab");
        });



        $(".closeAuth").click ( function () {
            $("#layoutAuthArea").hide();
        });

        $(".regBtn").click (function(){
            $(".loginContainer").css("display","none");
            $(".regContainer").css("display","block");
            $(".regBtn").css("background","#6bbe92");
            $(".regBtn").css("color","#fff");
            $(".loginBtn").css("background","#29363d");
            $(".loginBtn").css("color","#a4a8ab");
        }) ;

        $(".loginBtn").click (function(){
            $(".loginContainer").css("display","block");
            $(".regContainer").css("display","none");
            $(".loginBtn").css("background","#6bbe92");
            $(".loginBtn").css("color","#fff");
            $(".regBtn").css("background","#29363d");
            $(".regBtn").css("color","#a4a8ab");
        }) ;
    });

</script>

<div id="layoutAuthArea" class="layoutAuthArea">
    <div class="form">
        <div class="closeAuth" id="closeAuth"></div>

        <div class="earth TopContainer">
            <div class="loginBtn">Вход</div>
            <div class="planet"></div>
            <div class="regBtn">Регистрация</div>
        </div>

        <div class="middleContainer">
            <div class="loginContainer">

                <br>
                <?php wp_login_form($args);

                $args = array(
                    'echo' => true,
                    'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
                    'form_id' => 'loginform',
                    'label_username' => 'Логин',
                    'label_password' => 'Пароль',
                    'label_remember' => 'Запомнить меня',
                    'label_log_in' => 'Войти',
                    'id_username' => 'user_login',
                    'id_password' => 'user_pass',
                    'id_remember' => 'rememberme',
                    'id_submit' => 'wp-submit',
                    'remember' => true,
                    'value_username' => NULL,
                    'value_remember' => false
                );


                ?>

                <a href="<?php echo wp_lostpassword_url(); ?>" class="newPassword"  title="Lost Password">Забыли пароль? Восстановить</a>

            </div>

            <div class="regContainer">
                <?php echo do_shortcode ('[cr_custom_registration]'); ?>
            </div>
        </div>
    </div>
</div>