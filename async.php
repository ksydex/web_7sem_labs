<?php
include 'db.php';

$text = $_GET['text'];

if ($text == '') {
    http_response_code(404);
    return;
}

$sql = "select * from projects where lower(name) LIKE ?";
$likeString = '%' . $text . '%';
$stmt = $db->prepare($sql);
$stmt->bind_param('s', $likeString);
$stmt->execute();

$data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);
$stmt->close();