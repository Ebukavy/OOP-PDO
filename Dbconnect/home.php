<?php
include 'db.php';

$database = new Database();
$data = $database->fetchData();

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Naam</th><th>Leeftijd</th><th>Gender</th><th>Action</th></tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . (isset($row['id']) ? $row['id'] : '') . "</td>";
    echo "<td>" . (isset($row['Naam']) ? $row['Naam'] : '') . "</td>";
    echo "<td>" . (isset($row['Leeftijd']) ? $row['Leeftijd'] : '') . "</td>";
    echo "<td>" . (isset($row['Gender']) ? $row['Gender'] : '') . "</td>";
    echo "<td><a href='edit.php?id=" . (isset($row['id']) ? $row['id'] : '') . "'>Edit</a> | <a href='delete.php?id=" . (isset($row['id']) ? $row['id'] : '') . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
?>
