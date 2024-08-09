<?php
include './_libs/include/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];

    // Database connection
    $conn = Database::getConnection();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert content into database
    $sql = "INSERT INTO markdown_content (content) VALUES ('$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Content saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
