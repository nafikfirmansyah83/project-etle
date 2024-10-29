<?php
session_start();

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Mengambil data dari nis dengan fungsi get
$kode_transaksi = $_GET['kode_transaksi'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($kode_transaksi) > 0) {
    echo "<script>
                alert('Pembayaran Berhasil!');
                document.location.href = 'cekdata.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Pembayaran gagal!');
        </script>";
}
