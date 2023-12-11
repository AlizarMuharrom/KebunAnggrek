<?php

require_once("koneksi.php");

if (!empty($_POST)) {
    $idpembelian = $_POST["idpembelian"];
    $idanggrek = $_POST["idanggrek"];
    $tanggal = $_POST["tanggal"];
    $harga = $_POST["harga"];
    $jumlah = $_POST["jumlah"];
    $total = $_POST["total"];


    
    $query1 = "INSERT INTO pembelian(id_pembelian, tanggal_pembelian, total_harga) VALUES ('$idpembelian',CURDATE(),'$total')";
    $query2 = "INSERT INTO detail_pembelian(id_pembelian, id_anggrek, jumlah) VALUES ('$idpembelian','$idanggrek','$jumlah')";


    
    $result1 = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);

    if ($result1 && $result2) {
        ?>
            <script type='module'>
                alert("Data berhasil ditambah!");
            </script>
            <?php
    } else {
        echo "Data gagal ditambahkan!";
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>