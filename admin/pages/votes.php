<?php
if (isset($_POST['vote-submit'])) {
    $voteSites = new VoteSites();
    $site_name = $_POST['site-name'];
    $site_url = $_POST['site-url'];
    $vote_points = isset($_POST['vote-points']) ? (int)$_POST['vote-points'] : 1;

    if ($voteSites->add_vote_site($site_url, $site_name, $vote_points)) {
        echo "<p>Сайт успешно добавлен!</p>";
    } else {
        echo "<p>Ошибка при добавлении сайта.</p>";
    }
}

$voteSites = new VoteSites();
?>


<?php 
$stats = new VoteSites();


if (isset($_POST['vote-submit'])) {
    $voteSites = new VoteSites();
    $site_name = $_POST['site-name'];
    $site_url = $_POST['site-url'];
    $vote_points = isset($_POST['vote-points']) ? (int)$_POST['vote-points'] : 1;

    if ($voteSites->add_vote_site($site_url, $site_name, $vote_points)) {
        echo "<p>Сайт успешно добавлен!</p>";
    } else {
        echo "<p>Ошибка при добавлении сайта.</p>";
    }
}
?>

<div class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2><?= $translations['vote_dash'] ?>  <a href="/admin/?page=voteadd" class="c-button">Добавить запись</a></h2>
        </div>
        <table>
          <thead>
            <tr>
              <td>Сайт</td>
              <td>Ссылка</td>
              <td>Кол-во очков</td>
            </tr>
          </thead>
 <?php foreach ($voteSites->get_vote_sites() as $voteSite) : ?>
          <tbody>
            <tr>
              <td><?php echo htmlspecialchars($voteSite['site_name']); ?></td>
              <td><a href="<?php echo htmlspecialchars($voteSite['site_url']); ?>" target="_blank"><?php echo htmlspecialchars($voteSite['site_url']); ?></a></td>
              <td><?php echo htmlspecialchars($voteSite['vote_points']); ?> <?= $translations['vote_point'] ?></td>
            </tr>
          </tbody>
          <?php endforeach; ?>
        </table>
      </div>
    </div>