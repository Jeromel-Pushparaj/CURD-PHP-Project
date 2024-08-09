<?php
include './_libs/include/database.php';
$conn = Database::getConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE articles SET title=?, content=? WHERE id=?";

// Prepare the statement
    $stmt = $conn->prepare($sql);

// Bind parameters
    $stmt->bind_param("ssi", $title, $content, $id);

// Execute the statement
    $stmt->execute();

    if ($stmt->execute()) {
        echo 'Article saved successfully! <br> <a href="index.php">Back to Article List</a>';
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>