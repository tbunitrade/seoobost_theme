<div class="loginPanel col-md-2">
    <a id="startAuth" href="#">Вход</a> | <a href="<?php echo get_site_url();  ?>/wp-login.php?action=register">Регистрация</a>
</div>

<script>
    $("#startAuth").click( function(){
        $(".layoutAuthArea").toggle();
    });
</script>
<div id="layoutAuthArea" class="layoutAuthArea">
    <div class="form">
        <div class="earth TopContainer">
            <div class="loginBtn"></div>
            <div class="planet"></div>
            <div class="regBtn"
        </div>
        <div class="middleContainer">
            <div class="loginContainer">
                <form action="" class="formSender" method="get" id="logFormSender">
                    <input type="email" placeholder="Enter your name" id="email">
                    <input type="password" placeholder="Enter your password" id="password">
                    <input type="submit" value="LogIn" class="submit" id="submit">
                </form>
            </div>

            <div class="regContainer">
                <form action="" class="formSender" method="get" id="regFormSender">
                    <input placeholder="Enter your Email" type="email" id="email">
                    <input placeholder="Enter your name" type="text" id="name">
                    <input type="password" placeholder="Enter your password" id="password">
                    <input type="submit" value="Регистрация" class="submit" id="submit">
                </form>
            </div>
        </div>
    </div>
</div>