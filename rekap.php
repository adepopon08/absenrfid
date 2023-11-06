<?php
include "_header.php";

include "koneksi.php";

$sqlMode = mysqli_query($konek, "SELECT * FROM status");
$dMode = mysqli_fetch_array($sqlMode);

?>


<div class="container-fluid">
    <div class="card mt-2">
        <?php
        if ($dMode['mode'] == 1) { ?>
            <table class="table">
                <thead>
                    <th>Jam Masuk</th>
                    <th>NIS</th>
                    <th>Nama</th>
                </thead>
                <tbody>
                    <?php

                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');
                    $sql = mysqli_query($konek, "SELECT * FROM absensi a, siswa s WHERE a.nokartu = s.no_kartu and a.tanggal='$tanggal'");

                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {

                        echo "
                        <tr>
                            <td>" . $data['jam_masuk'] . "</td>
                            <td>" . $data['nis'] . "</td>
                            <td>" . $data['nama'] . "</td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        <?php
        } elseif ($dMode['mode'] == 2) { ?>
            <table class="table">
                <thead>
                    <th>Jam Masuk</th>
                    <th>Jam Dispensasi</th>
                    <th>NIS</th>
                    <th>Nama</th>
                </thead>
                <tbody>
                    <?php

                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');
                    $sql = mysqli_query($konek, "SELECT * FROM absensi a, siswa s WHERE a.nokartu = s.no_kartu and a.tanggal='$tanggal' and a.jam_dispen != '00:00:00'");

                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {

                        echo "
                        <tr>
                            <td>" . $data['jam_masuk'] . "</td>
                            <td>" . $data['jam_dispen'] . "</td>
                            <td>" . $data['nis'] . "</td>
                            <td>" . $data['nama'] . "</td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        <?php
        } elseif ($dMode['mode'] == 3) { ?>
            <table class="table">
                <thead>
                    <th>Jam Masuk</th>
                    <th>Jam Dispensasi</th>
                    <th>Jam Kembali</th>
                    <th>NIS</th>
                    <th>Nama</th>
                </thead>
                <tbody>
                    <?php

                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');
                    $sql = mysqli_query($konek, "SELECT * FROM absensi a, siswa s WHERE a.nokartu = s.no_kartu and a.tanggal='$tanggal' and a.jam_kembali != '00:00:00'");

                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {

                        echo "
                        <tr>
                            <td>" . $data['jam_masuk'] . "</td>
                            <td>" . $data['jam_dispen'] . "</td>
                            <td>" . $data['jam_kembali'] . "</td>
                            <td>" . $data['nis'] . "</td>
                            <td>" . $data['nama'] . "</td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        <?php } elseif ($dMode['mode'] == 4) { ?>
            <table class="table">
                <thead>
                    <th>Jam Masuk</th>
                    <th>Jam Dispensasi</th>
                    <th>Jam Kembali</th>
                    <th>Jam Pulang</th>
                    <th>NIS</th>
                    <th>Nama</th>
                </thead>
                <tbody>
                    <?php

                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');
                    $sql = mysqli_query($konek, "SELECT * FROM absensi a, siswa s WHERE a.nokartu = s.no_kartu and a.tanggal='$tanggal' and a.jam_pulang != '00:00:00'");

                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {

                        echo "
                        <tr>
                            <td>" . $data['jam_masuk'] . "</td>
                            <td>" . $data['jam_dispen'] . "</td>
                            <td>" . $data['jam_kembali'] . "</td>
                            <td>" . $data['jam_pulang'] . "</td>
                            <td>" . $data['nis'] . "</td>
                            <td>" . $data['nama'] . "</td>
                        </tr>";
                    }
                    ?>

                </tbody>
            </table>
        <?php
        }
        ?>


    </div>
</div>