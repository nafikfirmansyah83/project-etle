<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataPelanggar diklik maka
if (isset($_POST['dataPelanggar'])) {
    $output = '';

    // mengambil data Pelanggar dari kode_transaksi yang berasal dari dataPelanggar
    $sql = "SELECT * FROM pelanggaran WHERE kode_transaksi = '" . $_POST['dataPelanggar'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '    <tr>
                            <th width="40%">Kode Transaksi</th>
                            <td width="60%">' . $row['kode_transaksi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nomor Mesin</th>
                            <td width="60%">' . $row['no_mesin'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nomor Rangka</th>
                            <td width="60%">' . $row['no_rangka'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nomor Plat</th>
                            <td width="60%">' . $row['no_plat'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Merk / Type</th>
                            <td width="60%">' . $row['merk'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jenis Pelanggaran</th>
                            <td width="60%">' . $row['jenis_pelanggaran'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nominal Denda</th>
                            <td width="60%">' . $row['nominal'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Lokasi</th>
                            <td width="60%">' . $row['lokasi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal</th>
                            <td width="60%">'. date("d M Y", strtotime($row['tanggal'])) . '</td>
                        </tr>
                        <tr align="center">
                            <th width="40%">Foto</th>
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
