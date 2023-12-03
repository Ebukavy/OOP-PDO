<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $Naam = $_POST['Naam'];
    $Leeftijd = $_POST['Leeftijd'];
    $Gender = $_POST['Gender'];

    $database = new Database();
    $database->updateData($id, $Naam, $Leeftijd, $Gender);
}
?>
