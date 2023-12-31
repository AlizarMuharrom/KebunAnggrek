<?php
require_once("../koneksi.php");

if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM anggrek WHERE id_anggrek = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Data Anggrek berhasil dihapus.";
        } else {
            echo "Gagal menghapus data Anggrek: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal menyiapkan statement: " . mysqli_error($koneksi);
    }
} else {
    echo "Permintaan tidak valid.";
}

mysqli_close($koneksi);
?>