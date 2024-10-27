<?php
$global->check_logged_in();
$account = new Account($_SESSION['username']);
$armory = new Armory();

$character_stats = null;
$equipped_items = [];
$achievement_points = 0;
$recent_achievements = [];

if (isset($_GET['charid']) && is_numeric($_GET['charid'])) {
    $charid = (int)$_GET['charid'];
    
    $character_stats = $armory->getCharacterStats($charid);
    $equipped_items = $armory->getEquippedItems($charid);
    $achievement_points = $armory->getAchievementPoints($charid);
    $recent_achievements = $armory->getRecentAchievements($charid);
}
?>
<link rel="stylesheet" href="<?= $template_path ?>css/armory.css">
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
                        <div class="card-head">
                            <h5 class="card-title"><?= htmlspecialchars($character_stats['name']) ?></h5>
                        </div>
<div class="w-full mt-28"><!---->
    <div><!--[-->
                               
        <div class="profile">
            <div class="profile_row armory_row self_clear">
                <div class="armory_tab summary_tab">
                    <div class="profile_row inventory_row advanced">
                        <div class="inventory_left pull_left">
                        <?php 
                    $left_items_indices = [0, 1, 2, 14, 4, 3, 18, 8];
                    foreach ($left_items_indices as $index): ?> 
                        
                            <div class="item-holder">
                                <div class="item-slot">
                                    <div class="item-quality">
                                        <a href="<?= $translations['wowhead_item'] ?><?= $equipped_items[$index]['id'] ?>" data-wh-icon-size="large" data-wh-rename-link="true" target="_blank"></a>
                                        <img width="49" height="49" src="<?= htmlspecialchars($equipped_items[$index]['icon']) ?>">
                                    </div><!---->
                                </div>
                            </div>
                    
                    <?php endforeach; ?>
                    </div>

                    <div class="inventory_right pull_right">
                    <?php 
                    $right_items_indices = [9, 5, 6, 7, 10, 11, 12, 13];
                    foreach ($right_items_indices as $index): ?>
                    
                        <div class="item-holder">
                            <div class="item-slot">
                                <div class="item-quality">
                                    <a href="<?= $translations['wowhead_item'] ?><?= $equipped_items[$index]['id'] ?>" target="_blank"></a>
                                    <img width="49" height="49" src="<?= htmlspecialchars($equipped_items[$index]['icon']) ?>">
                                </div><!---->
                            </div>
                        </div>
                        
                    
                    <?php endforeach; ?>
                    </div>
                    <div class="clear"></div>
                    <div class="inventory_bottom self_clear">
<?php 
    $bottom_items = [15, 16, 17];
    foreach ($bottom_items as $index): ?>
        <?php if (isset($equipped_items[$index])): ?>
                    
                        <div class="item-holder">
                            <div class="item-slot">
                                <div class="item-quality">
                                    <a href="<?= $translations['wowhead_item'] ?><?= $equipped_items[$index]['id'] ?>" target="_blank"></a>
                                    <img width="49" height="49" src="<?= htmlspecialchars($equipped_items[$index]['icon']) ?>">
                                </div><!---->
                            </div>
                        </div>
                
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
            </div>
        </div>
    </div>
</div>

<!--]--></div><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                </div>
                </div>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
<?php
include $template_path . 'test/foot.php';
?>  