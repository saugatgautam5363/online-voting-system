<?php
session_start();
include('../db/config.php');
$user = $_SESSION['user'];

if ($user['has_voted']) {
    echo "You have already voted.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cid = $_POST['candidate'];
    $conn->query("UPDATE candidates SET votes = votes + 1 WHERE id=$cid");
    $conn->query("UPDATE users SET has_voted = TRUE WHERE id=" . $user['id']);
    echo "Vote cast successfully!";
    exit;
}

$candidates = $conn->query("SELECT * FROM candidates");
?>
<h2>Vote Now</h2>
<form method="POST">
    <?php while ($row = $candidates->fetch_assoc()): ?>
        <input type="radio" name="candidate" value="<?= $row['id'] ?>" required> <?= $row['name'] ?><br>
    <?php endwhile; ?>
    <button type="submit">Submit Vote</button>
</form>