<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 25 September 2024 -->

<?php include("header.php") ?>
<div class="col">
	<div class="card">
		<div class="card-header">Show Customer Data</div>
        <div class="card-body">
			<select name="customer" id="customer" class="form-select" onchange="showCustomer(this.value)">
				<option value="">-- Select a Customer --</option>
                <?php
                require_once('../lib/db_login.php');
					
				$query = "SELECT * FROM customers ORDER BY customerid";
				$result = $db->query($query);

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
<?php include("footer.php") ?>