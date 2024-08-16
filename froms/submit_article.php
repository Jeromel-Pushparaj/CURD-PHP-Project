<?php
include './_libs/include/action.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $action = new Action();
    $success = $action->create($title, $content);

    if ($success) {
        header('Location: index.php');
    } else {
        echo "Failed to create article.";
    }
}
?>