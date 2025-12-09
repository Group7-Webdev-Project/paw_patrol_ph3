<?php
header("Content-Type: text/plain");

require_once("../backend/config.php");

$data = json_decode(file_get_contents("php://input"), true);

if(!$data) {
    echo "No data received";
    exit;
}

$volunteer_name = $data['volunteer_name'];
$volunteer_email = $data['volunteer_email'];
$volunteer_phone = $data['volunteer_phone'];
$volunteer_address = $data['volunteer_address'];
$availability = $data['availability'];
$commitment = $data['commitment'];
$area_of_interest = $data['area_of_interest'];
$experience = $data['experience'];
$submission_date = $data['submission_date'];

$sql = $conn->prepare(
    "INSERT INTO volunteer_tbl (
        volunteer_name, volunteer_email, volunteer_phone, volunteer_address, 
        availability, commitment, area_of_interest, experience, submission_date
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$sql) {
    die("Prepare failed: ". $conn->error);
}  

$sql->bind_param("sssssssss", 
    $volunteer_name, $volunteer_email, $volunteer_phone,
    $volunteer_address, $availability, $commitment,
    $area_of_interest, $experience, $submission_date
);

if($sql->execute()) {
    echo "Donation saved successfully";
}
else {
    echo "Error saving donation: " . $conn->error;
}

$sql->close();
?>