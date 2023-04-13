<?php
include '../Controller/ReservationC.php';
$reservationC = new ReservationC();
$reservationC->deleteReservation($_GET["IdReser"]);
header('Location:ListReservations.php');
?>