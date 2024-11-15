<?php
session_start();
foreach (glob("engine/configs/*.php") as $filename) {
    require_once $filename;
}
foreach (glob("functions/*.php") as $filename) {
    require_once $filename;
}

if (!isset($_GET['page'])) {
    $page = 'dashboard';
} else {
    if (preg_match('/[^a-zA-Z]/', $_GET['page'])) {
        $page = 'dashboard';
    } else {
        $page = $_GET['page'];
    }
}

require_once '../engine/functions/account.php';
require_once '../engine/functions/database.php';

$account = new Account($_SESSION['username']);
$rank = $account->get_rank();

if ($rank < 1) {
    header("Location: /?page=home");
    exit();
}

$stats = new Dashboard();

$db = (new Configuration())->getDatabaseConnection('website');

$lang = 'en';
$result = $db->query("SELECT lang_code FROM languages WHERE is_active = 1");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lang = htmlspecialchars($row['lang_code'], ENT_QUOTES, 'UTF-8');
}

$_SESSION['lang'] = $lang;

$lang_file = __DIR__ . '/../lang/' . $lang . '.php';
if (file_exists($lang_file)) {
    $translations = require($lang_file);
} else {
    $translations = require(__DIR__ . '/../lang/en.php');
    error_log("Language file not found: " . $lang_file);
}

?>

<!DOCTYPE html>
<html lang="ru" class="js">
<head>
    <meta charset="utf-8">
    <title>Панель управления - Главная • World of Warcraft demo website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/backend.css">
    <link rel="stylesheet" href="../assets/css/dashlite.css">
    <link rel="stylesheet" href="../assets/css/theme.css">
    <link rel="stylesheet" href="../assets/css/theme.css">
    <link rel="shortcut icon" href="/images/favicon.png">

    <script src="../assets/js/jquery-2.1.1.min.js"></script>
    <script src="../assets/js/ckeditor/ckeditor.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7N5B4KFFK9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7N5B4KFFK9');
