<?php
session_start();
// die($_SESSION['role']);

if (isset($_SESSION['user'])) {
    header("Location: http://localhost/IlyasChaoui-Avito2/pages/{$_SESSION['role']}.php");
    exit();
    }
?>
