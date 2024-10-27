<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<?php
   if (isset($_SESSION['success_message'])) {
       echo '<div class="text-center">';
       echo '<div class="alert alert-dismissible alert-success">';
       echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
       echo '<strong>Well done!</strong> ' . $_SESSION['success_message'] . '';
       echo '</div>';
       echo '</div>';
       unset($_SESSION['success_message']);
   }
   
   if (isset($_SESSION['error'])) {
       echo '<div class="text-center">';
       echo '<div class="alert alert-dismissible alert-danger">';
       echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
       echo '<strong>Hey there!</strong> ' . $_SESSION['error'] . '';
       echo '</div>';
       echo '</div>';
       unset($_SESSION['error']);
   }
   
   if (isset($_SESSION['username'])) {
       $account = new Account($_SESSION['username']);
   }
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $username = $_POST['username'];
       $password = $_POST['password'];
   
       $login = new Login($username, $password);
       $login->login_checks();
       $login->login();
   }
   
   $config = new Configuration();
   $newsHome = new news_home();
   $latestNews = $newsHome->get_news();
   $server = new ServerInfo();
   ?>
<!-- HEADER -->
<header class="header">
<div class="video-header">
        <video autoplay="" loop="" muted="" class="video-header__player">
            <source src="<?= $template_path ?>images/bg1.mp4" type="video/mp4">
            <source src="<?= $template_path ?>images/bg1.webm" type="video/webm">
        </video>
    </div>
    <div class="content-area flex-сс">
        <div class="header__content flex-sbe">

            <!-- INFORMATION -->
            <div class="header__info">
                <!-- LOGO -->
                <a href="#" class="header__logo flex-cc">
                    <img src="<?= $template_path ?>images/logos/logo.png" alt="logotype">
                </a>
                <!-- END LOGO -->
            </div>
            <!-- END INFORMATION -->


            <!-- SERVERS -->
            <div class="header__server">

                        <div class="header__server-item-position">
                            <div class="header__server-item">
                                <div class="header__server-item-icon">
                                    <img src="<?= $template_path ?>images/server.png" alt="server icon">
                                </div>
                                <div class="header__server-item-description">
                                    <div class="header__server-item-info">
                                        <div class="header__server-item-name">
                                            <div class="header__server-item-name-text"><?= $server->get_realm_name(); ?></div>

                                            <div class="header__server-item-name-online">
                                                <img src="<?= $template_path ?>images/icons/online-count-green.png" alt="">
                                                <span><?= $server->get_online_players(); ?></span>
                                            </div>
                                        </div>
                                        <div class="header__server-item-text">ГМ в игре: <span><?php
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_characters;", $db_username, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT c.name
                           FROM characters c
                           INNER JOIN acore_auth.account_access a ON a.id = c.account
                           WHERE a.gmlevel != 0 AND c.online = 1");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $onlineAdmins = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $onlineAdmins[] = $row['name'];
        }

        $adminsList = implode(', ', $onlineAdmins);
        echo "<tr>";
        echo "<td><b>{$adminsList}</b></td>";
        echo "</tr>";
    } else {
        echo "<tr><td colspan='4' align='center'>Нет гм, вошедших в игру</td></tr>";
    }
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
}
?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                            </div>
            <!-- END SERVERS -->

        </div>



        <div class="header__news">

<?php
            $newsHome = new news_home();
            $newsList = $newsHome->get_news();

            $count = 0;

            foreach ($newsList as $news) :
               if ($count % 3 === 0) {
                  echo '';
               }
            ?>
            <div class="header__news-item">
                <div class="header__news-item-border">
                    <img class="border-icon-top" src="<?= $template_path ?>images/icons/border-icon-top.png" alt="border icon top">
                </div>
                <a href="<?= $news['url'] ?>" class="header__news-item-img">
                    <img src="<?= $news['thumbnail'] ?>" alt="<?= $news['title'] ?>">
                </a>
                <div class="header__news-item-date">
                    <?= $news['date'] ?>
                </div>
                <div class="header__news-item-title">
                    <?= $news['title'] ?>
                </div><br />
                <div class="header__news-item-text">
                    <?= $news['content'] ?>
                </div>
                <div class="header__news-item-buttons">
                    <a href="<?= $news['url'] ?>" class="gray-btn">
                        <span>Подробнее</span>
                    </a>
                </div>
            </div>
         <?php
            $count++;
            if ($count % 3 === 0) {
               echo '';
            }
            endforeach;

            if ($count % 3 !== 0) {
               echo '';
            }
            ?>
            </div>
    </div>
