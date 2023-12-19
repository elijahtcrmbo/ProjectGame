<!DOCTYPE html>
<html>
<LINK HREF="stylesheet.css" REL="stylesheet" TYPE="text/css">
<head>
    <title>Verwijder gebruiker</title>
</head>
<body>




<?php
// include de navigatie bar
include ('Header.php');
echo "<h1> Verwijder Gebruiker </h1>";
require_once('dbh.php'); // Include de database connectie
include('user.php'); // Include de user bestand waar de user class in staat

// haal de informatie op die is gegeven via de html form en wijs ze toe aan een variabele
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // maak een nieuwe databaseconnection object
    $db = new DatabaseConnection();
    $connection = $db->getConnection();

    $user = new User($connection);

    // Delete de werknemer door met behulp van de id de werknemer uit de datbase te halen
    if ($user->delete($id)) {
        echo "Werknemer Succesvol verwijderd. <a href='readwerknemer.php'>Bekijk Werknemers</a>";
    } else {
        echo "Error deleting user.";
    }

    $db->closeConnection();
}
?>


<form action="deletewerknemer.php" method="post">
    <label for="id">Vul de id van de werknemer die u wenst te verwijderen in.</label>
    <input type="number" name="id" required>
    <br>

    <input type="submit" value="Delete User">
</form>
<br>
<br>


</body>
</html>

