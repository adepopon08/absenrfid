<?php
include "_header.php";
include  "_top_menu.php";
include "_side_menu.php";
include "koneksi.php";

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    $sql = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$nis'");
    $data = mysqli_fetch_array($sql);
}

if (isset($_POST['ubah'])) {
    $nis        = $_POST['nis'];
    $nokartu    = $_POST['nokartu'];
    $nisn       = $_POST['nisn'];
    $nama       = $_POST['nama'];
    $jk         = $_POST['jk'];
    $kelas      = $_POST['kelas'];

    $sqlEdit = mysqli_query($konek, "UPDATE siswa SET no_kartu='$nokartu', nisn='$nisn', nama='$nama', jk='$jk', kelas='$kelas' WHERE nis='$nis'");

    if ($sqlEdit) {
        echo "
            <script>
                alert('Data Siswa Berhasil Di Ubah');
                location.replace('siswa.php');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Siswa Gagal di Ubah');
                location.replace('siswa.php');
            </script>
        ";
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h5 class="mt-3">Ubah Data Siswa
                <hr>
            </h5>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nokartu" class="form-label">Nomor Kartu</label>
                    <input type="text" class="form-control" id="nokartu" name="nokartu" value="<?= $data['no_kartu']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" readonly value="<?= $data['nis']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $data['nisn']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for=" jk" class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk" <?php if ($data['jk'] == "Laki-laki") {
                                                                                            echo "checked";
                                                                                        } ?> value="Laki-laki">
                        <label class="form-check-label" for="jk">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk" <?php if ($data['jk'] == "Perempuan") {
                                                                                            echo "checked";
                                                                                        } ?> value="Perempuan">
                        <label class="form-check-label" for="jk">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['kelas']; ?>">
                </div>

                <button type="submit" class="btn btn-success" name="ubah">Simpan</button>
            </form>
        </div>
    </section>
</div>

<?php
include "_footer.php";
?>