<?php
include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tmprfid");
$data = mysqli_fetch_array($sql);

$nokartu = isset($data['nokartu']) ? $data['nokartu'] : '';
?>
<div class="mb-3">
    <label for="nokartu" class="form-label">Nomor Kartu</label>
    <input type="text" class="form-control" id="nokartu" name="nokartu" placeholder="Tempelkan Kartu RFID Anda" value="<?= $nokartu; ?>">
</div>