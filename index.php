
<?php
include './_libs/include/database.php';
$conn = Database::getConnection();

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
session_start();
// $isEditor = $_SESSION['privilege'] == 'editor';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="https://jeromelpushparaj.netlify.app/" target="_blank">My Portfolio</a></li>
                <li><a href="https://www.linkedin.com/in/jeromel-pushparaj/" target="_blank">Contact</a></li>
                <?php
                include '_libs/include/user.php';
                // Check if a username is stored in the session
                if (isset($_SESSION['username'])) {
                    echo '<li class="right"><a href="#">Welcome, ' . $_SESSION['username'] . '</a></li>';  // Display username if logged in
                    echo '<li class="right"><a href="signout.php">Logout</a></li>';
                } else {
                    echo '<li class="right"><a href="signup.php">Signup</a></li>';
                    echo '<li class="right"><a href="signin.php">Signin</a></li>';  // Display signup and signin buttons if not logged in
                }
                ?>
            </ul>
        </nav>
    </header>

    <div class="container">
    <h1>Articles</h1>
    
    <?php if ($_SESSION['privilege'] == 'editor'): ?>
        <!-- Table view for editors -->
        <a href="create.php" class="btn btn-primary">Create New Article</a>
        <table class="article-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Assume $articles is an array of articles fetched from the database -->
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo substr($row['content'], 0, 100); ?>...</td>
                <td class="actions">
                    <a href="view.php?id=<?php echo $row['id']; ?>">View</a> | 
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- Big heading view for general users -->
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="article">
            <h2><?= $row['title']; ?></h2>
            <p><?= substr($row['content'], 0, 150); ?>...</p>
            <a href="view.php?id=<?= $row['id']; ?>">Read more</a>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
</body>
</html>





