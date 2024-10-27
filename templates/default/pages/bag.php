<?php
$global->check_logged_in();

$user_id = $_SESSION['account_id'];
$store = new Store();
$itemManager = new ItemManager();
$bag_items = $store->get_user_bag_items($user_id);

if (isset($_POST['submit_item_action'])) {
    $item_id = intval($_POST['item_id']);
    $action = $_POST['action'];
    $character = isset($_POST['character']) ? trim($_POST['character']) : null;


    
    if ($itemManager->handleItemAction($user_id, $item_id, $action, $character)) {
        header('Location: ?page=bag');
        exit();
    } else {
        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . htmlspecialchars($_SESSION['error']) . "</div>";
        }
    }
}

$characterManager = new Character();
$characters = $characterManager->get_characters($user_id);
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
                                <span class="mr-2">Склад</span>
                            </h5>
                        </div>
                    </div>
                    <div class="card-inner p-0 border-top">

                        <form id="transfer-all" method="POST">
                            <input type="hidden" name="_token" value="9mIa2f6XNzT1ohH2yMCw4SEnjXtqzP9eGlNjc9i4">
                        <div class="nk-tb-list nk-tb-ulist is-compact">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col check-col"><span class="sub-text"><input id="all-checks" class="check-box" type="checkbox" name="items" value=""></span></div>
                                <div class="nk-tb-col"><span class="sub-text">Предмет</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Количество</span></div>
                                <div class="nk-tb-col"><span class="sub-text"></span></div>
                            </div>
                            <!-- .nk-tb-item -->

                            <?php if (!empty($bag_items)): ?>
                            <?php foreach ($bag_items as $item): ?>
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col"><?= htmlspecialchars($item['id']) ?></div>
                                    <div class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar sm bg-primary">
                                                <img src="https://l2.wizardcp.com/images/items/etc_recipe_yellow_i00.png" alt="" title="<?= htmlspecialchars($item['name']) ?>">
                                            </div>
                                            <div class="user-name"> <a href='<?= $translations['wowhead_item'] ?><?= htmlspecialchars($item['id']) ?>' 
                                           data-wh-icon-size="slow" data-wh-rename-link="true" target='_blank'>
                                            <span class="tb-lead"><?= htmlspecialchars($item['name']) ?></span> 
                                        </a></div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col"> <span>1 шт.</span> </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <div class="drodown">
                                            <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Отправить в игру</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <em class="icon ni ni-inbox"></em>
                                                            <span>Выставить на аукцион</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                            <?php endforeach; ?>
                        <?php else: ?>
                            <p><?= $translations['cart_is_empty'] ?></p>
                        <?php endif; ?>
                            </div>
                        </form>

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