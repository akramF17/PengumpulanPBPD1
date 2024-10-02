<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Kamis, 26 September 2024
    Nama File           : add_customer_post.php
-->

<?php
    require_once('../lib/db_login.php');

    // Assign column value using POST
    $name = $db->real_escape_string($_POST['name']);
    $address = $db->real_escape_string($_POST['address']);
    $city = $db->real_escape_string($_POST['city']);

    // Assign a query
    $query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
    
    // Execute the query
    $result = $db->query($query);

    if (!$result) { // Tampilkan pesan error jika query gagal dieksekusi
        echo 'div class="alert alert-danger alert-dismissible"><strong>Error! </strong> Could not query the database <br>'.$db->error.'<br></div>';
    } else { // Tampilkan pesan sukses dan data customer jika query berhasil dieksekusi
        echo '<div class="alert alert-success alert-dismissible"><strong>Success! </strong> Data has been added.<br>
        Name: '.$_POST['name'].'<br>
        Address: '.$_POST['address'].'<br>
        City: '.$_POST['city'].'<br></div>';
    }

    // Close DB Connection
    $db->close();
?>