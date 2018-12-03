<div class="loginPanel col-md-2">
    <a id="startLog" href="#">Вход</a> | <a  id="startReg" href="#">Регистрация</a>

    <!--                           <?php #wp_register(); ?>-->
</div>

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

                <form action="" class="formSender" method="get" id="logFormSender">
                    <br>
                    <br>
                    <input type="email" placeholder="Enter your name" id="email">
                    <input type="password" placeholder="Enter your password" id="password">
                    <label><input type="checkbox" class="checkboxIn"> Запомнить меня</label>
                    <input type="submit" value="Войти" class="submit" id="submit">
                </form>
                <a href="#" class="newPassword" title="">Забыли пароль? Восстановить</a>
            </div>

            <div class="regContainer">




                <form action=" " class="formSender" method="post" id="regFormSender">
                    <br>
                    <br>
                    <input placeholder="Enter your Email" type="email" id="email" value="">
                    <input placeholder="Enter your name" type="text" id="username" value="">
                    <input type="password" placeholder="Enter your password" id="password" value="">
                    <p>
                        Подтверждение регистрации будет<br>
                        отправлено на ваш E-mail
                    </p>
                    <input type="submit" value="Регистрация" class="submit" id="submit">
                </form>


            </div>
        </div>
    </div>
</div>