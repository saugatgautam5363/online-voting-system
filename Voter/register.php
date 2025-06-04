<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    echo "Registered successfully. <a href='login.php'>Login</a>";
}
?>

<form method="post">
    Username: <input type="text" name="username" required /><br>
    Password: <input type="password" name="password" required /><br>
    <button type="submit">Register</button>
</form>