<?php

require 'database.php';

if (isset($_POST)) {
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, ipaddress)
    VALUES (:firstname, :lastname, :email, password, ipaddress)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':ipaddress', $ipaddress);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users Update</title>
</head>

<body>
    <form action="">
        <input type="text"> <br>
        <input type="text"> <br>
        <input type="text"> <br>
        <input type="text"> <br>
        <input type="text"> <br>
    </form>
</body>

</html>