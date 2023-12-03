<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $database = new Database();

    $database->deleteData($id);
    
    echo "Record with ID {$id} has been deleted successfully.";
} else {
    echo "Invalid ID";
}
?>
