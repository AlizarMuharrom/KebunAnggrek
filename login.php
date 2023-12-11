<!-- Code login start -->
<?php
session_start(); // Start the session

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
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: index.php");
                exit();
            }
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
    <link rel="stylesheet" href="assets/css/style1.css">
    <title>Kebun Anggrek</title>
</head>


<body style="background-image: url(assets/foto/background.jpg);">
    <div class="container">
        <!-- <div> -->
        <div class="main-card" style="justify-content: start; max-height: 480px;">
            <img src="assets/foto/anggrek.jpeg" class="img-card">
            <?php
            if (isset($_GET['login_section'])) {
                $login_section = $_GET['login_section'];
                switch ($login_section) {
                    case 'signin':
                        ?>
                        <form action="?login_section=signin" method="POST" style="margin-block-end: 0px; margin-block-start: 0px;"
                            class="card-2">
                            <h1 style="position: relative;">Login</h1>
                            <label for="username" class="ket-email1"
                                style="position: relative; left: 8px; margin-top: 15px;">Username : </label>
                            <input name="username" type="text" id="username" class="email-column1"
                                placeholder="Input your username here" style="position: relative; left: 8px; margin-top: 15px;"
                                required>
                            <label for="password" class="ket-password1"
                                style="position: relative; left: 8px; margin-bottom: 5px; margin-top: 10px;">Password : </label>
                            <input name="password" type="password" id="password" class="password-column1"
                                placeholder="Input your password here" style="position: relative; left: 8px; margin-top: 15px;"
                                required>
                            <a href="forgot.php" class="change-password"
                                style="color: white; position: relative; left: 2px; margin-top: 20px;">Forgot Password?</a>
                            <input name="submit" type="submit" class="button-submit1" style="margin-top: 7px; margin-bottom: 30px;">
                            <p style="position: relative; right: 25px; bottom: 15px;">Belum punya akun?? <a
                                    href="<?php echo "$_SERVER[SCRIPT_NAME]?login_section=signup" ?>" class="ket-register1"
                                    style="position: relative; left: 55px; color: white;">Register</a></p>
                        </form>
                        <?php
                        break;
                    case 'signup':
                        ?>
                        <form action="?login_section=signup" class="card3" method="POST"
                            style="margin-block-end: 0px; margin-block-start: 0px;">
                            <h1 class="ket-register" onload="alert(localStorage.log)">Register</h1>
                            <label for="username" class="ket-email2">Username : </label>
                            <input name="username" type="text" class="email-column2" id="txt_email" required
                                placeholder="Input your Username here">
                            <label for="password" class="ket-password2">Password : </label>
                            <input name="password" type="password" class="password-column2" id="txt_password" required
                                placeholder="Input your Password here">
                            <label for="hint" class="ket-hint">Hint : </label>
                            <select name="hint" id="txt_hint" class="hint-column" required>
                                <option value="" selected disabled>-- Choose at least one --</option>
                                <option value="Apa hobi anda?">Apa hobi anda?</option>
                                <option value="Apa makanan kesukaan anda?">Apa makanan kesukaan anda?</option>
                                <option value="Siapa nama ibu anda?">Siapa nama ibu anda?</option>
                                <option value="Dimana kota anda tinggal?">Dimana kota anda tinggal?</option>
                                <option value="Apa warna kesukaan anda?">Apa warna kesukaan anda?</option>
                            </select>
                            <label for="hintanswer" class="ket-jawabanhint">Hint Answer : </label>
                            <input name="hintanswer" type="text" class="jawabanhint-column" id="hintanswer" required
                                placeholder="Input your Hint Answer here">
                            <input name="submit" type="submit" class="button-submit2">
                            <p style="position: relative; top: -17px; right: 10px;">Sudah punya akun?? <a
                                    href="<?php echo "$_SERVER[SCRIPT_NAME]?login_section=signin" ?>" class="ket-login" style="border-radius: 5px; padding: 5px; 
                                        list-style-type: none; text-decoration: none; color: white;">Login</a></p>
                        </form>
                        <?php
                        break;
                    default:
                        break;
                }
            } else {
                ?>
                <form action="?login_section=signin" method="POST" style="margin-block-end: 0px; margin-block-start: 0px;"
                    class="card-2">
                    <h1 style="position: relative; left: -17px;">Login</h1>
                    <label for="username" class="ket-email1"
                        style="position: relative; left: 8px; margin-top: 15px;">Username : </label>
                    <input name="username" type="text" id="username" class="email-column1"
                        placeholder="Input your username here" style="position: relative; left: 8px; margin-top: 15px;"
                        required>
                    <label for="password" class="ket-password1"
                        style="position: relative; left: 8px; margin-bottom: 5px; margin-top: 10px;">Password : </label>
                    <input name="password" type="password" id="password" class="password-column1"
                        placeholder="Input your password here" style="position: relative; left: 8px; margin-top: 15px;"
                        required>
                    <a href="forgot.php" class="change-password"
                        style="color: white; position: relative; left: 2px; margin-top: 20px;">Forgot Password?</a>
                    <input name="submit" type="submit" class="button-submit1" style="margin-top: 7px; margin-bottom: 30px;">
                </form>
                <?php
            }
            ?>

        </div>
    </div>
    <!-- </div> -->

    <script>

    </script>
</body>

</html>