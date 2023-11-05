<?php
session_start();
require_once('koneksi.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $hint = $_POST['hint'];
    $jawabanhint = $_POST['hintanswer'];
    $password = $_POST['password'];

    // Verifikasi data yang diambil dari form
    if (empty($username) || empty($hint) || empty($jawabanhint) || empty($password)) {
        $_SESSION['error'] = 'Semua kolom harus diisi';
        header("Location: forgot.php");
        exit();
    }

    $querycari = "SELECT * FROM users WHERE username = '$username' AND hint = '$hint' AND jawaban_hint = '$jawabanhint'";
    $resultcari = mysqli_query($koneksi, $querycari);

    if (mysqli_num_rows($resultcari) == 1) {
        // User ditemukan, perbarui kata sandi
        $queryUpdate = "UPDATE users SET password = '$password' WHERE username = '$username'";
        $resultUpdate = mysqli_query($koneksi, $queryUpdate);

        if ($resultUpdate) {
            // Password berhasil diperbarui
            $_SESSION['luppus'] = 'Password berhasil Diubah';
            header("Location: login.php");
            exit();
        } else {
            $_SESSION["error"] = 'Gagal merubah password: ' . mysqli_error($koneksi);
            header("Location: forgot.php");
            exit();
        }
    } else {
        $_SESSION["error"] = 'Username Tidak Ditemukan atau jawaban hint salah';
        header("Location: forgot.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Forgot Password</title>
</head>

<body style="background-image: url(assets/foto/background.jpg);">
    <div class="container">
        <div class="main-card" style="justify-content: start; max-height: 480px;">
            <img src="assets/foto/anggrek.jpeg" class="img-card">
            <form action="forgot.php" method="POST" class="card-2">
                <h1 style="margin-right: -10px; margin-left: -20px;">Forgot Password</h1>
                <label for="username" style="margin-left: 5px; margin-bottom: -5px;">Username : </label>
                <input type="text" name="username" id="username" style="width: 230px; height: 25px; 
                    border-radius: 5px; margin-left: 5px;" placeholder="Input your username" required>
                <label for="hint" class="ket-hint" style="margin-left: -20px; margin-bottom: 15px; top: 0px;">Select
                    Hint : </label>
                <select name="hint" id="hint" class="hint-column" style="margin-left: -16px; top: -20px;" required>
                    <option value="" selected disabled hidden>-- Choose a hint --</option>
                    <option value="Apa hobi anda?">Apa hobi anda?</option>
                    <option value="Apa makanan kesukaan anda?">Apa makanan kesukaan anda?</option>
                    <option value="Siapa nama ibu anda?">Siapa nama ibu anda?</option>
                    <option value="Dimana kota anda tinggal?">Dimana kota anda tinggal?</option>
                    <option value="Apa warna kesukaan anda?">Apa warna kesukaan anda?</option>
                </select>
                <label for="hintanswer" class="ket-jawabanhint"
                    style="margin-left: -20px; top: -15px; margin-bottom: 10px;">Hint Answer : </label>
                <input name="hintanswer" type="text" class="jawabanhint-column" id="hintanswer" required
                    placeholder="Enter your Hint Answer here"
                    style="margin-left: -20px; top: -35px; margin-bottom: 13px; width: 230px;">
                <label for="password" style="margin-left: 5px; margin-top: -50px;">Password : </label>
                <input type="password" name="password" id="password" style="width: 230px; height: 25px; 
                    border-radius: 5px; margin-left: 5px; margin-top: -40px;" placeholder="Input your password here"
                    required>
                <input name="submit" type="submit" class="button-submit1" style="margin-top: 0px; margin-bottom: 50px;">
            </form>
        </div>
    </div>
</body>

</html>