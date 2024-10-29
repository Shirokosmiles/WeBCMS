<?php
session_start();
foreach (glob("engine/configs/*.php") as $filename) {
    require_once $filename;
}
foreach (glob("functions/*.php") as $filename) {
    require_once $filename;
}

if (!isset($_GET['page'])) {
    $page = 'dashboard';
} else {
    if (preg_match('/[^a-zA-Z]/', $_GET['page'])) {
        $page = 'dashboard';
    } else {
        $page = $_GET['page'];
    }
}

require_once '../engine/functions/account.php';
require_once '../engine/functions/database.php';

$account = new Account($_SESSION['username']);
$rank = $account->get_rank();

if ($rank < 1) {
    header("Location: /?page=home");
    exit();
}

$stats = new Dashboard();

$db = (new Configuration())->getDatabaseConnection('website');

$lang = 'en';
$result = $db->query("SELECT lang_code FROM languages WHERE is_active = 1");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lang = htmlspecialchars($row['lang_code'], ENT_QUOTES, 'UTF-8');
}

$_SESSION['lang'] = $lang;

$lang_file = __DIR__ . '/../lang/' . $lang . '.php';
if (file_exists($lang_file)) {
    $translations = require($lang_file);
} else {
    $translations = require(__DIR__ . '/../lang/en.php');
    error_log("Language file not found: " . $lang_file);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админ панель</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <script src="../../assets/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
 <div class="sidebar">
    <div class="logo_details">
      <i class='bx bx-code-alt'></i>
      <div class="logo_name">
        Менюшка
      </div>
    </div>
  <ul>
<?php
$conn = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_website");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}

$sql = "SELECT * FROM menu_admin";
if($result = mysqli_query($conn, $sql))
{
    $rowsCount = ($result);
  echo "<li class='nk-menu-item'>";
    foreach($result as $row){

echo "<li>
        <a href='$row[link]' class='$row[class]'>
          <i class='bx $row[icon]'></i>
          <span class='links_name'>
            $row[name]
          </span>
        </a>
      </li>";
          }
        echo"</li>";
    $result->free();
} 
else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
<li class="login">
        <a href="#">
          <span class="links_name login_out">
            Login Out
          </span>
          <i class='bx bx-log-out' id="log_out"></i>
        </a>
      </li>
    </ul>
</div>
  <!-- End Sideber -->
<section class="home_section">
    <div class="topbar">
      <div class="toggle">
        <i class='bx bx-menu' id="btn"></i>
      </div>
      <div class="user_wrapper">
        <img src="<?php echo $account->get_avatar(); ?>" alt="Аватар пользователя">
      </div>
      <div class="user_wrapper1">
      <button class="c-button" id="updateButton">Обновления</button>
      </div>
    </div>
    <!-- End Top Bar -->
  <?php

            if (file_exists('pages/' . $page . '.php')) {
                include 'pages/' . $page . '.php';
            } else {
                include 'pages/404.php';
            }
            ?>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      // call function
      changeBtn();
    });

    function changeBtn() {
      if(sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }
  </script>
  <script>
    document.getElementById("updateButton").addEventListener("click", function() {
        if (confirm("Вы уверены, что хотите обновить файлы?")) {
            fetch('../clientUpdate.php', {
                method: 'POST'
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ошибка при обновлении файлов.');
            });
        }
    });
</script>

</body>
</html>