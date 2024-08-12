<?php
include './_libs/include/database.php';
$mysqli = Database::getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Sanitize and validate input here...

    // Insert the article into your database
    $sql = "INSERT INTO articles (title, content) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        echo "Article saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>