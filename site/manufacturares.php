<?php
require "database.php";


$stmt = $conn->prepare("SELECT * FROM manufacturers");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$all_manufacturers = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Database van manufacturares</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php foreach ($all_manufacturers as $manufacturer) : ?>
            <tr>
                <td><?php echo $manufacturer["id"] ?></td>
                <td><?php echo $manufacturer["name"] ?></td>
                <td><a href="update_fabrikant.php?id=<?php echo $manufacturer["id"] ?>">update</a></td>
            <?php endforeach; ?>
            </tr>
    </table>
</body>

</html>