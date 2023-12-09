<?php

@include './config.php';


session_start();



// $_SESSION["session"] = [
//     'role' => '',
//     'username' => '',
//     'user' => ''
// ];

if (isset($_POST['submit'])) {

    mysqli_select_db($connection, 'Avito2');

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $CheckPass = $_POST['pswd'];

    // Fetch the hashed password from the database based on the provided email
    $select = "SELECT * FROM Users WHERE Email = '$email'";
    $result = mysqli_query($connection, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        // Use password_verify to check if the entered password is correct
        if (password_verify($CheckPass, $row['Password'])) {
            // $_SESSION['session']['user'] = $row['Id'];
            // $_SESSION['session']['username'] = $row['Username'];
            // $_SESSION['session']['role'] = $row['Role'] == 'Annoncer' ? 'Annoncer' : 'Viewer';
            // $str = 'location: ../pages/'.$_SESSION['session']['role'].'.php';
            // var_dump($str);

            $_SESSION['user'] = $row['Id'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['Image'] = $row['Image'];
            $_SESSION['PhoneNumber'] = $row['Phone_number'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['UserImage'] = $row['UserImage'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Password'] = $row['Password'];

            if ($row['Role'] == 'Annoncer') {
                header('location: ../pages/Annoncer.php');
            } elseif ($row['Role'] == 'Viewer') {
                header('location: ../pages/Viewer.php');
            }
            elseif($row['Role'] == 'Admin'){    
                header('location: ../pages/Admin.php');
            }
        } else {

            $_SESSION['error_message'] = 'Incorrect email or password!';
            header('location: ../index.php');
            exit();
        }
    } else {

        $_SESSION['error_message'] = 'Incorrect email or password!';
        header('location: ../index.php');
        exit();
    }
}
