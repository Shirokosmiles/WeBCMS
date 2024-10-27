<?php
session_start();

$global->check_logged_in();
$account = new Account($_SESSION['username']);

if (isset($_POST['change_password'])) {
    header("Location: ?page=changepassword");
    exit();
}

$vote_result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vote'])) {
    $vote_site = $_POST['vote_site'];
    $vote_result = $account->vote($vote_site);

    if (is_array($vote_result) && isset($vote_result['url'])) {
        header("Location: " . $vote_result['url']);
        exit();
    } else {
        $vote_result = $vote_result;
    }
}

$vote_sites = $account->get_vote_sites();
?>


<!-- Верхнее меню -->
<?php
include $template_path . 'test/head.php';
?>

                    <div class="nk-content-body">
                        <div class="nk-content-wrap">
    <link rel="stylesheet" href="/css/css-update.css?ver=1.11"/>
               <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-12">
                            <div class="card card-bordered">
                                <div class="card-inner mb-4">
                                    <div class="card-title-group">
                                        <h5 class="card-title">
                                            <span class="mr-2">Голосование за сервер</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="card-inner p-0 border-top">
                                    <div class="nk-tb-list nk-tb-ulist is-compact">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span class="sub-text" style="margin-left: 15px;">Площадка</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Статус</span></div>
                                            <div class="nk-tb-col"><span class="sub-text"></span>Награда</div>
                                            <div class="nk-tb-col" style="text-align: center;"><span class="sub-text"></span>До повторного голосования</div>
                                            <div class="nk-tb-col"><span class="sub-text"></span></div>
                                        </div>
                                        <!-- .nk-tb-item -->
                                        <?php foreach ($vote_sites as $site): ?>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="voting-img">
                                                            <img src="https://l2.wizardcp.com/img/info/company_09.png">
                                                        </div>
                                                        <div class="voting-name"><span class="tb-lead">  <?= htmlspecialchars($site['name']) ?></span></div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span style="color: #0acf0a;"><?php
                        if (!empty($vote_result)) {
                            echo '<p>' . htmlspecialchars($vote_result) . '</p>';
                        }
                        ?></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span>
                                                        <img src="/storage/images/VgtV7vrqaag2A3Mr8q1WhDd1JJpvoTwzoI8WnL5l.webp" alt="" title="Премиум подарочная коробка - 7 дней RU" style="width: 32px;height: 32px;">
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col" style="text-align: center;">
                                                    <span>
                                                        -
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span>
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="vote_site" value="<?= htmlspecialchars($site['url']) ?>">
                                                            <button type="submit" name="vote">Голосовать</button>
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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







<div class="hero min-h-screen hero14">
    <div class="hero-overlay bg-opacity-70"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="container">
            <div class="max-w-3xl mt-36 2xl:pt-0">
                <h1 class="mb-5 text-4xl font-bold text-white text-shadow_dark"><?= $translations['vote_for_us'] ?></h1>
                <div class="text-white bg-slate-950/60 p-9 rounded-lg text-left leading-loose">

                    <div class="mt-2">
                        <div class="divider mb-5"><?= $translations['voting_sites'] ?></div>

                        <div role="alert" class="alert shadow-lg bg-cyan-950/40">
                            <div>
                                <h3 class="font-bold"><?= $translations['awards'] ?></h3>
                                <div class="text-sm">
                                    <p class="sm:inline leading-loose">
                                        <?= $translations['awards_info'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class='text-center text-white'></th>
                                    <th class='text-center text-white'><?= $translations['website'] ?></th>
                                    <th class='text-center text-white'><?= $translations['action'] ?></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php foreach ($vote_sites as $site): ?>
                                <tr>
                                    <td class='text-center'>
                                        <img src="https://mmotop.ru/uploads/rating_img/mmo_38047.png" alt="<?= htmlspecialchars($site['url']) ?>" class="max-w-20 max-h-20">
                                        
                                    </td>
                                    <td class='text-center'>
                                        <span class="text-cyan-500"><?= htmlspecialchars($site['name']) ?></span>
                                    </td>
                                    <td class='text-center'>
                                        <form method="POST" action="">
                                            <input type="hidden" name="vote_site" value="<?= htmlspecialchars($site['url']) ?>">
                                            <button type="submit" name="vote" class="btn bg-teal-600 hover:bg-teal-700 text-white"><?= $translations['vote'] ?></button>
                                        </form>
                                    </td>
    </tr>
    <?php endforeach; ?>
                            </tbody>

                        </table>
                        <?php
                        if (!empty($vote_result)) {
                            echo '<p>' . htmlspecialchars($vote_result) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
