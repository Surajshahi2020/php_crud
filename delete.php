<?php
include 'connection.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $delete = "DELETE FROM form WHERE id = $id";
    $result = $conn->query($delete);
    if ($result === true) {
        header("Location: process.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided for deletion";
}
?>

