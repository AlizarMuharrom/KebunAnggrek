<?php

require_once("../koneksi.php");

if (isset($_POST['tambah'])) {
    $supplier = $_POST["id-supplier"];
    $namaanggrek = $_POST["nama"];
    $idanggrek = $_POST["idanggrek"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $idpembelian = $_POST["idpembelian"];
    $tanggal = $_POST["tanggal"];
    $jumlah = $_POST["jumlah"];
    $total = $_POST["total"];


    
    $query1 = "INSERT INTO pembelian(id_pembelian, tanggal_pembelian, jumlah, total_harga) VALUES ('$idpembelian',CURDATE(),'$jumlah','$total')";
    $query2 = "INSERT INTO detail_pembelian(id_pembelian, id_anggrek) VALUES ('$idpembelian','$idanggrek')";


    
    $result2 = mysqli_query($koneksi, $query);
    $result3 = mysqli_query($koneksi, $query2);

    if ($result && $result1 && $result2) {
        header('location:../Transaksi.php');
    } else {
        echo "Data gagal ditambahkan!";
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>