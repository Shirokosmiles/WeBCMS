<?php
if (!file_exists('../engine/install.lock')) {
    header('Location: ../install');
    exit;
}

if (!isset($_SESSION)) {
    session_start();
}

foreach (glob('../engine/functions/*.php') as $filename) {
    require_once $filename;
}

foreach (glob('../engine/configs/*.php') as $filename) {
    require_once $filename;
}

$title = 'Обновление сайта!!!';
$content = 'Мы обновили сайт теперь у нас новый дизайн! Пока что ведутся доработки по личному кабинету!!!';
$author = 'INDRA';
$created_at = '10 Sep';

$config_object = new Configuration();
$db = $config_object->getDatabaseConnection('website');

$result = $db->query('SELECT template_name FROM templates WHERE id = 1');
$template = '1';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $template = htmlspecialchars($row['template_name'], ENT_QUOTES, 'UTF-8');
}

$db->close(); 

if (isset($_GET['template'])) {
    $template = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['template']);
}

$template_path = '../templates/' . $template . '/';
$thumbnail = '../uploads/news/66e04669dadcbmaxresdefault.jpg';
$url = '../news/newsite.php';
?>
<?php include $template_path . 'header.php'; ?>
<?php include $template_path . '/pages/form.php'; ?>
<?php include $template_path . 'footer.php'; ?>
