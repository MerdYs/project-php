<?php

require 'database.php';

$id = $_GET['id'];

$delete = $conn->prepare("DELETE FROM users WHERE id = :id ");
$delete->bindParam('id', $id);

if ($delete->execute()) {
    header("location: index.php");
}
