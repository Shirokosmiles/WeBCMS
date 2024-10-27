<?php
$global->check_logged_in();
$store = new Store();

$user_id = $_SESSION['account_id'];

if (isset($_POST['spin_wheel'])) {
    $currency_type = $_POST['currency_type'];
    $use_donor_points = ($currency_type === 'donor');

    if ($store->spin_wheel($user_id, $use_donor_points)) {
        $_SESSION['success_message'] = 'Вы успешно приобрели предмет!';
    } else {
        $errorMessage = $_SESSION['error'] ?? 'У вас недостаточно донат монет!';
    }

if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
}

}

$fortuneItems = $store->get_fortune_items_with_details();
?>


<!-- Верхнее меню -->
<?php
include $template_path . 'test/head.php';
?>



                   <div class="nk-content-body">
                        <div class="nk-content-wrap">
                            
                                                                                                                                                                                                                                                                                                        

<?php if ($successMessage) : ?>                
        <div class="alert alert-warning">
            <div class="alert-cta flex-wrap flex-md-nowrap">
                <div class="alert-text">
                    <p><?= $successMessage ?></p>
                </div>
            </div>

        </div>
<?php endif; ?> 

<?php if ($errorMessage) : ?>             
<div class="alert alert-fill alert-danger alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em>
                     <?= $errorMessage ?>
            <button class="close" data-dismiss="alert"></button>
</div>
<?php endif; ?> 

                                <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12">
            
                <link rel="stylesheet" href="<?= $template_path ?>css/wheel.css"/>
                <div class="card card-bordered" style="margin-bottom: 10px;">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <h5 class="card-title">
                                <span class="mr-2">Колесо удачи</span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="wheel-box">
                    <div class="wheel-box__col">
                        <div class="wheel-result">
                            <div class="">
                        <form method="POST" action="" class="flex items-center justify-between">
                        <div class="">
                            <select name="currency_type" class="bg-white p-2 rounded">
                                <option value="vote"><?= $translations['voting_coins'] ?></option>
                            </select>
                        </div>
                        <button type="submit" name="spin_wheel" class="btn bg-primary text-white hover:bg-primary-dark transition-colors">Крутить</button>
                    </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="wheel-box__col">
                        <div class="item-list">
                            <div class="item-list__title">Наградные предметы</div>
                            <div class="item-list__items" id="wheel-rewards">
                        <?php if (!empty($fortuneItems)): ?>
                            <?php for ($i = 0; $i < count($fortuneItems); $i += 2): ?>


                                    <?php for ($j = 0; $j < 2; $j++): ?>
                                        <?php if (isset($fortuneItems[$i + $j])): ?>
                                                           <div class="item-list__item">
                                            <div class="item-list__item-icon"><img src=""></div>
                                            <div class="item-list__item-info">
                                            <div class="item-list__item-name">
                                                <a href='<?= $translations['wowhead_item'] ?><?= htmlspecialchars($fortuneItems[$i + $j]['item_id']) ?>' data-wh-icon-size="slow" data-wh-rename-link="true" target='_blank'>
                                                    <span class="tooltiptext"></span>
                                                </a></div>
                                                <div class="item-list__item-desc">Стоимость <span><?= htmlspecialchars($fortuneItems[$i + $j]['vote_chance']) ?></span></div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                            <?php endfor; ?>
                        <?php else: ?>
                            <p><?= $translations['no_items_fortune'] ?></p>
                        <?php endif; ?>                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </div>
                        </div>



<script>
    const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};
</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>

<?php
include $template_path . 'test/foot.php';
?>  