<?php
session_start();
require_once 'koneksi.php'; // ini file koneksi ke database login_db kamu

// Cek apakah tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // untuk sementara pakai md5 (nanti bisa upgrade ke password_hash)

    // Query untuk cek user
    $query = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $query->execute([$username, $password]);
    $user = $query->fetch();

    if ($user) {
        // Login sukses -> set session
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];

        // Redirect ke halaman dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Login gagal
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>