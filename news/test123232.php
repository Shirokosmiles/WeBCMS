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

$title = 'тестовое сообщение';
$content = '<ol>
	<li><em><strong>тестовое сообщение</strong></em></li>
	<li>
	<h1><samp><strong>тестовое сообщение</strong></samp></h1>
	</li>
	<li><em><strong>тестовое сообщение</strong></em></li>
	<li><em><strong>тестовое сообщение</strong></em></li>
	<li><em><strong>тестовое сообщение</strong></em></li>
</ol>
';
$author = 'INDRA';
$created_at = '25 окт';

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
$thumbnail = '../uploads/news/671ba603be94eacc3d3fa139e0f9a2a715d0ed7ed8203.jpg';
$url = '../news/test123232.php';
?>
<?php include $template_path . 'header.php'; ?>
<?php include $template_path . '/pages/form.php'; ?>
<?php include $template_path . 'footer.php'; ?>
