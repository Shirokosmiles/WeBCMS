<?php
if (isset($_POST['submit'])) {
    $news = new News();
    $news->add_news($_POST['news-title'], $_POST['news-content'], $_POST['news-thumbnail'], $_SESSION['username']);
}

if (isset($_POST['edit-submit'])) {
    $news = new News();
    $news->update_news($_POST['news-id'], $_POST['news-title'], $_POST['news-content']);
}

if (isset($_POST['delete-submit'])) {
    if(isset($_POST['news-id'])) {
        $news = new News();
        $news->delete_news($_POST['news-id']);
    }
}

$news = new News();
?>

    <div class="details">
      <div class="recent_project">
        <div class="card_header">
          <h2><?= $translations['news'] ?>  <a href="/admin/?page=newsadd" class="c-button">Добавить запись</a></h2>
        </div>
        <table>
          <thead>
            <tr>
              <td><?= $translations['username'] ?></td>
              <td><?= $translations['email'] ?></td>
              <td><?= $translations['joindate'] ?></td>
              <td><?= $translations['last_login'] ?></td>
              <td><?= $translations['last_ip'] ?></td>
            </tr>
          </thead>
<?php foreach ($news->get_news(1, 10) as $newsItem) : ?> 
          <tbody> 
            <tr> 
             <td><?php echo mb_substr($newsItem['title'], 0, 50) . (strlen($newsItem['title']) > 50 ? '...' : ''); ?></td> 
             <td><?php echo mb_substr($newsItem['content'], 0, 50) . (strlen($newsItem['content']) > 50 ? '...' : ''); ?></td> 
             <td><span class="badge bg_worning"><?php echo $newsItem['created_at']; ?></span></td> 
             <td></td> 
             <td><form method="POST" style="display:inline;"><input type="hidden" name="news-id" value="<?php echo $newsItem['id']; ?>">
                <button type="submit" class="c-button" name="delete-submit" onclick="return confirm('Вы уверены, что хотите удалить эту новость??')">Удалить</button>
            </form></td> 
           </tr> 
         </tbody> 
          <?php endforeach; ?>
        </table>
      </div>
    </div>