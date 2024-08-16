<?php
include './_libs/include/database.php';
// include './_libs/include/Parsedown.php';
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
        $content = $article['content'];

    // Include Parsedown library
        require './_libs/include/Parsedown.php';
        $Parsedown = new Parsedown();

    // Display content
        $content = $Parsedown->text($content);
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
    <style>
                body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            /* height: 100vh; Optional: To center vertically as well */
        }
            .article-container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            /* max-width: 1000px; */
            /* Removed margin to center within the body */
        }

h1 {
    font-size: 32px;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

p {
    font-size: 18px;
    line-height: 1.5;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 25px; /* Rounded button */
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}


    </style>
</head>
<body>
    <div class="article-container">
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p><?php echo $content ?></p>
    <a href="index.php">Back to Article List</a>
    </div>
</body>
</html>
