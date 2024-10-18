<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$pelanggaran = query("SELECT * FROM pelanggaran ORDER BY kode_transaksi DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>User Page</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="cekdata.php"> <img src="images/logo.png" width="50px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
            <div class="row my-2">
                <div class="col-md">
                    <h3 class="text-center fw-bold text-uppercase">Cek Data</h3>
                    <hr>
                
            
    <div class="container mt-5">
    <form method="get" action="cekdata.php" class="mb-3">
        <label class="form-label">Cari data berdasarkan Plat Nomor</label>
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Cari.....">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
        <?php
                            include 'koneksi.php'; // Sertakan file koneksi

                            if (isset($_GET['search'])) {
                                $search = mysqli_real_escape_string($koneksi, $_GET['search']);

                                $query = "SELECT * FROM pelanggaran WHERE no_plat LIKE '%$search%'";
                                $result = mysqli_query($koneksi, $query);

                                // Tampilkan hasil pencarian dalam bentuk tabel
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-striped">';
                                    echo '<thead>';
                                    echo '<tr>';
                                    echo '<th>Waktu</th>';
                                    echo '<th>Lokasi</th>';
                                    echo '<th>Jenis Pelanggaran</th>';
                                    echo '<th>Status</th>';
                                    echo '<th>Aksi</th>';
                                    // Tambahkan kolom lain jika diperlukan
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['tanggal'] . '</td>';
                                        echo '<td>' . $row['lokasi'] . '</td>';
                                        echo '<td>' . $row['jenis_pelanggaran'] . '</td>';
                                        echo '<td>Aktif / belum dibayar</td>';
                                        echo '<td>
                                        <button class="btn btn-warning btn-sm text-white detail" data-id="'. $row['kode_transaksi'] .'" style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Detail</button> |
                                        <a href="pembayaran.php?kode_transaksi='. $row['kode_transaksi'] .'" class="btn btn-success btn-sm" style="font-weight: 600;" ><i class="bi bi-credit-card"></i>&nbsp;Bayar</a>
                                    </td>';
                                        // Tambahkan kolom lain jika diperlukan
                                        echo '</tr>';
                                    }

                                    echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo 'Tidak ada hasil pencarian.';
                                }

                                // Bebaskan sumber daya hasil
                                mysqli_free_result($result);
                            }

                            // Tutup koneksi
                            mysqli_close($koneksi);
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Close Modal Detail Data -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Pelanggar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-pelanggar">
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fungsi Table
            $('#data').DataTable();
            // Fungsi Table

            // Fungsi Detail
            $('.detail').click(function() {
                var dataPelanggar = $(this).attr("data-id");
                $.ajax({
                    url: "detail.php",
                    method: "post",
                    data: {
                        dataPelanggar,
                        dataPelanggar
                    },
                    success: function(data) {
                        $('#detail-pelanggar').html(data);
                        $('#detail').modal("show");
                    }
                });
            });
            // Fungsi Detail
        });
    </script>
</body>

</html>