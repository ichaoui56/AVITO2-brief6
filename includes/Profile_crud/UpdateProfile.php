<?php
$warningScript = '';


session_start();

if (isset($_POST['user_name'])) {
    require_once '../config.php';

    mysqli_select_db($connection, 'avito2');

    $userName = $_POST['user_name'];
    $userPhone = $_POST['user_phone'];
    $userEmail = $_POST['user_email'];
    $userRole = $_POST['role'];
    $userId = $_POST['user_id'];
    $oldimage = $_POST['oldimage'];



    $targetDir = "../../pictures/photoimport/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Use prepared statement to prevent SQL injection
            // echo $targetFilePath . "<br>" ;
            $finalpath = "../" . str_replace('../', '', $targetFilePath);
            // echo $finalpath ;
            $Insert_sql = "UPDATE users SET Username=?, Phone_number=?, Role=? ,Email=? ,UserImage=? WHERE Id=?";
            $stmt = mysqli_prepare($connection, $Insert_sql);
            mysqli_stmt_bind_param($stmt, "sssssi", $userName, $userPhone, $userRole, $userEmail, $finalpath, $userId);
            $result = mysqli_stmt_execute($stmt);

            // die($userRole);
            $Update_sql = "SELECT * FROM Users WHERE Id = $userId";
            $result = mysqli_query($connection, $Update_sql);
            $row = mysqli_fetch_array($result);
            $_SESSION['user'] = $row['Id'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['Image'] = $row['Image'];
            $_SESSION['PhoneNumber'] = $row['Phone_number'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['UserImage'] = $row['UserImage'];
            // die($_SESSION['UserImage']);
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Password'] = $row['Password'];

            header("Location: ../../pages/UserProfile.php");
            exit();
        }
    } else {
        $Insert_sql = "UPDATE users SET Username=?, Phone_number=?, Role=? ,Email=? ,UserImage=? WHERE Id=?";
        $stmt = mysqli_prepare($connection, $Insert_sql);
        mysqli_stmt_bind_param($stmt, "sssssi", $userName, $userPhone, $userRole, $userEmail, $oldimage, $userId);
        // Execute the statement
        $result = mysqli_stmt_execute($stmt);
        $Update_sql = "SELECT * FROM Users WHERE Id = $userId";
            $result = mysqli_query($connection, $Update_sql);
            $row = mysqli_fetch_array($result);
            $_SESSION['user'] = $row['Id'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['Image'] = $row['UserImage'];
            $_SESSION['PhoneNumber'] = $row['Phone_number'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['UserImage'] = $row['UserImage'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Password'] = $row['Password'];
    }
};



// $Insert_sql = "UPDATE users SET Username=?, Phone_number=?, Email=? WHERE Id=?";
// $stmt = mysqli_prepare($connection, $Insert_sql);
// mysqli_stmt_bind_param($stmt, "sssi", $userName, $userPhone, $userEmail, $userId);
// $result = mysqli_stmt_execute($stmt);




//     // Sanitize user input to prevent SQL injection
//     $user_name = mysqli_real_escape_string($connection, $_POST['username']);
//     $Title = mysqli_real_escape_string($connection, $_POST['title']);
//     $Price = mysqli_real_escape_string($connection, $_POST['price']);
//     $Description = mysqli_real_escape_string($connection, $_POST['description']);
//     $id = $_POST['Id'];

//     // File upload handling
//     $targetDir = "../../pictures/photoimport/";
//     $fileName = basename($_FILES["image"]["name"]);
//     $targetFilePath = $targetDir . $fileName;
//     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

//     // Allow certain file formats
//     $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

//     if (in_array($fileType, $allowTypes)) {
//         // Upload file to server
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
//             // Use prepared statement to prevent SQL injection
//             $Insert_sql = "UPDATE Annonce SET Title=?, Price=?, Description=?, Image=? WHERE Id=?";
//             $stmt = mysqli_prepare($connection, $Insert_sql);

//             if (!$stmt) {
//                 die("Error in preparing statement: " . mysqli_error($connection));
//             }

//             mysqli_stmt_bind_param($stmt, "sissi", $Title, $Price, $Description, $targetFilePath, $id);

//             // Execute the statement
//             $result = mysqli_stmt_execute($stmt);

//             // Check if the query was successful
//             if ($result) {
//                 // Close the statement
//                 mysqli_stmt_close($stmt);

//                 // Close the connection
//                 mysqli_close($connection);

//                 // Redirect to a confirmation page
//                 header("Location: ../../pages/MesAnnonces.php?status=Publication updated");
//                 exit();
//             } else {
//                 echo "Error in updating data: " . mysqli_stmt_error($stmt);
//             }
//         } else {
//             echo "Error uploading image to the server.";
//         }
//     } else {
//         // Handle the case when the file format is not allowed
//         header("Location: ../../pages/EditAnnonce.php?error=Invalid file format");
//         exit();
//     }
// }



?>

<!-- Ensure SweetAlert2 script is loaded -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert2 script -->
<script>
    <?php if ($result) { ?>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Update!",
                text: "Your annonce file has been uploaded!",
                icon: "success"
            }).then(function() {
                window.location.href = '../../pages/MesAnnonces.php?status=Publication updated';
            });
        });
    <?php } ?>
</script>