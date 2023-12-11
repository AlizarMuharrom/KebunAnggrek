<?php
require_once("koneksi.php");

if (!empty($_POST)) {
    $supplier = $_POST["id-supplier"];
    $namaanggrek = $_POST["nama"];
    $jenisanggrek = $_POST["jenis"];
    $idanggrek = $_POST["idanggrek"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $idpembelian = $_POST["idpembelian"];
    $tanggal = $_POST["tanggal"];
    $jumlah = $_POST["jumlah"];
    $total = $_POST["total"];
    

    $query = "INSERT INTO anggrek(nama_anggrek, jenis, id_anggrek , harga, stok, id_supplier) VALUES ('$namaanggrek','$jenisanggrek','$idanggrek','$harga','$stok','$supplier')";
    $query1 = "INSERT INTO pembelian(id_pembelian, tanggal_pembelian, total_harga) VALUES ('$idpembelian',CURDATE(),'$total')";
    $query2 = "INSERT INTO detail_pembelian(id_pembelian, id_anggrek, jumlah) VALUES ('$idpembelian','$idanggrek','$jumlah')";

    if (mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id_supplier from supplier where id_supplier = '$supplier'")) == null) {
        ?>
        <script type='module'>
            alert('Id Supplier tidak ditemukan');
        </script>
        <?php
    } else {
        $result = mysqli_query($koneksi, $query1);
        $result2 = mysqli_query($koneksi, $query);
        $result3 = mysqli_query($koneksi, $query2);

        if ($result) {
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
}
?>