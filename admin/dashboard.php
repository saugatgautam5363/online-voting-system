<?php
session_start();
include('../db/config.php');
$result = $conn->query("SELECT * FROM candidates");
?>

<h2>Admin Dashboard</h2>
<a href="add_candidate.php">Add Candidate</a> |
<a href="view_results.php">View Results</a>
<ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li><?= $row['name'] ?> - <?= $row['votes'] ?> votes</li>
    <?php endwhile; ?>
</ul>