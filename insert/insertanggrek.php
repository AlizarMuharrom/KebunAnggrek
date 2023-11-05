<?php
require_once("..\koneksi.php");

if (!empty($_POST)) {
    $supplier = $_POST["id-supplier"];
    $namaanggrek = $_POST["namaanggrek"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $query = "INSERT INTO anggrek(nama_anggrek, jenis, harga, stok, id_supplier) 
        VALUES ('$namaanggrek','$jenis','$harga','$stok','$supplier')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil ditambah!";
        header("location: ../formanggrek.php");
    } else {
        echo "Data gagal ditambahkan!";
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>