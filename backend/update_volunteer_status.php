<?php
header("Content-Type: text/plain");
require_once("config.php");

$data = json_decode(file_get_contents("php://input"), true);

$volunteer_id = $data['volunteer_id'];
$status = $data['status'];

if (!$volunteer_id || !$status) {
    echo "Invalid data";
    exit;
}

$sql = $conn->prepare("UPDATE volunteer_tbl SET status = ? WHERE volunteer_id = ?");
$sql->bind_param("si", $status, $volunteer_id);

if($sql->execute()) {
    echo "Status updated successfully";
}
else {
    echo "Error updating volunteer status:", $conn->error;
}

$sql->close();
?>