<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$pelanggaran = query("SELECT * FROM pelanggaran ORDER BY nama DESC");

// Membuat nama file
$filename = "data pelanggar-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pelanggar.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Kode Transaksi</th>
            <th>Nama</th>
            <th>Nomor Rangka Kendaraan</th>
            <th>Nomor Mesin Kendaraan</th>
            <th>Plat Nomor Kendaraan</th>
            <th>Merk Kendaraan</th>
            <th>Jenis Pelanggaran</th>
            <th>Lokasi dan Tanggal</th>
            <th>Jumlah Denda</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($pelanggaran as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['kode_transaksi']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['no_rangka']; ?></td>
                <td><?= $row['no_mesin']; ?></td>
                <td><?= $row['no_plat']; ?></td>
                <td><?= $row['merk']; ?></td>
                <td><?= $row['jenis_pelanggaran']; ?></td>
                <td><?= $row['lokasi']; ?>, <?= $row['tanggal']; ?></td>
                <td><?= $row['nominal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>