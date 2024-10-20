<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "etle");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $kode_transaksi = htmlspecialchars($data['kode_transaksi']);
    $nama = htmlspecialchars($data['nama']);
    $no_mesin = htmlspecialchars($data['no_mesin']);
    $no_rangka = htmlspecialchars($data['no_rangka']);
    $no_plat = htmlspecialchars($data['no_plat']);
    $merk = htmlspecialchars($data['merk']);
    $jenis_pelanggaran = $data['jenis_pelanggaran'];
    $lokasi = htmlspecialchars($data['lokasi']);
    $tanggal = $data['tanggal'];
    $nominal = $data['nominal'];
    $gambar = upload();
    

    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO pelanggaran VALUES ('$kode_transaksi','$nama','$no_mesin','$no_rangka','$no_plat','$merk','$jenis_pelanggaran','$lokasi','$tanggal','$nominal','$gambar')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($kode_transaksi)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM pelanggaran WHERE kode_transaksi = '$kode_transaksi'");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $kode_transaksi = htmlspecialchars($data['kode_transaksi']);
    $nama = htmlspecialchars($data['nama']);
    $no_mesin = htmlspecialchars($data['no_mesin']);
    $no_rangka = htmlspecialchars($data['no_rangka']);
    $no_plat = htmlspecialchars($data['no_plat']);
    $merk = htmlspecialchars($data['merk']);
    $jenis_pelanggaran = $data['jenis_pelanggaran'];
    $lokasi = htmlspecialchars($data['lokasi']);
    $tanggal = $data['tanggal'];
    $nominal = $data['nominal'];

    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE pelanggaran SET nama = '$nama', no_mesin = '$no_mesin', no_rangka = '$no_rangka', no_plat = '$no_plat', merk = '$merk', jenis_pelanggaran = '$jenis_pelanggaran', lokasi = '$lokasi', tanggal = '$tanggal', nominal = '$nominal', gambar = '$gambar' WHERE kode_transaksi = kode_transaksi";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi upload gambar
function upload()
{
    // Syarat
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}
