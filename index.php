<?php

include('./includes/config.php');
include_once './includes/checkLogout.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</head>

<body>
    <div class="wrapper">
        <div class="main">
            <!-- Checkbox for triggering animations -->
            <input type="checkbox" id="chk" aria-hidden="true">

            <!-- Eye icons for password visibility -->
            <div class="eyes">
                <img id="OpenEye" src="pictures/open.jpg" alt="" class="open">
                <img id="CloseEye" src="pictures/close.jpg" alt="" class="close">
            </div>

            <?php
            // session_start();
            // Check if there is an error message in the session
            if (isset($_SESSION['error_message'])) {
                echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
                // Clear the error message from the session
                unset($_SESSION['error_message']);
            }
            ?>

            <!-- Login form -->
            <div class="signup">
                <form class="form" action="./includes/LoginTraitement.php" method="post">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <div class="password-container">
                        <input class="pswd" type="password" name="pswd" placeholder="Password" required="">
                        <!-- Label and input for toggling password visibility -->
                        <label class="toggle-label" for="toggleBtn">Show Password
                            <input id="toggleBtn" type="checkbox">
                        </label>
                    </div>
                    <button type="submit" name="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                <form action="./includes/RegisterTraitment.php" method="post">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="Username" placeholder="Username" required="">
                    <input type="number" name="PhoneNumber" placeholder="Phone Number" required="">
                    <select class="role-label" id="gender" name="role">
                        <!-- <option value="male">Role</option> -->
                        <option value="Viewer">Viewer</option>
                        <option value="Annoncer">Announcer</option>
                    </select>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input class="pswd" type="password" name="pswd" placeholder="Password" required="">

                    <button type="submit" name="submit">Sign up</button>



                </form>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>

</body>

</html>