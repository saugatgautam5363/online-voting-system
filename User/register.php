<?php
include('../db/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    echo "Registered successfully. <a href='login.php'>Login</a>";
}
?>
<form method="POST">
    <h2>Register</h2>
    <input name="username" placeholder="Username" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

