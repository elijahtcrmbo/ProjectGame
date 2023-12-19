
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<LINK HREF="stylesheet.css" REL="stylesheet" TYPE="text/css">
<style>
</style>
<script src=""></script>

</div>
<body>






<?php
// include de naviagtie balk
include ('Header.php');
//Include de database connectie
require_once 'dbh.php';
// Include de user file waar in de user class staat
include ('user.php');

// Haal de informatie uit de html element onder aan dit bestand en wijs ze toe aan een variabele
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


    // Voer de ingevoerde variabele in de database
    if ($user->create($id, $naam, $email, $gewerkteuren, $locatie)) {
        echo "Werknemer toegevoegd. <a href='Readwapens.php'>Bekijk werknemers</a>";
    } else {
        echo "Error tijdens het toevoegen van de werknemer.";
    }
   $db->closeConnection();
}
?>
<h1> Werknemer Toevoegen </h1>

<form action="Createwapens.php" method="post">
    <input type="text" name="id" placeholder="id"> <br><br>
    <input type="text" name="naam" placeholder="naam"> <br><br>
    <input type="text" name="email" placeholder="email"> <br><br>
    <input type="text" name="gewerkteuren" placeholder="gewerkte uren"> <br><br>
    <input type="text" name="locatie" placeholder="locatie"> <br><br>
    <button type="submit" name="submit"> voeg toe </button>
</form>

<br>
<br>


</body>
</html>


