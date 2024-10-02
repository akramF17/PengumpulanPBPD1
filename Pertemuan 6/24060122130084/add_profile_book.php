<?php

require_once 'lib/db_login.php';

// convert post data to php native assoc array
$data = file_get_contents("php://input");
$requestData = json_decode($data, true);

if (!$requestData) {
    echo "Invalid JSON data received";
    exit;
}

$name = $db->real_escape_string($requestData['name']);
$nickname = $db->real_escape_string($requestData['nickname']);
$address = $db->real_escape_string($requestData['address']);
$phone_number = $db->real_escape_string($requestData['phone_number']);
$blood_type_id = $db->real_escape_string($requestData['blood_type_id']);
$hobby_id = $db->real_escape_string($requestData['hobby_id']);
$best_three_1 = $db->real_escape_string($requestData['best_three_1']);
$best_three_2 = $db->real_escape_string($requestData['best_three_2']) ;
$best_three_3 = $db->real_escape_string($requestData['best_three_3']);


function danger($message) {
    echo "<div class='alert alert-danger alert-dismissible'>".
    "<p class='text-danger'>$message</p>".
    "</div>";
}

// TODO 5: VALIDATION

// Name Validation
// Name tidak boleh kosong

    if ($name == '') {
        danger("Nama Tidak boleh kosong!");
        $is_valid = FALSE;
    }


// Nickname Validation
// Nickname tidak boleh kosong
    if ($nickname == '') {
        danger("Nickname tidak boleh kosong!");
        $is_valid = FALSE;
    }

// Address Validation
// Address tidak boleh kosong
    if ($address == '') {
        danger("Address tidak boleh kosong");
        $is_valid = FALSE;
    }

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
    if ($phone_number == '' || preg_grep("^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$")) {
        danger("Phone number tidak boleh kosong atau formatnya salah!");
        $is_valid = FALSE;
    }

// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
$sql = "SELECT * FROM blood_types";
$result = $db -> query($sql);   
$flag = false;
while($row = $result->fetch_object() && $flag == false) {
if ($blood_type_id == $row->id){
        $flag = true;
    }
}
if ($flag == true || $blood_type_id == ''){
    danger("Blood type tidak boleh kosong atau formatnya salah!");
        $is_valid = FALSE;
}


// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies
// $hobby_id


// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable


// TODO 5: INSERT DATA
    // Jika valid maka masukkan ke database
    if ($is_valid) {
        // Escape inputs data
        $address = $db->real_escape_string($address);

        $query = "INSERT INTO customers (`customerid`, `name`, `address`, `city`) VALUES (NULL, '" . $name . "', '" . $address . "', '" . $city . "')";

        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }