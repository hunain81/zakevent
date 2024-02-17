<?php

// Database connection details (replace with your actual credentials)
$host = "localhost";
$dbname = "zakevent";
$username = "root";
$password = "";

// Establish database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handle form submission (adjust for your form fields)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $guests = filter_input(INPUT_POST, 'guests', FILTER_VALIDATE_INT);

    // Validate and sanitize data (use prepared statements in production)
    // ...

    // Insert data into database (prepare and execute your query)
    $sql = "INSERT INTO event (name, email, phone, guests) VALUES (:name, :email, :phone, :guests)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':guests', $guests);
    $stmt->execute();

    echo "Registration successful!";
}

// Disconnect from database
$conn = null;

?>
