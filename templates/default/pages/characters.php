<?php
$global->check_logged_in();
$account = new Account($_SESSION['username']);
$character = new Character();

if (isset($_POST['change_password'])) {
    header("Location: ?page=changepassword");
    exit();
}

if (isset($_POST['unstick'])) {
    $guid = $_POST['guid'];
    if ($character->teleport_to_home($guid)) {
        echo "<script>alert('Персонаж успешно телепортирован домой!');</script>";
    } else {
        echo "<script>alert('Не удалось телепортировать персонажа.');</script>";
    }
}
?>


<!-- Верхнее меню -->
<?php
include $template_path . 'test/head.php';
?>
<div class="nk-content-body">
                        <div class="nk-content-wrap">
                            <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <h5 class="card-title">
                                <span class="mr-2">Персонажи <span class="text-primary"></span></span>
                            </h5>
                        </div>
                    </div>
                    <div class="card-inner p-0 border-top">
                        <div class="nk-tb-list nk-tb-ulist is-compact">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span class="sub-text">Персонаж</span></div>
                                                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Фракция</span></div>
                                                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Уровень</span></div>
                                <div class="nk-tb-col tb-col-sm"><span class="sub-text">Гильдия</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">PVP</span></div>
                                <div class="nk-tb-col tb-col-xl"><span class="sub-text">Арена</span></div>
                                <div class="nk-tb-col tb-col-xl"><span class="sub-text">Честь</span></div>
                                <div class="nk-tb-col tb-col-xl"><span class="sub-text">Достижения</span></div>
                                <div class="nk-tb-col tb-col-xl"><span class="sub-text">Статус</span></div>
                                <div class="nk-tb-col tb-col-xl"><span class="sub-text">Меню</span></div>
                            </div>
                            <!-- .nk-tb-item -->
                                                        <?php
                            $characters = $character->get_characters($_SESSION['account_id']);
                            foreach ($characters as $character) { ?>
                            <div class="nk-tb-item">
                                    <div class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar xs bg-primary" title="<?= $character['race_name']; ?>">
                                                <img src="<?= $character['race_image']; ?>" alt="" style="z-index: 1;" >
                                                    <span class="text-uppercase position-absolute"></span>
                                            </div>
                                            <div class="user-name"> <span class="tb-lead"><font color="<?= $character['class_color']; ?>"><?= $character['name']; ?></font></span> </div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-md"><img src="<?= $character['faction']; ?>" title="<?= $character['faction_text']; ?>"></div>
                                    <div class="nk-tb-col tb-col-md"><span><?= $character['level']; ?></span> </div>
                                    <div class="nk-tb-col tb-col-sm"><span><?= $character['guild_name']; ?></span> </div>
                                    <div class="nk-tb-col tb-col-md"><span>0</span> </div>
                                    <div class="nk-tb-col tb-col-xl"><span><img src="<?= $character['arena_image']; ?>" width="25px" height="25px"> <?= $character['arenaPoints']; ?></span> </div>
                                    <div class="nk-tb-col tb-col-xl"><span><img src="<?= $character['honor_image']; ?>" width="25px" height="25px"> <?= $character['totalHonorPoints']; ?></span></div>
                                    <div class="nk-tb-col tb-col-xl"><span><img src="<?= $character['achievement_image']; ?>" width="25px" height="25px"> <?= $character['achievement_count']; ?></span></div>
                                    <div class="nk-tb-col">
                                    <span><?= $character['gold']; ?> <img src="<?= $character['gold_image']; ?>" width="25px" height="25px">
                                        <?= $character['silver']; ?> <img src="<?= $character['silver_image']; ?>" width="25px" height="25px"> 
                                        <?= $character['copper']; ?> <img src="<?= $character['copper_image']; ?>" width="25px" height="25px"></span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <div class="drodown"> <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Инвентарь</span>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="?page=armory&charid=<?= $character['guid']; ?>">
                                                            <em class="icon ni ni-home-alt"></em>
                                                            <span>Оружейная</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </div>
                        </div>
<?php
include $template_path . 'test/foot.php';
?> 