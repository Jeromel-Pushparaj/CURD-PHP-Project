<?php
include './_libs/include/database.php';
$conn = Database::getConnection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM articles WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
