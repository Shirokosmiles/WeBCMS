<?php
if (isset($_POST['submit'])) {
    $reg = new Registration($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirmation']);
    $reg->register_checks();
}

if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger text-center' role='alert'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}
?>
    <!-- HEADER -->
    <header class="header header--start">
        <div class="content-area">
            <div class="auth">

                                <div class="auth__box">
                    <div class="auth__box-border">
                        <img class="auth__box-border-top" src="<?= $template_path ?>images/icons/border-icon-top.png" alt="">
                    </div>
                    <h2 class="auth__box-title">Создайте аккаунт</h2>
                    <div class="auth__box-content">
                            <form class="form" method="post" action="">
                            <div class="form__group">
                                <label>Логин</label>
                                <div class="form__group-input">
                                    <input type="text" id="username" name="username" placeholder="Введите свой Логин" required>
                                </div>
                            </div>

                            <div class="form__group">
                                <label>E-mail</label>
                                <div class="form__group-input">
                                    <input type="email" id="email" name="email" placeholder="Введите свой e-mail"  required>
                                </div>
                            </div>


                            <div class="form__group">
                                <label>Пароль</label>
                                <small>( используйте латинские буквы и введите не менее 8 символов )</small>
                                <div class="form__group-input">
                                    <input type="password" id="password" name="password" placeholder="Введите свой пароль" required>
                                    <div class="password-switch">
                                        <img class="password-switch__hide" src="<?= $template_path ?>images/icons/show-password.png" alt="">
                                        <img class="password-switch__show" src="<?= $template_path ?>images/icons/hidden-password.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form__group">
                                <label>Подтвердите пароль</label>
                                <small>( используйте латинские буквы и введите не менее 8 символов )</small>
                                <div class="form__group-input">
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Введите пароль еще раз" required>
                                    <div class="password-switch">
                                        <img class="password-switch__hide" src="<?= $template_path ?>images/icons/show-password.png" alt="">
                                        <img class="password-switch__show" src="<?= $template_path ?>images/icons/hidden-password.png" alt="">
                                    </div>
                                </div>
                                                            </div>

                            <div class="checkbox-block">
                                <input name="ok" type="checkbox" value="1" checked="checked" id="privacy-policy" required>
                                <label class="checked" for="privacy-policy">
                                    <div class="square"></div>
                                    Я согласен с <a href="https://keltir.com/privacy">Политикой конфиденциальности, пользовательским соглашением</a>
                                    и
                                    <a href="https://keltir.com/rules">Правилами сервера.</a>
                                </label>
                            </div>
                            
                            <div class="checkbox-block">
                                <input name="ok2" type="checkbox" checked="checked" id="about-promotions">
                                <label class="checked" for="about-promotions">
                                    <div class="square"></div>
                                    Я согласен с получением информации об акциях
                                </label>
                            </div>


                            <div class="form__group">
                                 <button type="submit" name="submit"><span>Зарегистрироваться</span></button>
                            </div>
                        </form>

                    </div>
                </div>
                
                <div class="auth__box">
                    <div class="auth__box-border">
                        <img class="auth__box-border-top" src="<?= $template_path ?>images/icons/border-icon-top.png" alt="">
                    </div>
                    <h2 class="auth__box-title">Скачай файлы</h2>
                    <div class="auth__box-content">
                        <div class="download">
                            <a class="download__button" href="https://files.keltir.com/files/updater/Keltir_v2.1.exe">
                                <img src="<?= $template_path ?>images/icons/start__item-download.png">
                                <div>
                                    <span>Игровой Лаунчер v2.1</span>
                                    <span>Размер: 1.5 MB</span>
                                </div>
                            </a>
                            <a class="download__button" href="https://files.keltir.com/files/client/KeltirC4.zip">
                                <img src="<?= $template_path ?>images/icons/start__item-download.png">
                                <div>
                                    <span>Скачать клиент игры</span>
                                    <span>Размер: 2.38 Gb</span>
                                </div>
                            </a>
                            <p class="download__mirror-group">
                                <a class="download__mirror" href="https://drive.google.com/file/d/18cGOJeGrTySANPTZ1eQGS53brAOQzmdu/view?usp=sharing">
                                    <span>Зеркало</span>
                                </a>
                                /
                                <a class="download__mirror" href="https://mega.nz/file/plgzCQ6b#BEbX37aOSH-oRf0t79yY8nnMVpNVkzLFZE6br_rHXpw">
                                    <span>Зеркало</span>
                                </a>
                            </p>

                            <h3>КАК НАЧАТЬ ИГРАТЬ В LINEAGE 2?</h3>

<ol>
    <li>Создайте мастер аккаунт и подтвердите его при помощи письма, отправленного на вашу почту</li>
    <li>Войдите в личный кабинет и создайте игровой аккаунт</li>
    <li>Скачайте Updater и распакуйте его в папку, где будет находиться игра</li>
    <li>Запустите Updater и нажмите &laquo;Полная проверка&raquo;</li>
    <li>После завершения полной проверки нажмите &laquo;Начать игру&raquo;. Также войти в игру <span>можно запустив файл L2.exe из папки system</span></li>
</ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- END HEADER -->