<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 2 Oktober 2024
-->
<?php
// TODO 1 : SETUP & CONNECT DATABASE
$db_host='localhost';
    $db_database='profile_book';
    $db_username='root';
    $db_password='';

    //connect
    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
