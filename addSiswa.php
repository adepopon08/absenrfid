<?php
include "_header.php";

include  "_top_menu.php";
include "_side_menu.php";
?>
<script>
    $(document).ready(function() {
        setInterval(function() {
            $("#no_rfid").load('nokartu.php');
        }, 0);
    });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h5 class="mt-3">Tambah Data Siswa
                <hr>
            </h5>

            <form method="POST" action="pSiswa.php">
                <div id="no_rfid"></div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS">
                </div>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for=" jk" class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk" checked value="Laki-laki">
                        <label class="form-check-label" for="jk">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan">
                        <label class="form-check-label" for="jk">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </section>
</div>


<?php
include "_footer.php";
?>