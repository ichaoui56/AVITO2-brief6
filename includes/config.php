<?php

// Database connection parameters
$db_server = "localhost";
$db_user = "root";
$db_psw = "";
$db_name = "avito2";

// Create connection
try {
    $connection = mysqli_connect($db_server, $db_user, $db_psw);
} catch (mysqli_sql_exception) {
    echo "Connection failed.<br>";
}
// Check connection

if (!$connection) {
    die("Not connected.<br> ");
} else {
    return $connection;
}
