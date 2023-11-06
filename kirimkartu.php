<?php
include "koneksi.php";

$nokartu = $_GET['nokartu'];

//kosongkan tmprfid
mysqli_query($konek, "DELETE from tmprfid");

//simpan no kartu
$simpan = mysqli_query($konek, "INSERT INTO tmprfid VALUES('$nokartu')");
if ($simpan) {
    echo "BERHASIL";
} else {
    echo "GAGAL";
}
