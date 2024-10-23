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
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pembayaran</title>
</head>
<body>
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

		<!-- JUDUL HALAMAN -->
    <div class="container">
		<div class="row">
			<!-- KOLOM 1 -->
			<div class="col-md-7">
				<form>
					<h3 class="text-judul">Detail Transaksi</h3>

					<label class="w-100 mb-3">
						Kode Transaksi <br>
						<input type="text" name="kode_transaksi" id="kode_transaksi" value="<?= $pelanggar['kode_transaksi']; ?>" class="form-control" readonly>
					</label>
					<label class="w-100 mb-3">
                        Nomer Mesin Kendaraan <br>
						<input type="text" name="no_mesin" id="no_mesin" class="form-control" placeholder="Masukkan Mesin Kendaraan">
					</label>
					<label class="w-100 mb-3">
                        Nomer Rangka Kendaraan <br>
						<input type="text" name="no_rangka" id="no_rangka" class="form-control" placeholder="Masukkan Rangka Kendaraan">
					</label>
					<label class="w-100 mb-3">
                        Nomer Plat Kendaraan <br>
						<input type="text" name="no_plat" id="no_plat" class="form-control" placeholder="Masukkan Nomer Plat Kendaraan">
					</label>

					<h3 class="text-judul mt-3">Metode Pembayaran</h3>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="pembayaran">
						<img src="images/bayar-1.png">
                        <span class="float-end">+ IDR 12.000</span>
					</label>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="pembayaran">
						<img src="images/bayar-2.png">
                        <span class="float-end">+ IDR 12.000</span>
					</label>
					<label class="w-100 mb-3 border rounded p-2">
						<input type="radio" name="pembayaran">
						<img src="images/bayar-3.png">
                        <span class="float-end"x>+ IDR 12.000</span>
					</label>

				</form>
			</div>

			<!-- KOLOM 2 -->
			<div class="col-md-4 offset-md-1">
				<div class="card sticky-top">
				  <div class="card-header bg-white">
				    <h3 class="text-judul" onclick="printPage()">Detail Pembayaran</h3>
				  </div>
				  <div class="card-body">
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Sub Total</small></div>
				    	<div class="col-md">IDR 250.400</div>
				    </div>
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Biaya Admin</small></div>
				    	<div class="col-md">IDR 12.000</div>
				    </div>
				    <div class="row mt-2 mb-2">
				    	<div class="col-md"><small>Total</small></div>
				    	<div class="col-md">IDR 262.000</div>
				    </div>
				  </div>
				  <div class="card-footer">
                  	<a href="bayar.php?kode_transaksi=<?= $pelanggar['kode_transaksi']; ?>" class="btn btn-lg btn-success w-100" onclick="return confirm('Apakah anda yakin data ini sudah benar?');" ></i>&nbsp;Bayar</a>
				</div>
				</div>
			</div>
		</div>
	</div> <!-- PENUTUP CONTAINER -->

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<!-- JS -->
	<script type="text/javascript" src="css/bootstrap.bundle.min.js"></script>
	<script>
		function printPage() {
			window.print();
		}
	</script>
</body>
</html>	