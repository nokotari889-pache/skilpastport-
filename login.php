<?php
session_start();
include "koneksi.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_assoc($data);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("location: admin.php");
        exit();
    } else {
        $salah = "Username atau Password salah bro!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Aplikasi Kasir</title>
</head>
<body>
    <h2>Login Dulu</h2>
    <?php if(isset($salah)) { echo "<p style='color:red;'>$salah</p>"; } ?>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Masuk</button>
    </form>
</body>
</html>