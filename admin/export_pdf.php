<?php
require '../vendor/autoload.php';
include '../db/config.php';
use Mpdf\Mpdf;
$mpdf = new Mpdf();
$res = $conn->query("SELECT name, party, votes FROM candidates");
$html = "<h2>Results</h2><table><tr><th>Name</th><th>Party</th><th>Votes</th></tr>";
while ($r = $res->fetch_assoc()) {
    $html .= "<tr><td>{$r['name']}</td><td>{$r['party']}</td><td>{$r['votes']}</td></tr>";
}
$html .= "</table>";
$mpdf->WriteHTML($html);
$mpdf->Output("results.pdf", "D");
?>