<?php
include '../Controller/LocationC.php';
$locationC = new LocationC();
$locationC->deleteLocation($_GET["num_loc"]);
header('Location:ListLocations.php');
?>