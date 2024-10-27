<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $web_title ?></title>
    <link rel="shortcut icon" href="<?= $template_path ?>images/logos/logo.png">
    <link rel="apple-touch-icon" sizes="256x256" href="<?= $template_path ?>images/logos/logo.png">
    <link rel="stylesheet" href="<?= $template_path ?>css/all.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $template_path ?>css/main.min.css?ver=1.1520">
    <link rel="stylesheet" type="text/css" href="<?= $template_path ?>css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= $template_path ?>css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= $template_path ?>css/addition.css?ver=1.1520">
</head>

<body>

<div class="wrapper">
<!-- NAVIGATION -->
<nav class="nav">
    <div class="content-area">

        <a href="/" class="nav__logo">
            <img src="<?= $template_path ?>images/logos/logo.png" alt="logo">
        </a>

        <div class="nav__links">
<?php
$conn = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_website");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM menu";
if($result = mysqli_query($conn, $sql)){
     
    $rowsCount = mysqli_num_rows($result);
    foreach($result as $row){
            echo "<div class='nav__item'><a href='$row[link]' class='$row[class]'><span>$row[name]</span></a></div>";
    }
    mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</div>


      <div class="langs flex-cc">
    <!--  <div class="langs__content">
        <div class="langs__content-arrow"></div>
        <div class="langs__content-current flex-cc"><img src="<?= $template_path ?>images/langs/ru.png" alt="ru"></div>
        <ul class="langs__content-stroke">
                                        <li><a href="https://keltir.com/setlocale/en" class="flex-cc"><img src="<?= $template_path ?>images/langs/en.png" alt="en"></a></li>
                    </ul>
    </div>-->
</div>

                            <?php
                            if (!isset($_SESSION['username'])) { ?>
        <a href="?page=login" class="nav__auth flex-cc">
        <i class="fas fa-sign-in-alt"></i>
        <span>Войти</span>
    </a>
    <a href="?page=register" class="gray-btn nav__account-btn">
        <i class="fas fa-user-plus"></i>
        <span>Создать аккаунт</span>
    </a>
<?php } else { ?>
        <div class="nav__panel">
        <a href="?page=account" class="gray-btn nav__account-btn">
            <i class="fa-solid fa-user"></i>
            <span>Личный кабинет</span>
        </a>
        <a href="?page=logout" class="nav__panel-out">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>
<?php } ?>
        <div class="open-main-menu">
            <div class="open-main-menu__item"></div>
        </div>

    </div>
</nav>
<!-- END NAVIGATION -->