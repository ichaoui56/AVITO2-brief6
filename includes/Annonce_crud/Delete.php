<?php

require_once '../config.php';

mysqli_select_db($connection, 'avito2');

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM Annonce WHERE id = ?";
    $stmt = $connection->prepare($sql);

    $stmt->bind_param("i", $id);

    $res = $stmt->execute();

    if ($res) {
        // Redirect to index.php with a query parameter for SweetAlert
            header('location: ../../pages/MesAnnonces.php');
            exit();
    } 
} else {
    echo "Error in deleting task.";
}

?>


