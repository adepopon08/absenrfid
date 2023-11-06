<?php
include "_header.php";
include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM status");
$data = mysqli_fetch_array($sql);
$mode_absen = $data['mode'];
if ($mode_absen == 1) {
    $mode = "Masuk";
} elseif ($mode_absen == 2) {
    $mode = "Dispensasi";
} elseif ($mode_absen == 3) {
    $mode = "Kembali";
} elseif ($mode_absen == 4) {
    $mode = "Pulang";
}

$baca_kartu = mysqli_query($konek, "SELECT * FROM tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
$nokartu = isset($data_kartu['nokartu']) ? $data_kartu['nokartu'] : '';
?>

<div class="container text-center">
    <div class="row">
        <div class="col align-self-center mt-3">
            <?php
            if ($nokartu == "") { ?>
                <h5>Absen : <?= $mode; ?></h5>
                <h5>Silahkan Tempelkan Kartu RFID Anda</h5>
                <img src="image/signal.png" width="15%"><br>
                <img src="image/load.gif" height="300px">
            <?php
            } else {

                $cari_siswa = mysqli_query($konek, "SELECT * FROM siswa WHERE no_kartu = '$nokartu'");
                $jumlah_data = mysqli_num_rows($cari_siswa);

                if ($jumlah_data == 0) {
                    echo "<h2>Maaf Nomor Kartu tidak Dikenali</h2>";
                } else {
                    $data_siswa = mysqli_fetch_array($cari_siswa);
                    $nama = $data_siswa['nama'];

                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');
                    $jam = date('H:i:s');

                    $cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='$nokartu' AND tanggal='$tanggal'");

                    $jumlah_absen = mysqli_num_rows($cari_absen);
                    if ($jumlah_absen == 0) {
                        echo "<h2>Selamat Datang <br> $nama</h2>";
                        $sql = mysqli_query($konek, "INSERT INTO absensi(nokartu,tanggal,jam_masuk) VALUES('$nokartu', '$tanggal', '$jam')");
                    } else {
                        if ($mode_absen == 2) {
                            echo "<h2>Diizinkan Dispensasi</h2>";
                            $sql = mysqli_query($konek, "UPDATE absensi SET jam_dispen='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
                        } elseif ($mode_absen == 3) {
                            echo "<h2>Selamat datang kembali</h2>";
                            $sql = mysqli_query($konek, "UPDATE absensi SET jam_kembali='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
                        } elseif ($mode_absen == 4) {
                            echo "<h2>Selamat jalan <br> $nama</h2>";
                            $sql = mysqli_query($konek, "UPDATE absensi SET jam_pulang='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
                        }
                    }
                }
            }
            mysqli_query($konek, "DELETE FROM tmprfid");
            ?>

        </div>
    </div>

</div>