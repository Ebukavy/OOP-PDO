<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $database = new Database();
    $data = $database->fetchData($id);


    if ($data !== false) {
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='{$id}'>";
        echo "Naam: <input type='text' name='Naam' value='{$data['Naam']}'><br>";
        echo "Leeftijd: <input type='text' name='Leeftijd' value='{$data['Leeftijd']}'><br>";
        echo "Gender: <input type='text' name='Gender' value='{$data['Gender']}'><br>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Record not found for ID: {$id}";
    }
} else {
    echo "Invalid ID";
}
?>
