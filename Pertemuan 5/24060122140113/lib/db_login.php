<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: db_login.php
// Deskripsi: file untuk mengkoneksikan dengan database
$db_host='localhost';
$db_database='bookdb';
$db_username = 'root';
$db_password='';

// connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno){
    die("Could not connect to the database: <br />". $db->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>