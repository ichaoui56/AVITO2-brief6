<?php
$warningScript = '';

session_start();

if (isset($_POST['submit'])) {
    require_once '../config.php';

    mysqli_select_db($connection, 'avito2');

    // Sanitize user input to prevent SQL injection
    $user_name = mysqli_real_escape_string($connection, $_POST['username']);
    $Title = mysqli_real_escape_string($connection, $_POST['title']);
    $Price = mysqli_real_escape_string($connection, $_POST['price']);
    $Description = mysqli_real_escape_string($connection, $_POST['description']);
    $id = $_POST['Id'];
    $oldimage = $_POST['oldimage'];
    
    // File upload handling
    $targetDir = "../../pictures/photoimport/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileType, $allowTypes)) {
        echo "hi";
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Use prepared statement to prevent SQL injection
            $Insert_sql = "UPDATE Annonce SET Title=?, Price=?, Description=?, Image=? WHERE Id=?";
            $stmt = mysqli_prepare($connection, $Insert_sql);

            if (!$stmt) {
                die("Error in preparing statement: " . mysqli_error($connection));
            }

            mysqli_stmt_bind_param($stmt, "sissi", $Title, $Price, $Description, $targetFilePath, $id);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            // Check if the query was successful
            if ($result) {
                // Close the statement
                mysqli_stmt_close($stmt);

                // Close the connection
                mysqli_close($connection);

                // Redirect to a confirmation page
                header("Location: ../../pages/MesAnnonces.php?status=Publication updated");
                exit();
            } else {
                echo "Error in updating data: " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "Error uploading image to the server.";
        }
    } else {
        $Insert_sql = "UPDATE Annonce SET Title=?, Price=?, Description=?, Image=? WHERE Id=?";
        $stmt = mysqli_prepare($connection, $Insert_sql);
        mysqli_stmt_bind_param($stmt, "sissi", $Title, $Price, $Description, $oldimage, $id);
            // Execute the statement
            $result = mysqli_stmt_execute($stmt);
        
    }
}
?>

<!-- Ensure SweetAlert2 script is loaded -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert2 script -->
<script>
    <?php if ($result) { ?>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: "Update!",
                text: "Your annonce file has been uploaded!",
                icon: "success"
            }).then(function () {
                window.location.href = '../../pages/MesAnnonces.php?status=Publication updated';
            });
        });
    <?php } ?>
</script>
