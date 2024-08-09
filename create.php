<?php
include './_libs/include/database.php';
$conn = Database::getConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "INSERT INTO articles (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Article</title>
</head>
<body>
    <h1>Create New Article</h1>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to Article List</a>
</body>
</html>

<?php $conn->close(); ?>
