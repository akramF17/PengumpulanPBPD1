<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
$query = "SELECT * FROM hobbies";
$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br>".$db->error);
} else { 
  // Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
  while ($row = $result->fetch_object()) {
    echo "<option value='$row->id'>$row->name</option>";
  }
}
?>