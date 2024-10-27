<?php
   if (isset($_POST['submit'])) {
       $login = new Login($_POST['username'], $_POST['password']);
       //$login->login_checks();
   
       if ($login->login()) {
           header("Location: ?page=account");
           exit();
       }
   }
   
   if (isset($_SESSION['error'])) {
       echo "<div class='alert alert-danger text-center' role='alert'>" . $_SESSION['error'] . "</div>";
       unset($_SESSION['error']);
   }
   
   ?>




    <!-- HEADER -->
    <header class="header header--auth">
        <div class="content-area">
            <div class="auth">
                <div class="auth__box auth__box--big">
                    <div class="auth__box-border">
                        <img class="auth__box-border-top" src="<?= $template_path ?>images/icons/border-icon-top.png" alt="">
                    </div>
                    <h2 class="auth__box-title">Вход в аккаунт</h2>
                    <div class="auth__box-content">

                        
                                                                                                                                                                                                                                                                

                            <form class="form" method="POST"> 
                                <input type="hidden" name="_token" value="GD8Bhv3KXxE6FEZWPLIRSDKvYLNZk80Ou7g9PhJa">
                                <div class="form__group">
                                <label>Логин</label>
                                <div class="form__group-input">
                                    <input type="text" name="username" id="username" placeholder="Введите свой Логин" required>
                                </div>
                                                            </div>

                            <div class="form__group">
                                <label>Пароль</label>
                                <small>( используйте латинские буквы и введите не менее 8 символов )</small>
                                <div class="form__group-input">
                                    <input type="password" name="password" placeholder="Введите свой пароль" required>
                                </div>
                                                            </div>

                            <div class="checkbox-block">
                                <input name="remember" type="checkbox" value="1" id="about-promotions">
                                <label class="checked" for="about-promotions">
                                    <div class="square"></div>
                                    Запомнить меня
                                </label>
                            </div>

                                                                    
                            <div class="form__group">
                                <button type="submit" name="submit"><span>Авторизоваться</span></button>
                            </div>

                            <div class="form__group">
                                <div class="form__links">
                                    Нет аккаунта? <a href="?page=register">Зарегистрироваться</a><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->