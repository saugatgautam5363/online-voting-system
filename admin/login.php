<?php
session_start();
include('../db/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $result = $conn->query("SELECT * FROM admins WHERE username='$username'");
    $admin = $result->fetch_assoc();
    if (password_verify($_POST['password'], $admin['password'])) {
        $_SESSION['admin'] = $admin;
        header('Location: dashboard.php');
    } else {
        echo "Invalid credentials";
    }
}

?>
<form method="POST">
    <h2>Admin Login</h2>
    <input name="username" placeholder="Admin Username" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>