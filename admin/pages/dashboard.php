<?php 
$stats = new Dashboard();
$template_name = $stats->get_template_name();
list($race_stats, $class_stats) = $stats->get_race_class_statistics();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_template_name'])) {
    $new_template_name = $_POST['new_template_name'];

    if ($stats->update_template_name($new_template_name)) {
        $template_name = $new_template_name;
        echo '<div class="alert alert-success">Имя шаблона успешно обновлено!</div>';
    } else {
        echo '<div class="alert alert-danger">Не удалось обновить имя шаблона. Попробуйте еще раз.</div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lang_code'])) {
    $lang_code = $_POST['lang_code'];
    $new_status = $_POST['new_status'];
    
    if ($stats->update_language_status($lang_code, $new_status)) {
    }
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$total_pages = $stats->get_total_pages($limit);
$gm_logs = $stats->get_gm_logs($page, $limit);


?>

                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"><?= $translations['general'] ?></h3>
                                            <div class="nk-block-des text-soft">
                                                <p><?= $translations['desc'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


<!-- <script>const whTooltips = {colorLinks: true, iconizeLinks: false, renameLinks: false};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script> -->
<script src="https://wow.net.kg/tooltip/tooltip.js"></script>
<style>
.pagination a.active {
    font-weight: bold;
    text-decoration: underline;
}
</style>

 <!-- .nk-block -->
            <div class="col-12">
                <div class="card card-bordered">

                    <div class="card-inner p-0 border-top">
                        <div class="nk-tb-list nk-tb-ulist is-compact">
                            <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col tb-col-md"><span class="sub-text">Время</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Игрок</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Аккаунт</span></div>
                                <div class="nk-tb-col"><span class="sub-text">GUID предмета</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Количество</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Цель</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Realm ID</span></div>                                
                            </div>
                            <!-- .nk-tb-item -->
                            
                            <?php 
            foreach ($gm_logs as $log) {
                echo '<div class="nk-tb-item">';
                echo '<div class="nk-tb-col tb-col-md"><span>' . htmlspecialchars($log['time']) . '</span></div>';
                echo '<div class="nk-tb-col"><span>' . htmlspecialchars($log['player']) . '</span></div>';
                echo '<div class="nk-tb-col"><span>' . htmlspecialchars($log['account']) . '</span></div>';
                echo '<div class="nk-tb-col"><span><a href="" data-entry="' . htmlspecialchars($log['item_guid']) . '" target="_blank">' . htmlspecialchars($log['item_guid']) . '</a></span></div>';
              //  echo '<div class="nk-tb-col"><span><a href="https://www.wowhead.com/wotlk/ru/item=' . htmlspecialchars($log['item_guid']) . '" class="flex flex-row text-decoration-none has-item item-container w-full" data-wh-icon-size="small" data-wh-rename-link="true" target="_blank">' . htmlspecialchars($log['item_guid']) . '</a></span></div>';
                echo '<div class="nk-tb-col"><span>' . htmlspecialchars($log['count']) . '</span></div>';
                echo '<div class="nk-tb-col"><span>' . htmlspecialchars($log['target']) . '</span></div>';
                echo '<div class="nk-tb-col"><span>' . htmlspecialchars($log['realmId']) . '</span></div>';
                echo '</div>';
            }
            ?>
            </div>
            <div class="card-inner">
                        <nav>
        <ul class="pagination">
        <?php if ($page > 1): ?>
          <li class='page-item'><a href="?page=<?= $page - 1 ?>" class='page-link'>&laquo; Назад</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <li class='page-item'><a href="?page=<?= $i ?>" class='page-link'><?= $i ?></a></li>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
          <li class='page-item'><a href="?page=<?= $page + 1 ?>" class='page-link'>Следующая &raquo;</a></li>
        <?php endif; ?>
        </ul>
                      </nav>

                    </div>
                    </div>
                  </div>
            </div>
<!-- .nk-block -->