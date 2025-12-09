<?php
header("Content-Type: text/plain");
require_once("config.php");

$data = json_decode(file_get_contents("php://input"), true);

$adoption_id = $data['adoption_id'] ?? null;
$status = $data['status'] ?? null;

if (!$adoption_id || !$status) {
    echo "Invalid data";
    exit;
}

$sql = $conn->prepare("UPDATE adoption_tbl SET status = ? WHERE adoption_id = ?");
$sql->bind_param("si", $status, $adoption_id);

if ($sql->execute()) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $conn->error;
}

$sql->close();
?>
