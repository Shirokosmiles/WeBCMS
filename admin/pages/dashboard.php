<?php 
$stats = new Dashboard();
$template_name = $stats->get_template_name();

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
            $gm_logs = $stats->get_gm_logs();
            foreach ($gm_logs as $log) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($log['time']) . '</td>';
                echo '<td>' . htmlspecialchars($log['player']) . '</td>';
                echo '<td>' . htmlspecialchars($log['account']) . '</td>';
                echo '<td>' . htmlspecialchars($log['item_guid']) . '</td>';
                echo '<td>' . htmlspecialchars($log['count']) . '</td>';
                echo '<td>' . htmlspecialchars($log['target']) . '</td>';
                echo '<td>' . htmlspecialchars($log['realmId']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
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