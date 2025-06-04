<?php
session_start();
include '../db/config.php';
if (!isset($_SESSION['voter'])) { header("Location: login.php"); exit; }
$username = $_SESSION['voter'];
$user = $conn->query("SELECT * FROM users WHERE username='$username'")->fetch_assoc();
if ($user['has_voted']) { echo "<div class='card'>Already voted!</div>"; exit; }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['candidate'];
  $conn->query("UPDATE candidates SET votes = votes + 1 WHERE id = $id");
  $conn->query("UPDATE users SET has_voted = 1 WHERE username = '$username'");
  file_put_contents("../logs/votes.txt", "$username voted for $id\n", FILE_APPEND);
  echo "<div class='card'>Vote recorded!</div>"; exit;
}
$res = $conn->query("SELECT * FROM candidates");
?>
<form method="post" class="card">
<?php while ($row = $res->fetch_assoc()) { ?>
  <label><input type="radio" name="candidate" value="<?= $row['id'] ?>"> <?= $row['name'] ?> (<?= $row['party'] ?>)</label><br>
<?php } ?>
  <button type="submit">Vote</button>
</form>