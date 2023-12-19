<!DOCTYPE html>
<html>
<LINK HREF="stylesheet.css" REL="stylesheet" TYPE="text/css">
<head>

</head>
<body>


<?php
// include de naviagtie bar
include ('Header.php');
echo "<h1>Werknemers bekijken</h1>";
// include de database connectie
require_once('dbh.php');
// include de user bestand waar de user class in staat
include('user.php');

// maak een nieuwe databaseconnection object
$db = new DatabaseConnection();
$connection = $db->getConnection();


$user = new User($connection);

// geef de variabel door in de user read class
$users = $user->read();

// print de database gegevens uit
if (!empty($users)) {
    echo "<h2>Werknemers</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>naam</th><th>email</th><th>gewerkteuren</th><th>locatie</th></tr>";

    foreach ($users as $u) {
        echo "<tr><td>{$u['id']}</td><td>{$u['naam']}</td><td>{$u['email']}</td><td>{$u['gewerkteuren']}</td><td>{$u['locatie']}</td></tr>";
    }

    echo "</table>";
} else {
    echo "Geen Gebruikers.";
}
?>



</body>
</html>


