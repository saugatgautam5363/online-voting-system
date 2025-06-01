<?php
session_start();
include('../db/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: vote.php');
    } else {
        echo "Invalid credentials";
    }
}
?>
<form method="POST">
    <h2>User Login</h2>
    <input name="username" placeholder="Username" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>