<?php
include './_libs/include/database.php';
$conn = Database::getConnection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the article data
    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    } else {
        echo "Article not found.";
        exit;
    }

    $stmt->close();
} else {
    echo "No article ID provided.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
    <a href="index.php">Back to Article List</a>
</body>
</html>
