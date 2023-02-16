<?php
require "database.php";

$servername = "mariadb";
$username = "user";
$password = "password";
$dbname = "database";


$stmt = $conn->prepare("SELECT id, first_name, last_name, email, password, ip_address FROM users");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$all_users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Database van Users</title>
</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>IP Address</th>
            <th>Update</th>
            <th>Verwijder</th>
        </tr>
        <?php foreach ($all_users as $user) : ?>
            <tr>
                <td><?php echo $user["id"] ?></td>
                <td><?php echo $user["first_name"] ?></td>
                <td><?php echo $user["last_name"] ?></td>
                <td><?php echo $user["email"] ?></td>
                <td><?php echo $user["password"] ?></td>
                <td><?php echo $user["ip_address"] ?></td>
                <td><a href="users_update.php?id=<?php echo $user["id"] ?>">Update</a></td>
                <td><a href="users_delete.php?id=<?php echo $user["id"] ?>">Delete</a></td>
                <td><a href="users_show.php?id=<?php echo $user["id"] ?>">Bekijk Detail</a></td>
            <?php endforeach; ?>
            </tr>
    </table>
</body>

</html>