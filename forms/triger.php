<?php
// Include the Action class
include_once '../_libs/include/action.php';
include '../_libs/include/database.php';

// Database connection
$mysqli = Database::getConnection();

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = new Action();

    // Determine which action to take based on form submission
    if (isset($_POST['create'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $action->create($title, $content);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $action->update($id, $title, $content);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $action->delete($id);
    } elseif (isset($_POST['view'])) {
        $id = $_POST['id'];
        $article = $action->view($id);
        // Display the article or use it as needed
    }
}
?>
