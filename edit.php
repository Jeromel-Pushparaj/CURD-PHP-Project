<?php
include './_libs/include/database.php';
$conn = Database::getConnection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id=$id";
    $result = $conn->query($sql);
    $article = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE articles SET title='$title', content='$content' WHERE id=$id";

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
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit Article</h1>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $article['title']; ?>"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"><?php echo $article['content']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Article List</a>
</body>
</html>

<?php $conn->close(); ?>
