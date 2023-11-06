<?php
include 'koneksi.php';

$nis = $_GET['nis'];

$sqlDel = mysqli_query($konek, "DELETE FROM siswa WHERE nis='$nis'");

if ($sqlDel) {
    echo "
        <script>
            alert('Data Siswa Terhapus');
            location.replace('siswa.php');
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Siswa Gagal Terhapus');
            location.replace('siswa.php');
        </script>
    ";
}
