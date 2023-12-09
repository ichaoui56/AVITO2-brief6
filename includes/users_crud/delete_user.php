<?php

require_once '../config.php';

mysqli_select_db($connection, 'avito2');

if (isset($_GET["user_id"])) {
    $userId = $_GET["user_id"];
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $connection->prepare($sql);

    $stmt->bind_param("i", $userId);

    $res = $stmt->execute();

    if ($res) {
        // Redirect to index.php with a query parameter for SweetAlert
            header('location: ../../pages/AllUsers.php');
            exit();
    } 
} else {
    echo "Error in deleting task.";
}

?>


