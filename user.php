<?php
include "_header.php";
include "koneksi.php";
?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="image/logo.jpg" alt="Bootstrap" width="30" height="30"> Absensi Siswa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">

                    <a class="nav-link active" href="#" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal">Cardless</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="POST" action="">
                <select class="form-select" aria-label="Mode" name="mode">
                    <option selected>Pilih Mode Absensi</option>
                    <option value="1">Masuk</option>
                    <option value="2">Dispensasi</option>
                    <option value="3">Kembali</option>
                    <option value="4">Pulang</option>
                </select>
                <button class="btn btn-outline-success" type="submit" name="pilihmode">Pilih</button>
            </form>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col card col-lg-3">

        <div class=" card-body">
            <h2 id="timestamp" class="text-center">
            </h2>
            <div id="cekkartu"></div>

        </div>
    </div>
    <div class="card col">
        <div class="card-body">
            <div id="rekap"></div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <label for="noKartu" class="form-label">No Kartu</label>
                    <input type="text" class="form-control" id="noKartu" name="noKartu" placeholder="22222222">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="Kartu">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function ini dijalankan ketika Halaman ini dibuka pada browser
    $(function() {
        setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
    });

    //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
    function timestamp() {
        $.ajax({
            url: 'ajax_timestamp.php',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }

    $(document).ready(function() {
        setInterval(function() {
            $("#cekkartu").load('cekkartu.php');
        }, 2000);
    });

    $(document).ready(function() {
        setInterval(function() {
            $("#rekap").load('rekap.php');
        }, 2000);
    });
</script>
<?php
if (isset($_POST['pilihmode'])) {
    $mode = $_POST['mode'];

    $sMode = mysqli_query($konek, "UPDATE status SET mode='$mode'");
}

include "koneksi.php";
if (isset($_POST['Kartu'])) {
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

    $nokartu = $_POST['noKartu'];

    $cari_siswa = mysqli_query($konek, "SELECT * FROM siswa WHERE no_kartu = '$nokartu'");
    $jumlah_data = mysqli_num_rows($cari_siswa);

    if ($jumlah_data == 0) {
        echo "
        <script>
            alert('Maaf Nomor Kartu tidak Dikenali');
            location.replace('user.php');
        </script>
    ";
    } else {
        $data_siswa = mysqli_fetch_array($cari_siswa);
        $nama = $data_siswa['nama'];

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $jam = date('H:i:s');

        $cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='$nokartu' AND tanggal='$tanggal'");

        $jumlah_absen = mysqli_num_rows($cari_absen);
        if ($jumlah_absen == 0) {
            echo "
        <script>
            alert('Selamat Datang $nama');
            location.replace('user.php');
        </script>
    ";

            $sql = mysqli_query($konek, "INSERT INTO absensi(nokartu,tanggal,jam_masuk) VALUES('$nokartu', '$tanggal', '$jam')");
        } else {
            if ($mode_absen == 2) {
                echo "
        <script>
            alert('Diizinkan Dispensasi');
            location.replace('user.php');
        </script>
    ";
                $sql = mysqli_query($konek, "UPDATE absensi SET jam_dispen='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
            } elseif ($mode_absen == 3) {
                echo "
        <script>
            alert('Selamat Datang Kembali');
            location.replace('user.php');
        </script>
    ";
                $sql = mysqli_query($konek, "UPDATE absensi SET jam_kembali='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
            } elseif ($mode_absen == 4) {
                echo "
        <script>
            alert('Selamat Jalan');
            location.replace('user.php');
        </script>
    ";
                $sql = mysqli_query($konek, "UPDATE absensi SET jam_pulang='$jam' WHERE nokartu='$nokartu' AND tanggal='$tanggal'");
            }
        }
    }

    mysqli_query($konek, "DELETE FROM tmprfid");
}
?>