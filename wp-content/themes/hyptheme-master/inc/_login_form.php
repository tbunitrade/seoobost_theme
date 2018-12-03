<?php
/**
 * Doctor area - Login Page.
 */
?>
<div id="primary" class="content-area blue-title">
    <main id="main" class="site-main" role="main">

        <section class="intro-login">
            <div class="login-form-wrap">
                <form id="login" action="login" method="post">
	                <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                    <div class="login-inputs-wrap">
                        <label for="username">שם משתמש</label>
                        <input id="username" type="text" name="username">
                        <label for="password">סיסמא</label>
                        <input id="password" type="password" name="password">
                        <br>
                    </div>
                    <input class="submit_button" type="submit" value="כניסה" name="submit">
                    <p class="status"></p>

                </form>

            </div>

        </section>
    </main>
</div>