
<!DOCTYPE html>
<html lang="ru" class="js">
<head>
    <meta charset="utf-8">
    <title>Личный кабинет • <?= $web_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= $template_path ?>css/cabinet.css?ver=1.11">
    <link rel="shortcut icon" href="<?= $template_path ?>images/favicon.png">
    <script src="<?= $template_path ?>js/jquery-2.1.1.min.js"></script>
    </head>

<body class="nk-body bg-white npc-default has-aside dark-mode">

<div class="nk-app-root">
    <div class="nk-main ">
        <style>
#prefix_refresh {
    margin-left: -26px;
    z-index: 9;
    position: absolute;
    margin-top: 7px;
    transition: all 0.5s linear;
    width: 23px;
    height: 23px;
}

.transform {
  transform: rotate(180deg);
}
</style>

    <div class="nk-wrap">

        <div class="nk-header nk-header-fixed is-light">
    <div class="container-lg wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-header-brand">
    <a href="?page=home" class="logo-link">
    <img class="logo-light logo-img" src="<?= $template_path ?>images/logos/logo.png" srcset="<?= $template_path ?>images/logos/logo.png 2x" alt="logo">
    <img class="logo-dark logo-img" src="<?= $template_path ?>images/logos/logo.png" srcset="<?= $template_path ?>images/logos/logo.png 2x" alt="logo-dark">
</a>
</div>

            <div class="nk-header-menu">
                <ul class="nk-menu nk-menu-main">

<?php
$conn = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_website");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}

$sql = "SELECT * FROM menu_cp_top";
if($result = mysqli_query($conn, $sql))
{
    $rowsCount = ($result);
   
    foreach($result as $row){

echo "<li class='nk-menu-item'><a href='$row[link]' class='nk-menu-link ' >
                <span class='nk-menu-text'>$row[name]</span>
        
    </a></li>";
                }
                
    $result->free();
} 
else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>

</ul>
            </div>
            <div class="nk-header-tools">
    <ul class="nk-quick-nav">
        <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle mr-lg-n1" data-toggle="dropdown">
                <div class="user-toggle">
                    <div class="user-avatar sm">
                        <em class="icon ni ni-user-alt"></em>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                    <div class="user-card">
                        <div class="user-avatar">
                            <em class="icon ni ni-user-alt"></em>
                        </div>
                        <div class="user-info">
                            <span class="lead-text"><?= $account->get_username(); ?></span>
                            <span class="sub-text"><?= $account->get_email(); ?></span>
                        </div>
                        <div class="user-action">
                            <a class="btn btn-icon mr-n2" href="https://l2.wizardcp.com/cabinet/settings/profile"><em class="icon ni ni-setting"></em></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <?php if ($user_rank >= 1) { ?>
                        <li>
                            <a href="/admin">
                                <em class="icon ni ni-setting-alt"></em>
                                <span>Панель админа</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="dropdown-inner">
                    <ul class="link-list">
                        <li>
                            <a href="?page=logout">
                                <em class="icon ni ni-signout"></em>
                                <span>Выход</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="d-lg-none">
            <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
        </li>
    </ul>
</div>
        </div>
    </div>
</div>

        <div class="nk-content ">
            <div class="container wide-xl">
                <div class="nk-content-inner">

                    <div class="nk-aside bg-transparent" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
                        <div class="nk-sidebar-menu" data-simplebar>


                            <ul class="nk-menu">


    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Личный кабинет</h6>
    </li>

<?php
$conn = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_website");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}

$sql = "SELECT * FROM menu_cp";
if($result = mysqli_query($conn, $sql))
{
    $rowsCount = ($result);
    echo "<li class='nk-menu-item'>";
    foreach($result as $row){

echo "
    <a href='$row[link]' class='nk-menu-link ' >
                    <span class='nk-menu-icon'><em class='icon ni ni-$row[icon]'></em></span>
                <span class='nk-menu-text'>$row[name]</span>
    </a>";
                }
                echo"</li>";
    $result->free();
}
else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>

    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Статус серверов</h6>

                    <li class="nk-menu-item">
    <a href="#"  class="nk-menu-link  server-click "  data-server="1">
                    <span class="nk-menu-icon"><em class="icon ni ni-server"></em></span>
                <span class="nk-menu-text"><?= $server->get_realm_name(); ?></span>
        <span class="badge badge-pill badge-success">
                Online  (<?= $server->get_online_players(); ?>)             </span>
    </a>
</li>

    </li>
</ul>


                        </div>
                        <div class="nk-aside-close">
                            <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
                        </div>
                    </div>