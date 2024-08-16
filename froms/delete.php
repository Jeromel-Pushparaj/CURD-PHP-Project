<?php
include './_libs/include/action.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = new Action();
    $success = $action->delete($id);

    if ($success) {
        header('Location: index.php');
    } else {
        echo "Unable to delete.";
    }
}
?>


