<?php 

// Skapa variabler för inloggning mot databasen
$dbHost = "localhost";
$dbUser = "root";
$dbPwd = "root";
$dbName = "webshop";

$connection = mysqli_connect($dbHost, $dbUser, $dbPwd, $dbName);

if (!$connection) {
echo "Error: Unable to connect to MySQL<br>";
echo "<br>Debugging error: " . mysqli_connect_error();
exit;
}
// Tips: Lägg till denna rad för att lösa problem med svenska tecken.
mysqli_set_charset($connection, "utf8");

?>