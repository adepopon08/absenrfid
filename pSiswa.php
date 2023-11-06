<?php
include 'koneksi.php';

$nokartu    = $_POST['nokartu'];
$nis        = $_POST['nis'];
$nisn       = $_POST['nisn'];
$nama       = $_POST['nama'];
$jk         = $_POST['jk'];
$kelas      = $_POST['kelas'];

$sqlAdd = mysqli_query($konek, "INSERT INTO siswa VALUES('$nokartu', '$nis', '$nisn', '$nama', '$jk', '$kelas')");

if ($sqlAdd) {
    echo "
        <script>
            alert('Data Siswa Tersimpan');
            location.replace('siswa.php');
        </script>
    ";
    mysqli_query($konek, "DELETE FROM tmprfid");
} else {
    echo "
        <script>
            alert('Data Siswa Gagal Tersimpan');
            location.replace('siswa.php');
        </script>
    ";
}
