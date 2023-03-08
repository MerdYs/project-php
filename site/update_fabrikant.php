<?php

require 'database.php';

$id = $_GET['id'];

if (!is_array($fabrikant)) {
    echo "Er is iets fout gegaan";
    exit;
}

if (isset($_POST["submitButton"])) {

    if (!empty($_POST['naamFabrikant'])) {

        if (strlen($_POST['naamFabrikant']) >= 3) {

            $fabrikant = $_POST["naamFabrikant"];


            // prepare sql and bind parameters
            $stmt = $conn->prepare("UPDATE manufacturers SET name = :name WHERE id = :id");
            $stmt->bindParam(':name', $fabrikant);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
    }
}

// prepare sql and bind parameters
$stmt = $conn->prepare("SELECT * FROM manufacturers WHERE id = :id");
$stmt->bindParam(':id', $id);

$stmt->execute();

$fabrikant  = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Fabrikant</title>
</head>

<body>
    <form action="" method="post">
        <label for="naamFabrikant">Naam fabrikant</label>
        <input type="text" name="naamFabrikant" id="naamFabrikant" value="">
        <button type="submit" name="submitButton">update</button>
    </form>
</body>

</html>