<?php

require_once("../koneksi.php");




if (isset($_POST['simpan'])) {
    $idpenjualan = $_POST["idpenjualan"];
    $idpelanggan = $_POST["idpelanggan"];
    $idbarang = $_POST["idanggrek"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no = $_POST["notelepon"];
    $tanggal = $_POST["tanggal"];
    $harga = $_POST["harga"];
    $jumlah = $_POST["jumlah"];
    $total = $_POST["total"];


    $query1 = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat, no_telp) VALUES ('$idpelanggan','$nama','$alamat','$no')";  
    $query = "INSERT INTO penjualan (id_penjualan, tanggal_penjualan, jumlah, total_harga, id_pelanggan) VALUES ('$idpenjualan',CURDATE(),'$jumlah','$total','$idpelanggan')";
    $query2 = "INSERT INTO detail_penjualan (id_penjualan, id_anggrek) VALUES ('$idpenjualan','$idbarang')";


    $result1 = mysqli_query($koneksi, $query);
    $result = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);

    if ($result && $result1 && $result2) {
        header('location:../Transaksi.php');
    } else {
        echo "Data gagal ditambahkan!";
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>