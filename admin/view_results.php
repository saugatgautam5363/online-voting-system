<?php
include('../db/config.php');
$results = $conn->query("SELECT * FROM candidates ORDER BY votes DESC");
?>
<h2>Voting Results</h2>
<ul>
    <?php while ($row = $results->fetch_assoc()): ?>
            <li><?= $row['name'] ?> - <?= $row['votes'] ?> votes</li>
    <?php endwhile; ?>
</ul>
