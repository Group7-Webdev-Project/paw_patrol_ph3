<?php
header("Content-Type: text/plain");

require_once("../backend/config.php");

$data = json_decode(file_get_contents("php://input"), true);

if(!$data) {
    echo "No data received";
    exit;
}

$adopter_name = $data['adopter_name'];
$adopter_email = $data['adopter_email'];
$adopter_phone = $data['adopter_phone'];
$adopter_address = $data['adopter_address'];
$other_pets = $data['other_pets'];
$home_type = $data['home_type'];
$adoption_story = $data['adoption_story'];
$pet_name = $data['pet_name'];
$pet_breed = $data['pet_breed'];
$pet_age = $data['pet_age'];
$submission_date = $data['submission_date'];

$sql = $conn->prepare(
    "INSERT INTO adoption_tbl (
        adopter_name, adopter_email, adopter_phone,
        adopter_address, other_pets, home_type,
        adoption_story, pet_name, pet_breed, 
        pet_age, submission_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);
if (!$sql) {
    die("Prepare failed: " . $conn->error);
}

$sql->bind_param("sssssssssss",
    $adopter_name, $adopter_email, $adopter_phone,
    $adopter_address, $other_pets, $home_type, 
    $adoption_story, $pet_name, $pet_breed,
    $pet_age, $submission_date
);
if($sql->execute()) {
    echo "Donation saved successfully";
}
else {
    echo "Error saving donation: " . $conn->error;
}

$sql->close();
?>