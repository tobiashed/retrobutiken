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

// Skapa SQL-sats som hämtar all data från tabellen produkt i databasen
$query = "SELECT * FROM produkt";

// Kör SQL-satsen
$table = mysqli_query($connection,$query) or die(mysqli_error($connection));

// Skapa en array
$array = array();

// Lägg till alla filmer i arrayen
while($row = $table->fetch_assoc()){
$array[] = $row;
}

// Skapa en JSON-string med hjälp av funktionen
// json_encode (Returns the JSON representation of a value)
// http://php.net/manual/en/function.json-encode.php
$json_string = json_encode($array, JSON_PRETTY_PRINT);

// Skriv ut JSON-Strängen
echo $json_string;

?>
