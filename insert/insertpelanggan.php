<?php
require_once("..\koneksi.php");

if (!empty($_POST)) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["no"];

    $query = "INSERT INTO pelanggan( nama_pelanggan, alamat, no_telp) 
        VALUES ('$nama','$alamat','$hp')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil ditambah!";
        header("location: ../formpelanggan.php");
    } else {
        echo "Data gagal ditambahkan!";
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>