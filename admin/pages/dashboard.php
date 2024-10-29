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

    <div class="card-boxes">
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo $stats->total_accounts(); ?></div>
          <div class="box_topic"><?= $translations['t_acc'] ?></div>
        </div>
        <i class='bx bx-user'></i>
      </div>
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo $stats->total_characters(); ?></div>
          <div class="box_topic"><?= $translations['t_char'] ?></div>
        </div>
        <i class='bx bxs-cart-add'></i>
      </div>
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo $stats->premiun_accounts(); ?></div>
          <div class="box_topic"><?= $translations['t_prem'] ?></div>
        </div>
        <i class='bx bx-cart'></i>
      </div>
      <div class="box">
        <div class="right_side">
          <div class="numbers"><?php echo $stats->total_tickets(); ?></div>
          <div class="box_topic"><?= $translations['t_tick'] ?></div>
        </div>
        <i class='bx bxs-cart-download'></i>
      </div>
    </div>
    <!-- End Card Boxs -->

<script>const whTooltips = {colorLinks: true, iconizeLinks: false, renameLinks: false};</script>
<script src="https://wow.zamimg.com/widgets/power.js"></script>
<style>
.pagination a.active {
    font-weight: bold;
    text-decoration: underline;
}
</style>
    <div class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2>ГМ - Логи</h2>
        </div>
        <table>
        <thead>
            <tr>
                <td>Время</td>
                <td>Игрок</td>
                <td>Аккаунт</td>
                <td>GUID предмета</td>
                <td>Количество</td>
                <td>Цель</td>
                <td>Realm ID</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($gm_logs as $log) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($log['time']) . '</td>';
                echo '<td>' . htmlspecialchars($log['player']) . '</td>';
                echo '<td>' . htmlspecialchars($log['account']) . '</td>';
                echo '<td><a href="https://www.wowhead.com/wotlk/ru/item=' . htmlspecialchars($log['item_guid']) . '" class="flex flex-row text-decoration-none has-item item-container w-full" data-wh-icon-size="small" data-wh-rename-link="true" target="_blank">' . htmlspecialchars($log['item_guid']) . '</a></td>';
                echo '<td>' . htmlspecialchars($log['count']) . '</td>';
                echo '<td>' . htmlspecialchars($log['target']) . '</td>';
                echo '<td>' . htmlspecialchars($log['realmId']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">&laquo; Назад</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>">Следующая &raquo;</a>
        <?php endif; ?>
    </div>
      </div>
    </div>


    <div class="details1">
      <div class="recent_project">
        <div class="card_header">
          <h2>Логи Голосования</h2>
        </div>
        <table>
          <thead>
            <tr>
              <td>Project Name</td>
              <td>Hours</td>
              <td>Priority</td>
              <td>Members</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Dropbox Design System</td>
              <td>34</td>
              <td>
                <span class="badge bg_worning">
                  Meduim
                </span>
              </td>
              <td>
                <span class="img_group">
                  <img src="../assets/../assets/img/avatar-2.jpg" alt="">
                </span>
                <span class="img_group">
                  <img src="../assets/../assets/img/avatar-3.jpg" alt="">
                </span>
                <span class="img_group">
                  <img src="../assets/../assets/img/avatar-4.jpg" alt="">
                </span>
                <span class="img_group">
                  <span class="initial">+5</span>
                </span>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="recent_customers">
        <div class="card_header">
          <h2>Новые Пользователи</h2>
        </div>
        <table>
          <tbody>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../assets/img/avatar-2.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Willams Harris</h4>
                <span>Willams@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../assets/img/avatar-3.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Vanessa Tucker</h4>
                <span>Vanessa@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../assets/img/avatar-4.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Sharon Lessma</h4>
                <span>Sharon@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../assets/img/avatar-5.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Christina Mason</h4>
                <span>Christina@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../assets/img/avatar-2.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Willams Harris</h4>
                <span>Willams@gmail.com</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="info_img">
                  <img src="../assets/img/avatar-3.jpg" alt="">
                </div>
              </td>
              <td>
                <h4>Sharon Lessma</h4>
                <span>Willams@gmail.com</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="race-class-statistics">
    <h2>Статистика по Расам</h2>
    <ul>
        <?php foreach ($race_stats as $race => $count): ?>
            <li>
                <img src="assets/images/race/<?= $race_image ?>.png" alt="<?= ucfirst($race_image) ?>" width="50" />
                <?= ucfirst($race) ?>: <?= $count ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Статистика по Классам</h2>
    <ul>
        <?php foreach ($class_stats as $class => $count): ?>
            <li>
                <img src="assets/images/classes/<?= array_search($class_image, $class_names) ?>.png" alt="<?= ucfirst($class_image) ?>" width="50" />
                <?= ucfirst($class) ?>: <?= $count ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>