</script>
</head>
<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s  -->
        <div class="nk-main ">
            <!-- sidebar @s  -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="/admin" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="/assets/images/wow-logo-white.png" srcset="/assets/images/wow-logo-white.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="/assets/images/wow-logo-white.png" srcset="/assets/images/wow-logo-white.png 2x" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>

                <!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Администрирование</h6>
                                </li>
                               
                                                            <!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="/admin" class="nk-menu-link ">
                                                <span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
                                                <span class="nk-menu-text">Главная</span>
                                            </a>
                                        </li>
                                
                                                                    <!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="/admin/account" class="nk-menu-link ">
                                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                                <span class="nk-menu-text">Пользователи</span>
                                                <span class="nk-menu-badge"><?php echo $stats->total_accounts(); ?></span>
                                            </a>
                                        </li>
                                        <!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="/admin/news" class="nk-menu-link ">
                                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                                <span class="nk-menu-text">Новости</span>
                                                <span class="nk-menu-badge"><?php echo $stats->total_news(); ?></span>
                                            </a>
                                        </li>
                                        <!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="/admin/votes" class="nk-menu-link ">
                                                <span class="nk-menu-icon"><em class="icon ni ni-cards"></em></span>
                                                <span class="nk-menu-text">Голосование</span>
                                                <span class="nk-menu-badge">6</span>
                                            </a>
                                        </li>
                                        <!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="/admin/settings" class="nk-menu-link ">
                                                <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
                                                <span class="nk-menu-text">Настройки</span>
                                            </a>
                                        </li>
                                        <!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="/admin/profile" class="nk-menu-link ">
                                                <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                                <span class="nk-menu-text">Профиль</span>
                                            </a>
                                        </li>
                                
                                                                    <!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="/admin/tickets" class="nk-menu-link ">
                                            <span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span>
                                            <span class="nk-menu-text">Тикеты</span>
                                            <span class="nk-menu-badge"><?php echo $stats->total_tickets(); ?></span>
                                        </a>
                                    </li>
                                


                                   

                                    
                                                                <!-- .nk-menu-item -->
                                

                                

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->


            </div>
            <!-- sidebar @e  -->
            <!-- wrap @s  -->
            <div class="nk-wrap ">
                <!-- main header @s  -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="https://wow.wizardcp.com/backend" class="logo-link">
                                    <img class="logo-light logo-img" src="/assets/images/wow-logo-white.png" srcset="/assets/images/wow-logo-white.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="/assets/images/wow-logo-white.png" srcset="/assets/images/wow-logo-white.png 2x" alt="logo-dark">
                                    <span class="nio-version">General</span>
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">

                                        <div class="nk-news-text">
                                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                        </div>

                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">

                                <ul class="nk-quick-nav">

                                <li class="dropdown user-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <div class="user-toggle">
            <div class="user-avatar sm">
            <img src="<?php echo $account->get_avatar(); ?>" alt="Аватар пользователя">
            </div>
            <div class="user-info d-none d-md-block">
                <div class="user-status"><?= $translations['rank_adm'] ?></div>
                <div class="user-name dropdown-indicator"><?= $account->get_username(); ?></div>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
            <div class="user-card">
                <div class="user-avatar">
                <img src="<?php echo $account->get_avatar(); ?>" alt="Аватар пользователя">
                </div>
                <div class="user-info">
                    <span class="lead-text"><?= $account->get_username(); ?></span>
                    <span class="sub-text"><?= $account->get_email(); ?></span>
                </div>
            </div>
        </div>

                    <div class="dropdown-inner">
                <ul class="link-list">
                    <li><a href=""><em class="icon ni ni-setting-alt"></em><span>Настройки профиля</span></a></li>
                    <li><a href=""><em class="icon ni ni-activity-alt"></em><span>Активные устройства</span></a></li>
                </ul>
            </div>
        
        <div class="dropdown-inner">
            <ul class="link-list">
                <li><a href="/admin/logout"><em class="icon ni ni-signout"></em><span>Выход</span></a></li>
            </ul>
        </div>
    </div>
</li>


                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e  -->

                <!-- content @s  -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
   
                                    
                <!-- Страницы Pages -->
                        <?php

if (file_exists('pages/' . $page . '.php')) {
    include 'pages/' . $page . '.php';
} else {
    include 'pages/404.php';
}
?>
</div>
                        </div>
                    </div>
                </div>
                <!-- content @e  -->



                <!-- footer @s  -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; <?= date('Y') ?> <a href="https://orstet.ru" target="_blank" rel="dofollow"><?= $web_title ?></a> FrontEnd by <a href="https://orstet.ru" target="_blank" rel="dofollow">Aizen </a> & BackEnd <a href="https://epicore.eu" target="_blank" rel="dofollow">Null </a>
                            </div>

                            <div class="btn-container">
                                <label class="switch btn-color-mode-switch">
                                    <input type="checkbox" name="color_mode" id="color_mode"  value="1">
                                    <label for="color_mode" data-on="Dark" data-off="Light" class="btn-color-mode-switch-inner"></label>
                                </label>
                            </div>
                    </div>
                </div>
                <!-- footer @e  -->
                </div>
            </div>
        </div>
</body>

    <script>
        $(document).ready(function() {
            $("#color_mode").on("change", function () {
                if($(this).prop("checked") == true){
                    $.get('/settheme/dark');
                    $('link[href="../assets/css/theme.css"]').attr('href', '../assets/css/backend-dark.css?ver=2');
                }
                else if($(this).prop("checked") == false){
                    $.get('/settheme/light');
                    $('link[href="../assets/css/backend-dark.css?ver=2"]').attr('href', '../assets/css/theme.css');
                }
            })
        });
    </script>
<!-- JavaScript -->
<script src="../assets/js/bundle.js?ver=1.0.0"></script>
<script src="../assets/js/scripts.js?ver=1.0.0"></script>
<script src="../assets/js/charts/gd-general.js?ver=1.0.0"></script>
</html>