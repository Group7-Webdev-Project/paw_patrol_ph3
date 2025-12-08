<?php

// Database Connection Details (assuming default XAMPP settings)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paw_patrol_db"; // Your database name

// 1. Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Collect Data
    // Form fields are mapped to the adoption_tbl columns
    $adopter_name = $_POST['adoptFullName'] ?? '';
    $adopter_email = $_POST['adoptEmail'] ?? '';
    $adopter_phone = $_POST['adoptPhone'] ?? '';
    $adopter_address = $_POST['adoptAddress'] ?? '';
    $other_pets = $_POST['adoptOtherPets'] ?? '';
    $home_type = $_POST['adoptHomeType'] ?? '';
    $adoption_story = $_POST['adoptStory'] ?? '';
    $pet_name = $_POST['pet_name'] ?? ''; // From hidden field
    $pet_breed = $_POST['pet_breed'] ?? ''; // From hidden field
    $pet_age = $_POST['pet_age'] ?? 0; // From hidden field
    $submission_date = date('Y-m-d'); // Current date

    // 3. Prepare SQL statement (using placeholders '?')
    $sql = "INSERT INTO adoption_tbl (
                adopter_name, adopter_email, adopter_phone, adopter_address, 
                other_pets, home_type, adoption_story, 
                pet_name, pet_breed, pet_age, submission_date
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statements for security
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // 4. Bind parameters ('s' for string, 'i' for integer)
    // The types MUST match the database definition (VARCHAR -> 's', INT -> 'i', ENUM -> 's', TEXT -> 's')
    $stmt->bind_param(
        "sssssssssis",
        $adopter_name, $adopter_email, $adopter_phone, $adopter_address,
        $other_pets, $home_type, $adoption_story,
        $pet_name, $pet_breed, $pet_age, $submission_date
    );

    // 5. Execute the statement
    if ($stmt->execute()) {
        // Success: Redirect to a success page or the home page
        header("Location: index.html?status=adoption_success");
        exit();
    } else {
        // Error: You can log this error or show a friendly message
        echo "Error saving application: " . $stmt->error;
    }

    // 6. Close statement
    $stmt->close();

} else {
    // If accessed directly, redirect to the home page
    header("Location: index.html");
    exit();
}

// 7. Close connection
$conn->close();

?>