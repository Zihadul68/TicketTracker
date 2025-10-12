<?php
require_once('../model/db.php');

if (isset($_GET['busId'])) {
    $busId = $_GET['busId'];

    if (deleteBus($busId)) {
        header('Location: ../view/buslist.php');
    } else {
        echo "Error deleting bus record.";
    }

    header('Location: ../view/buslist.php');
   
}
?>
