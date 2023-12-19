<!DOCTYPE html>
<html>
<LINK HREF="stylesheet.css" REL="stylesheet" TYPE="text/css">
<head>
    <title>Update User</title>
</head>
<body>


<?php
// include de navigatie bar
include ('Header.php');
echo "<h1>Update User</h1>";
// include de database connectie
require_once('dbh.php');
// include de user bestand waar de user class in staat
include('user.php');

// roep de door gegeven informatie op en wijs ze toe aan een variabele
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $gewerkteuren = $_POST['gewerkteuren'];
    $locatie = $_POST['locatie'];

    // maak een nieuwe databaseconnection object
    $db = new DatabaseConnection();
    $connection = $db->getConnection();

    $user = new User($connection);

    // update de werknemer en wijs nieuwe informatie toe in de database
    if ($user->update($id, $naam, $email, $gewerkteuren, $locatie)) {
        echo "Werknemer succesvol aangepast <a href='readwerknemer.php'>Bekijk werknemers</a>";
    } else {
        echo "Error bijwerking";
    }

    $db->closeConnection();
}
?>



<form action="updatewerknemer.php" method="post">
    <input type="text" name="id" required placeholder="Id van de Werknemer">
    <br>


    <input type="text" name="naam" required placeholder="naam">
    <br>


    <input type="email" name="email" required placeholder="email">
    <br>


    <input type="text" name="gewerkteuren" required placeholder="gewerkte uren">
    <br>


    <input type="text" name="locatie" required placeholder="locatie">
    <br>
    <br>

    <input type="submit" value="Update User">
</form>
</body>
</html>
