<?php
include('../db/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $conn->query("INSERT INTO candidates (name) VALUES ('$name')");
    echo "Candidate added.";
}

?>
<form method="POST">
    <h2>Add Candidate</h2>
    <input name="name" placeholder="Candidate Name" required><br>
    <button type="submit">Add</button>
</form>
