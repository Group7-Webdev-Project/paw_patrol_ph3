<?php 
header("Content-Type: text/plain");

// Load DB connection
require_once("../backend/config.php"); 

$data = json_decode(file_get_contents("php://input"), true);

if(!$data) {
    echo "No data received";
    exit;
}

$donor_name = $data['donor_name'];
$donor_email = $data['donor_email'];
$donor_contact = $data['donor_contact'];
$donation_amount = $data['donation_amount'];
$donor_message = $data['donor_message'];
$donation_date = $data['donation_date'];

$stmt = "INSERT INTO donation_tbl (donor_name, donor_email, donor_contact, donation_amount, donor_message, donation_date)
        VALUES (?, ?, ?, ?, ?, ?)";

$sql = $conn->prepare($stmt);

if (!$sql) {
    die("Prepare failed: " . $conn->error);
}

$sql->bind_param("sssiss",
    $donor_name, $donor_email, $donor_contact, $donation_amount, $donor_message, $donation_date
);

if($sql->execute()) {
    echo "Donation saved successfully";
}
else {
    echo "Error saving donation: " . $conn->error;
}

$sql->close();
?>