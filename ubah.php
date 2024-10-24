<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari nis dengan fungsi get
$kode_transaksi = $_GET['kode_transaksi'];

// Mengambil data dari table pelanggar dari nis yang tidak sama dengan 0
$pelanggar = query("SELECT * FROM pelanggaran WHERE kode_transaksi = '$kode_transaksi'")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data pelanggar berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data pelanggar gagal diubah!');
            </script>";
    }
}


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
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Ubah Data Pelanggar</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php"> <img src="images/logo.png" width="50px" height="50px"></a>
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Pelanggar</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Kode Pelanggar</label>
                    <input type="hidden" name="gambarLama" value="<?= $pelanggar['gambar']; ?>">
                    <input type="text" name="kode_transaksi" id="kode_transaksi" value="<?= $pelanggar['kode_transaksi']; ?>"  class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Atas Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $pelanggar['nama']; ?>" autocomplete="off" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Nomer Mesin Kendaraan</label>
                            <input type="text" name="no_mesin" id="no_mesin" class="form-control" value="<?= $pelanggar['no_mesin']; ?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Nomer Rangka Kendaraan</label>
                            <input type="text" name="no_rangka" id="no_rangka" class="form-control" value="<?= $pelanggar['no_rangka']; ?>" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Nomer Plat Kendaraan</label>
                            <input type="text" name="no_plat" id="no_plat" class="form-control" value="<?= $pelanggar['no_plat']; ?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Merk / Type</label>
                            <input type="text" name="merk" id="merk" class="form-control" value="<?= $pelanggar['merk']; ?>" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Pelanggaran</label>
                    <select class="form-select" name="jenis_pelanggaran" id="jenis_pelanggaran">
                        <option>-Pilih-</option>
                        <option value="Melanggar rambu lalu lintas"<?php if ($pelanggar['jenis_pelanggaran'] == 'Melanggar rambu lalu lintas') { ?> selected='' <?php } ?>>Melanggar rambu lalu lintas</option>
                        <option value="Tidak mengenakan sabuk pengaman"<?php if ($pelanggar['jenis_pelanggaran'] == 'Tidak mengenakan sabuk pengaman') { ?> selected='' <?php } ?>>Tidak mengenakan sabuk pengaman</option>
                        <option value="Menggunakan smartphone"<?php if ($pelanggar['jenis_pelanggaran'] == 'Menggunakan smartphone') { ?> selected='' <?php } ?>>Menggunakan smartphone</option>
                        <option value="Melanggar batas kecepatan"<?php if ($pelanggar['jenis_pelanggaran'] == 'Melanggar batas kecepatan') { ?> selected='' <?php } ?>>Melanggar batas kecepatan</option>
                        <option value="Tidak pakai helm"<?php if ($pelanggar['jenis_pelanggaran'] == 'Tidak pakai helm') { ?> selected='' <?php } ?>>Tidak pakai helm</option>
                        <option value="Boncengan lebih dari 3 orang"<?php if ($pelanggar['jenis_pelanggaran'] == 'Boncengan lebih dari 3 orang') { ?> selected='' <?php } ?>>Boncengan lebih dari 3 orang</option>                                        
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $pelanggar['lokasi']; ?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $pelanggar['tanggal']; ?>" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nominal Denda</label>
                    <select class="form-select" name="nominal" id="nominal">
                        <option>-Pilih-</option>
                        <option value="Rp. 100.000"<?php if ($pelanggar['nominal'] == 'Rp. 100.000') { ?> selected='' <?php } ?>>Rp. 100.000</option>
                        <option value="Rp. 250.000"<?php if ($pelanggar['nominal'] == 'Rp. 250.000') { ?> selected='' <?php } ?>>Rp. 250.000</option>
                        <option value="Rp. 500.000"<?php if ($pelanggar['nominal'] == 'Rp. 500.000') { ?> selected='' <?php } ?>>Rp. 500.000</option>
                        <option value="Rp. 750.000"<?php if ($pelanggar['nominal'] == 'Rp. 750.000') { ?> selected='' <?php } ?>>Rp. 750.000</option>                                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar <i>(Saat ini)</i></label> <br>
                    <img src="img/<?= $pelanggar['gambar']; ?>" width="50%" style="margin-bottom: 10px;">
                    <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file">
                </div>
                <hr>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->



    <!-- Footer -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-md-6 my-2">
                <h4 class="fw-bold text-uppercase">About</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae dolore sed porro modi mollitia quaerat? Nam, error fugit sed, maiores illum architecto, officiis voluptate nesciunt voluptatibus aut reprehenderit perspiciatis doloremque!</p>
            </div>
            <div class="col-md-6 my-2 text-center link">
                <h4 class="fw-bold text-uppercase">Account Links</h4>
                <a href="https://web.facebook.com/vikry.surya.5/" target="_blank"><i class="bi bi-facebook fs-3"></i></a>
                <a href="https://github.com/vikrysurya24" target="_blank"><i class="bi bi-github fs-3"></i></a>
                <a href="https://www.instagram.com/vikrysurya_/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
                <a href="https://twitter.com/vikrysurya_" target="_blank"><i class="bi bi-twitter fs-3"></i></a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        <p>Created with <i class="bi bi-suit-heart-fill" style="color: red;"></i> by <a href="https://instagram.com/vikrysurya_" target="_blank" style="color: #fff;">Vikry Surya P</a></p>
    </footer>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>