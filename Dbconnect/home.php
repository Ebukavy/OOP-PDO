<?php
include 'db.php';


$database = new Database();
$database->toevoegenData('Gideon', '70', 'Man');

echo "Databaseconnectie succesvol tot stand gebracht!";
?>
