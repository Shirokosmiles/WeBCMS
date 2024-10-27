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

$title = '1231321321231';
$content = '<ol><li><s><em><strong>тестик</strong></em></s><strong></strong></li><li><s><em><strong>​​​​​​​12112</strong></em></s><br></li></ol>';
$author = 'INDRA';
$created_at = '16 Oct';

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
$thumbnail = '../uploads/news/670fdef62fe5f2024-10-16_21-31-24.png';
$url = '../news/test12323233.php';
?>
<?php include $template_path . 'header.php'; ?>
<?php include $template_path . '/pages/form.php'; ?>
<?php include $template_path . 'footer.php'; ?>
