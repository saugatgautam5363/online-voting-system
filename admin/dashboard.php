<?php
include '../db/config.php';
$res = $conn->query("SELECT name, votes FROM candidates");
$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}
?>
<html><head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="../css/style.css">
</head><body><div class="card">
<h2>Live Voting</h2>
<canvas id="voteChart"></canvas></div>
<script>
const data = <?= json_encode($data) ?>;
new Chart(document.getElementById("voteChart"), {
  type: 'bar',
  data: {
    labels: data.map(d => d.name),
    datasets: [{ label: 'Votes', data: data.map(d => d.votes), backgroundColor: '#007bff' }]
  }
});
</script></body></html>
