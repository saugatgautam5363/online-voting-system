<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $party = $_POST['party'];

    $stmt = $conn->prepare("INSERT INTO candidates (name, party) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $party);
    $stmt->execute();

    echo "Candidate added!";
}
?>

<form method="post">
    Name: <input type="text" name="name" /><br>
    Party: <input type="text" name="party" /><br>
    <button type="submit">Add Candidate</button>
</form>