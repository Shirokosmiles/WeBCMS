<?php
$account = new adminAccounts();
$pageNum = isset($_GET['pg']) ? $_GET['pg'] : 1; // Get the current page number from the URL
$perPage = 10; // Number of accounts to display per page
$accounts = $account->get_accounts($pageNum, $perPage);
?>

    <div class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2><?= $translations['user'] ?></h2>
        </div>
         
        <table>
          <thead>
            <tr>
              <td></td>
              <td><?= $translations['username'] ?></td>
              <td><?= $translations['email'] ?></td>
              <td><?= $translations['joindate'] ?></td>
              <td><?= $translations['last_login'] ?></td>
              <td><?= $translations['last_ip'] ?></td>
              <td>Бонусы</td>
            </tr>
          </thead>
          <?php foreach ($accounts as $user) : ?>
          <tbody>
            <tr>
              <td>
                <span class="img_group">
                            <?php
                            $userAccount = new Account($user['username']);
                            ?>
                            <img src="<?= $userAccount->get_avatar(); ?>" alt="Avatar" width="50" height="50">
                        </span>
              </td>
              <td><?php echo $user['username']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><?php echo $user['last_login']; ?></td>
              <td><?php echo $user['joindate']; ?></td>
              <td><?php echo $user['last_ip']; ?></td>
              <td><?php echo $user['bonuses']; ?></td>
            </tr>

          </tbody>
          <?php endforeach; ?>
        </table>
        
      </div>
    <div class="card-inner">
                        <nav>
        <ul class="pagination">
                            
            
                            
                           
                                        <?php
    // Calculate total number of pages
    $totalAccounts = $account->get_total_accounts();
    $totalPages = ceil($totalAccounts / $perPage);

    // Display pagination links
    for ($i = 1; $i <= $totalPages; $i++) {
        $isActive = $i == $pageNum ? "active" : "";
        echo "<li class='page-item $isActive'><a class='page-link' href='?page=accounts&pg=$i'>$i</a></li>";
    }
    ?>


                                                                        
                    </ul>
    </nav>

                    </div>
    </div>
