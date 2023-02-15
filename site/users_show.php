<?php
require 'database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT id, first_name, last_name, email, password, ip_address FROM users WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt->fetch();

echo "Details van " . $user['first_name'];