</header>
<!-- END HEADER -->

    <!-- MAIN -->
    <main class="main">

        <section class="server-section">
    <div class="content-area flex-es">

        <div class="server-section-sliders">



            <div class="server-section-slider-for">

                                    <div class="server-section-slider-for-item">
                        <div class="server-section-slider-for-item-border">
                            <img class="border-icon-top"
                                 src="<?= $template_path ?>images/icons/server-section-slider-for-item-border-top.png" alt="">
                        </div>
                        <div class="server-section-slider-for-item-info-line flex-sbe">
                            <div class="server-section-slider-for-item-info-line-title">
                                <?= $server->get_realm_name(); ?> <span>X20</span>
                            </div>
                            <div class="server-section-slider-for-item-info-line-online">
                                <div class="server-section-slider-for-item-info-line-online-count">
                                    <img src="<?= $template_path ?>images/icons/online-count.png" alt="">
                                    <?= $server->get_online_players(); ?>
                                </div>
                                <?= $server->get_status_server(); ?>
                            </div>
                        </div>
                    <?php
$conn = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_website");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM realms where id=1 and version='lich'";
if($result = mysqli_query($conn, $sql))
{
    $rowsCount = mysqli_num_rows($result);
    foreach($result as $row){
echo"                  <div class='server-section-slider-for-item-text'>
                            $row[description]
                        </div>
                        <div class='server-section-slider-for-item-realmlist'>
                            $row[realmlist]
                        </div>
                        <div class='server-section-slider-for-item-specifics'>
                            <div>Рейты:<span> $row[rate]</span></div>
                            <div>Проф:<span> $row[proffesion]</span></div>
                            <div>Золото:<span> $row[gold]</span></div>
                            <div>Репутация:<span> $row[rep]</span></div>
                            <div>Лут:<span> $row[loot]</span></div>
                            <div>Хонор:<span> $row[honor]</span></div>
                            <div>Арена:<span> $row[arena]</span></div>
                        </div>";
                }
    $result->free();
} 
else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?> 




                    </div>
                            </div>
        </div>
    </div>
</section>

        <div class="main__bottom">

            <section class="streams">
    <div class="content-area flex-sbe">
        <div class="streams-slider">



        </div>
    </div>
