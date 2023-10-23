<!-- Code tegister start -->
<?php
require_once 'koneksi.php';

if (isset($_GET['login_section'])) {
    if ($_GET['login_section'] == 'signup' && isset($_POST['submit'])) {
        $is_true = true;
        foreach (['username', 'password', 'hint', 'hintanswer'] as $key => $required_input) {
            if (!isset($_POST["$required_input"])) {
                $is_true = false;
            }
        }

        if ($is_true) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $hint = $_POST["hint"];
            $hintanswer = $_POST["hintanswer"];

            if (mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT username FROM users WHERE username='$username'")) != null) {
                ?>
                <script type="module">
                    alert('Username sudah terpakai.');
                </script>
                <?php
            } else {
                $query_sql = "INSERT INTO users (username, password, hint, jawaban_hint)
                        VALUES ('$username', '$password', '$hint', '$hintanswer')";

                if (mysqli_query($koneksi, $query_sql)) {
                    header("Location: login.php?login_section=signin");
                } else {
                    echo "Register Failed : " . mysqli_error($koneksi);
                }
            }
        } else {
            echo "<script>
            alert('Pastikan semua kolom terisi')
        </script>";
        }
    }
}
?>

<!-- Code register end -->

<!-- Code login start -->

<?php
require_once 'koneksi.php';

if (isset($_GET['login_section'])) {
    if ($_GET['login_section'] == 'signup' && isset($_POST['submit'])) {

    } elseif ($_GET['login_section'] == 'signin' && isset($_POST['submit'])) {
        $is_true = true;
        foreach (['username', 'password'] as $required_input) {
            if (!isset($_POST[$required_input]) || empty($_POST[$required_input])) {
                $is_true = false;
            }
        }

        if ($is_true) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($koneksi, $query);

            if (mysqli_num_rows($result) == 1) {
                echo "<script>
                        alert('Login berhasil');
                        window.location.href = 'index.php';
                    </script>";
            } else {
                echo "Username atau password salah.";
            }
        } else {
            echo "<script>alert('Pastikan semua kolom terisi')</script>";
        }
    }
}
?>

<!-- Code login end -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kebun Anggrek</title>
</head>

<style>
    .ket-login:hover {
        background-color: rgb(212, 212, 212);
        color: rgb(43, 43, 43);
        transition: 0.2s;
        transition-delay: 0.2s;
    }

    *,
    html {
        margin-block-end: 0px;
    }

    body .container {
        padding: 0px;
    }

    script {
        margin: 0px;
        padding: 0px;
    }
</style>

<body style="margin-block-end: 0px; margin-block-start: 0px; margin: 0px; padding: 0px; padding-block-end: 0px; padding-block-start: 0px; padding-top: 0px;">
    <div class="container">
        <!-- <div> -->
        <div class="main-card" style="justify-content: start; max-height: 480px;">
            <img src="anggrek.jpeg" class="img-card">
            <?php
            if (isset($_GET['login_section'])) {
                $login_section = $_GET['login_section'];
                switch ($login_section) {
                    case 'signin':
                        ?>
                        <form action="?login_section=signin" method="POST" style="margin-block-end: 0px; margin-block-start: 0px; margin: 0px;" class="card-2">
                            <h1 style="position: relative; left: -17px;">Login</h1>
                            <label for="username" class="ket-email1">Username : </label>
                            <input name="username" type="text" id="username" class="email-column1"
                                placeholder="Input your username here   ">
                            <label for="password" class="ket-password1">Password : </label>
                            <input name="password" type="password" id="password" class="password-column1"
                                placeholder="Input your password here">
                            <a href="changepassword.php" class="change-password" style="color: white;">Forgot Password?</a>
                            <input name="submit" type="submit" class="button-submit1" style="margin-top: 13px;">
                            <p style="position: relative; right: 25px;">Belum punya akun?? <a
                                    href="<?php echo "$_SERVER[SCRIPT_NAME]?login_section=signup" ?>" class="ket-register1"
                                    style="position: relative; left: 55px; color: white;">Register</a></p>
                        </form>
                        <?php
                        break;
                    case 'signup':
                        ?>
                        <form action="?login_section=signup" class="card3" method="POST" style="margin-block-end: 0px;">
                            <h1 class="ket-register" style="margin-left: 75px;" onload="alert(localStorage.log)">Register</h1>
                            <label for="username" class="ket-email2">Username : </label>
                            <input name="username" type="text" class="email-column2" id="txt_email">
                            <label for="password" class="ket-password2">Password : </label>
                            <input name="password" type="password" class="password-column2" id="txt_password">
                            <label for="password" class="ket-hint">Hint : </label>
                            <select name="hint" id="txt_hint" class="hint-column">
                                <option value="" selected disabled hidden>-- Choose at least one --</option>
                                <option value="Apa hobi anda?">Apa hobi anda?</option>
                                <option value="Apa makanan kesukaan anda?">Apa makanan kesukaan anda?</option>
                                <option value="Siapa nama ibu anda?">Siapa nama ibu anda?</option>
                                <option value="Dimana kota anda tinggal?">Dimana kota anda tinggal?</option>
                                <option value="Apa warna kesukaan anda?">Apa warna kesukaan anda?</option>
                            </select>
                            <label for="hintanswer" class="ket-jawabanhint">Hint Answer : </label>
                            <input name="hintanswer" type="text" class="jawabanhint-column" id="hintanswer">
                            <input name="submit" type="submit" class="button-submit2">
                            <p style="position: relative; top: -17px; right: 10px;">Sudah punya akun?? <a
                                    href="<?php echo "$_SERVER[SCRIPT_NAME]?login_section=signin" ?>" class="ket-login" style="margin-left: 70px; border-radius: 5px; padding: 5px; 
                                        list-style-type: none; text-decoration: none; color: white;">Login</a></p>
                        </form>
                        <?php
                        break;
                    default:
                        break;
                }
            } else {
                ?>
                <form action="?login_section=signin" style="margin-block-end: 0px;" method="POST" class="card-2">
                    <h1 style="position: relative; left: -17px;">Login</h1>
                    <label for="username" class="ket-email1">Username : </label>
                    <input name="username" type="text" id="username" class="email-column1"
                        placeholder="Input your username here   ">
                    <label for="password" class="ket-password1">Password : </label>
                    <input name="password" type="password" id="password" class="password-column1"
                        placeholder="Input your password here">
                    <a href="changepassword.php" class="change-password" style="color: white;">Forgot Password?</a>
                    <input name="submit" type="submit" class="button-submit1" style="margin-top: 13px;>
                    <p style="position: relative; right: 25px;">Belum punya akun?? <a
                            href="<?php echo "$_SERVER[SCRIPT_NAME]?login_section=signup" ?>" class="ket-register1"
                            style="position: relative; left: 55px; color: white;">Register</a></p>
                </form>
                <?php
            }
            ?>

        </div>
    </div>
    <!-- </div> -->
</body>

</html>