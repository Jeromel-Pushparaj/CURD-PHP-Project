
<?php
include './_libs/include/database.php';
$conn = Database::getConnection();

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Blog</title>
    <link rel="icon" href="dev-icon-7.jpg" type="image/icon type">
	
	<link href="index-head.css" rel="stylesheet">
</head>
<body>

  <header class="header">
  <nav class="nav">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="https://jeromelpushparaj.netlify.app/" target="_blank">Myporfolio</a></li>
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

  <main class="main">
  <h1>Articles</h1>
    <a href="create.php">Create New Article</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo substr($row['content'], 0, 100); ?>...</td>
            <td>
                <a href="view.php?id=<?php echo $row['id']; ?>">View</a> | 
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
  </main>

  <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?> My Blog</p>
  </footer>

</body>
</html>