</section>

            <section class="main-rating">
    <div class="content-area">
        <div class="main-rating__switch">
            <div class="main-rating__switch-item active" data-open-tab="online"><span>Онлайн</span></div>
            <div class="main-rating__switch-item" data-open-tab="kills"><span>Топ Убийств</span></div>
            <div class="main-rating__switch-item" data-open-tab="exp"><span>Top exp</span></div>
            <div class="main-rating__switch-item" data-open-tab="clans"><span>Clans</span></div>
            <div class="main-rating__switch-item" data-open-tab="castles"><span>Castles</span></div>
            <div class="main-rating__switch-item" data-open-tab="streamers"><span>Топ стримеры</span></div>
        </div>
        <div class="main-rating__content">
            <div class="main-rating__content-tab active" data-name-tab="online">
                <div class="main-rating__table">
                    <div class="main-rating__table-row main-rating__table-row--header">
                        <div class="main-rating__table-col num"><span>№</span></div>
                        <div class="main-rating__table-col name"><span>Имя</span></div>
                        <div class="main-rating__table-col"><span>Инфо</span></div>
                        <div class="main-rating__table-col level hidable"><span>Звание</span></div>
                        <div class="main-rating__table-col level hidable"><span>Уровень</span></div>
                        <div class="main-rating__table-col clan hidable"><span>Гильдия</span></div>
                        <div class="main-rating__table-col pvp active"><span>Ранг</span></div>
                        <div class="main-rating__table-col hidable"><span>Локация</span></div>
                    </div>
         <?php
                                    $onlineClass = new Online();
                                    $onlineCharacters = $onlineClass->get_online_characters();
                                    $rank = 1;
                                    if (!empty($onlineCharacters)) {
                                        foreach ($onlineCharacters as $character) {
                                    ?>
                    <div class="main-rating__table-row">
                        <div class="main-rating__table-col num"><span><?= $rank++; ?></span></div>
                        <div class="main-rating__table-col name">
                            <span><font color="<?= htmlspecialchars($character['class_color']); ?>"><?= htmlspecialchars($character['name']); ?></font></span>
                        </div>
                        <div class="main-rating__table-col">
                            <span>
                            <img src="<?= htmlspecialchars($character['class_image']); ?>" width="23px" height="23px" />
                            <img src="<?= htmlspecialchars($character['race_image']); ?>" width="23px" height="23px" />
                            <img src="<?= htmlspecialchars($character['faction']); ?>" width="23px" height="23px" />
                            </span>
                        </div>
                        <div class="main-rating__table-col pvp active"><span><?= htmlspecialchars($character['']); ?></span></div>
                        <div class="main-rating__table-col level hidable"><span><?= htmlspecialchars($character['level']); ?></span></div>
                        <div class="main-rating__table-col clan hidable">
                            <span><?= htmlspecialchars($character['guild_name']); ?></span>
                        </div>
                        <div class="main-rating__table-col pvp active"><span><?= htmlspecialchars($character['']); ?></span></div>
                        <div class="main-rating__table-col pvp active"><span><?= htmlspecialchars($character['map_name']); ?></span></div>
                    </div>

                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-white"><?= $translations['no_online_players_found'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                </div>
            </div>
            <div class="main-rating__content-tab" data-name-tab="kills">
                <div class="main-rating__table">
                    <div class="main-rating__table-row main-rating__table-row--header">
                        <div class="main-rating__table-col num"><span>№</span></div>
                        <div class="main-rating__table-col name"><span>Имя</span></div>
                        <div class="main-rating__table-col name"><span>Инфо</span></div>
                        <div class="main-rating__table-col level hidable"><span>Уровень</span></div>
                        <div class="main-rating__table-col clan hidable"><span>Гильдия</span></div>
                        <div class="main-rating__table-col pvp hidable"><span>Убийств</span></div>
                    </div>
                    <?php
                                    $topPlayers = new TopPlayers();
                                    $topCharacters = $topPlayers->get_top_killers(10);
                                    $rank = 1;
                                    if (!empty($topCharacters)) {
                                        foreach ($topCharacters as $character) {
                                    ?>
                            <div class="main-rating__table-row">
                        <div class="main-rating__table-col num"><span><?= $rank++; ?></span></div>
                        <div class="main-rating__table-col name">
                            <span><font color="<?= htmlspecialchars($character['class_color']); ?>"><?= htmlspecialchars($character['name']); ?></font></span>
                        </div>
                        <div class="main-rating__table-col name">
                            <span><img src="<?= htmlspecialchars($character['class_image']); ?>" width="25px" height="25px" /></span>
                            <span><img src="<?= htmlspecialchars($character['race_image']); ?>" width="25px" height="25px" /></span>
                            <span><img src="<?= htmlspecialchars($character['faction']); ?>" width="25px" height="25px" /></span>
                        </div>
                                <div class="main-rating__table-col level hidable"><span><?= htmlspecialchars($character['level']); ?></span></div>
                                <div class="main-rating__table-col clan hidable">
                                    <span><?= htmlspecialchars($character['guild_name']); ?></span>
                                </div>
                                <div class="main-rating__table-col pvp hidable"><span><?= htmlspecialchars($character['totalKills']); ?></span></div>
                            </div>
<?php
    }
} else {
?>
    <tr>
        <td colspan="6" class="text-center text-white"><?= $translations['no_players_available'] ?></td>
    </tr>
<?php
}
?>

                            </div>
            </div>
            <div class="main-rating__content-tab" data-name-tab="exp">
                <div class="main-rating__table">
                    <div class="main-rating__table-row main-rating__table-row--header">
                        <div class="main-rating__table-col num"><span>№</span></div>
                        <div class="main-rating__table-col name"><span>Character</span></div>
                        <div class="main-rating__table-col level active"><span>Level</span></div>
                        <div class="main-rating__table-col clan hidable"><span>Clan</span></div>
                        <div class="main-rating__table-col pvp hidable"><span>PVP/PK</span></div>
                    </div>
                                                                                                    <div class="main-rating__table-row">
                                <div class="main-rating__table-col num"><span>1</span></div>
                                <div class="main-rating__table-col name">
                                    <span>Raito</span>
                                </div>
                                <div class="main-rating__table-col level active"><span>78</span></div>
                                <div class="main-rating__table-col clan hidable">
                                    <span>нет</span>
                                </div>
                                <div class="main-rating__table-col pk hidable"><span>10 / 2</span></div>
                            </div>
                                                                                         </div>
            </div>
            <div class="main-rating__content-tab" data-name-tab="clans">
                <div class="main-rating__table">
                    <div class="main-rating__table-row main-rating__table-row--header">
                        <div class="main-rating__table-col num"><span>№</span></div>
                        <div class="main-rating__table-col name"><span>Clan</span></div>
                        <div class="main-rating__table-col ally hidable"><span>Alliance</span></div>
                        <div class="main-rating__table-col members hidable"><span>Members</span></div>
                        <div class="main-rating__table-col crp active"><span>Level</span></div>
                    </div>

                                                                                                    <div class="main-rating__table-row">
                                <div class="main-rating__table-col num"><span>1</span></div>
                                <div class="main-rating__table-col name">
                                    <span>UnderBeer</span>
                                </div>
                                <div class="main-rating__table-col ally hidable">
                                    <span>-</span>
                                </div>
                                <div class="main-rating__table-col members hidable"><span>35</span></div>
                                <div class="main-rating__table-col crp active"><span>5</span></div>
                            </div>
                                                                                         </div>
            </div>
            <div class="main-rating__content-tab" data-name-tab="castles">
                <div class="main-rating__table">
                    <div class="main-rating__table-row main-rating__table-row--header">
                        <div class="main-rating__table-col name"><span>Castle</span></div>
                        <div class="main-rating__table-col clan active"><span>Controlled</span></div>
                        <div class="main-rating__table-col rate hidable"><span>Tax Rate</span></div>
                        <div class="main-rating__table-col side hidable"><span>Castle Side</span></div>
                        <div class="main-rating__table-col siege hidable"><span>Next Siege</span></div>
                    </div>

                                                                                                    <div class="main-rating__table-row">
                                <div class="main-rating__table-col name">
                                    <span class="emblem">
                                        <img src="https://keltir.com/images/castle/1.jpg" alt="castle">
                                    </span>
                                    <span>Gludio Castle</span>
                                </div>
                            <div class="main-rating__table-col clan active">
                                <span>SecretWeapon</span>
                            </div>
                            <div class="main-rating__table-col rate hidable"><span>9%</span></div>
                            <div class="main-rating__table-col side hidable">
                                <div class="side">
                                    -

                                </div>
                            </div>
                            <div class="main-rating__table-col siege hidable"><span>14/09/2024 20:00</span></div>
                        </div>


                        </div>
            </div>

                <div class="main-rating__content-tab" data-name-tab="streamers">
                    <div class="main-rating__table">
                        <div class="main-rating__table-row main-rating__table-row--header">
                            <div class="main-rating__table-col num"><span>№</span></div>
                            <div class="main-rating__table-col name"><span>Стример</span></div>
                            <div class="main-rating__table-col siege hidable"><span>Рейтинг</span></div>
                        </div>

                            <div class="main-rating__table-row">
                                <div class="main-rating__table-col num">
                                <span>
                                <img src="<?= $template_path ?>images/medal_gold.png" alt="1" width="23px" height="23px"/>
                                                                    </span>
                                </div>
                                <div class="main-rating__table-col clan active"><span>KiTProfi</span></div>
                                <div class="main-rating__table-col pk active"><span>1238.71</span></div>
                            </div>
                            <div class="main-rating__table-row">
                                <div class="main-rating__table-col num">
                                <span>
                                <img src="<?= $template_path ?>images/medal_silver.png" alt="1" width="23px" height="23px"/>
                                                                    </span>
                                </div>
                                <div class="main-rating__table-col clan active"><span>Lorien</span></div>
                                <div class="main-rating__table-col pk active"><span>460.68</span></div>
                            </div>
                            <div class="main-rating__table-row">
                                <div class="main-rating__table-col num">
                                <span>
                                <img src="<?= $template_path ?>images/medal_bronze.png" alt="1" width="23px" height="23px"/>
                                                                    </span>
                                </div>
                                <div class="main-rating__table-col clan active"><span>KarpAleksiy</span></div>
                                <div class="main-rating__table-col pk active"><span>419.99</span></div>
                            </div>



                    </div>
                </div>

        </div>
    </div>
</section>
        </div>

    </main>
    <!-- END MAIN -->