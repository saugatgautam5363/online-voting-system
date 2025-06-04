<?php
session_start();
include '../db/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['otp_sent'])) {
  $_SESSION['otp_user'] = $_POST['username'];
  $_SESSION['otp'] = rand(100000,999999);
  $_SESSION['otp_sent'] = true;
  echo "<div class='card'>OTP: {$_SESSION['otp']}</div>";
  echo "<form method='post'><input name='otp'><button>Verify</button></form>";
  exit;
}
if (isset($_POST['otp']) && $_POST['otp'] == $_SESSION['otp']) {
  $_SESSION['voter'] = $_SESSION['otp_user'];
  header("Location: vote.php"); exit;
}
?>
<form method="post" class="card">
  <h2>Login</h2>
  <input name="username" required><button>Send OTP</button>
</form>
