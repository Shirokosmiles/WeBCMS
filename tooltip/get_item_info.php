<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "192.168.0.3";
$username = "Aizen";
$password = "58586363";
$dbname = "acore_world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$entry = isset($_GET['entry']) ? intval($_GET['entry']) : 0;

function getItemInfo($entry) {
    global $conn;
    $sql = "SELECT it.*, il.Name as localizedName 
            FROM item_template it 
            LEFT JOIN item_template_locale il ON it.entry = il.ID AND il.locale = 'ruRU' 
            WHERE it.entry = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $entry);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

$itemInfo = getItemInfo($entry);

if ($itemInfo) {
    $itemInfo['socketColors'] = [
        $itemInfo['socketColor_1'],
        $itemInfo['socketColor_2'],
        $itemInfo['socketColor_3']
    ];
    $itemInfo['socketBonus'] = $itemInfo['socketBonus'];
    $itemInfo['gemProperties'] = $itemInfo['GemProperties'];

    $itemInfo['name'] = $itemInfo['localizedName'] ?: $itemInfo['name'];

    echo json_encode($itemInfo);
} else {
    echo json_encode([]);
}

$conn->close();
?>