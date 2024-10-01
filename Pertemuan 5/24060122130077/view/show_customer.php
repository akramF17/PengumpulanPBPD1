<!-- Nama       : Fendi Ardianto -->
<!-- NIM        : 24060122130077 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 27 September 2024 -->

<?php include('../header.html') ?>
<div class="row w-50 mx-auto mt-5">
  <div class="col">
      <div class="card">
          <div class="card-header">Show Customer Data</div>
          <div class="card-body">
              <select name="customer" id="customer" class="form-select" onchange="showCustomer(this.value)">
                  <option value="">-- Select a Customer --</option>
                  <?php
                  require_once('../lib/db_login.php');

                  // Asign A Query
                  $query = "SELECT * FROM customers ORDER BY customerid";
                  $result = $db->query($query);
                  var_dump($result);

                  if (!$result) {
                      die("Could not query the database: <br>" . $db->error);
                  }

                  while ($row = $result->fetch_object()) {
                      echo '<option value="' . $row->customerid . '">' . $row->name . '</option>';
                  }

                  $result->free();
                  $db->close();
                  ?>
              </select>
              <br>
              <div id="detail_customer"></div>
          </div>
      </div>
  </div>
</div>
<?php include('../footer.html') ?>