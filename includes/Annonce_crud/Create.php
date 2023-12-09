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
    $Phone_number = mysqli_real_escape_string($connection, $_POST['Phone_number']);
    $Description = mysqli_real_escape_string($connection, $_POST['description']);

    // Get User_id based on the provided username
    $getUserId = "SELECT Id FROM users WHERE username = ?";
    $getUserStmt = mysqli_prepare($connection, $getUserId);

    if (!$getUserStmt) {
        die("Error in preparing statement: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($getUserStmt, "s", $user_name);
    mysqli_stmt_execute($getUserStmt);
    mysqli_stmt_bind_result($getUserStmt, $user_id);

    // Fetch the result
    mysqli_stmt_fetch($getUserStmt);



    mysqli_stmt_close($getUserStmt);

    // File upload handling
    $targetDir = "../../pictures/photoimport/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Use prepared statement to prevent SQL injection
            $Insert_sql = "INSERT INTO annonce (User_id, username, title, price, Phone_number, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connection, $Insert_sql);

            if (!$stmt) {
                die("Error in preparing statement: " . mysqli_error($connection));
            }

            mysqli_stmt_bind_param($stmt, "ississs", $user_id, $user_name, $Title, $Price, $Phone_number, $Description, $targetFilePath);

            // Execute the statement
            $result = mysqli_stmt_execute($stmt);

            // Check if the query was successful
            if ($result) {
                // Close the statement
                mysqli_stmt_close($stmt);

                // Close the connection
                mysqli_close($connection);

                // Redirect to a confirmation page
                header("Location: ../../pages/{$_SESSION['role']}.php?status=Publication added");
                exit();
            } else {
                echo "Error in inserting data: " . mysqli_stmt_error($stmt);
            }
        } else {
            echo "Error uploading image to the server.";
        }
    } else {

        $_SESSION['error_message'] = '<div class=" my-5 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Danger alert!</span> You need to add all inputs including the image .
        </div>
      </div>';
        header('location: ../../pages/CreateAnnonce.php');
        exit();



        // Close the connection
        mysqli_close($connection);
    }
} else {
    echo 'hiiiiiiiiiiiiiii';
}
