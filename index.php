
<?php
include '_libs/include/action.php';
$action = new Action();

$result = $action->viewAll();
session_start();
// $isEditor = $_SESSION['privilege'] == 'editor';


    // Display content
    function parsedowning($content){
        require './_libs/include/Parsedown.php';
        $Parsedown = new Parsedown();
        $content = $Parsedown->text($content);
        return $content;
    }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/dev-icon.png" type="image/icon type">
    <title>Web dev articles</title>
    
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/style_table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    echo '<li class="right"><a href="./pages/signout.php">Logout</a></li>';
                } else {
                    echo '<li class="right"><a href="./pages/signup.php">Signup</a></li>';
                    echo '<li class="right"><a href="./pages/signin.php">Signin</a></li>';  // Display signup and signin buttons if not logged in
                }
                ?>
            </ul>
        </nav>
    </header>

    <div class="container">
    <h1>Articles</h1>
    
    <?php if ($_SESSION['privilege'] == 'editor'): ?>
        <!-- Table view for editors -->
        <a href="./pages/create.php" class="btn btn-primary" style="
    all: unset;
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 25px; /* Rounded button */
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    margin-bottom: 10px;
">Create New Article</a>
        <table class="article-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th></th>
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
                    <a href="./pages/view.php?id=<?php echo $row['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                    <a href="./pages/edit.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                    <a href="./forms/delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

            <a href="./pages/view.php?id=<?= $row['id']; ?>" style="
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 25px; /* Rounded button */
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    margin-bottom: 10px;
">Read <i class="fa fa-book" aria-hidden="true"></i></a>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
</body>
</html>





