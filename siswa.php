<?php
include "_header.php";

include  "_top_menu.php";
include "_side_menu.php";

include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM siswa");
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="col">
                <h4>Data Siswa</h4>
                <hr>
            </div>
            <a class="btn btn-success" href="addSiswa.php">Tambah Data</a>
            <div class="card mt-2">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $batas = 10;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $jumlah_data = mysqli_num_rows($sql);
                        $total_halaman = ceil($jumlah_data / $batas);

                        $data_siswa = mysqli_query($konek, "SELECT * FROM siswa limit $halaman_awal, $batas");
                        $nomor = $halaman_awal + 1;

                        $no = 1;
                        while ($data = mysqli_fetch_array($data_siswa)) {

                            echo "
                        <tr>
                            <th scope='row'>" . $no++ . "</th>
                            <td>" . $data['nis'] . "</td>
                            <td>" . $data['nama'] . "</td>
                            <td>" . $data['kelas'] . "</td>
                            <td><a href='EditSiswa.php?nis=" . $data['nis'] . "' class='btn btn-primary'>Edit</a> <a href='delSiswa.php?nis=" . $data['nis'] . "' class='btn btn-danger'>Hapus</a></td>
                        </tr>";
                        }
                        ?>

                    </tbody>
                </table>

            </div>
            <nav aria-label="Page navigation example" class="mt-2">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href='?halaman=$previous'";
                                                } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman  < $total_halaman) {
                                                    echo "href='?halaman=$next'";
                                                } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</div>

<?php
include "_footer.php";
?>