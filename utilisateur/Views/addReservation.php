<?php

include '../Controller/ReservationC.php';

$error = "";

// create reservation
$reservation = null;

// create an instance of the controller
$reservationC = new ReservationC();
if (
    isset($_POST["dateReser"]) &&
    isset($_POST["types_transport"])
) {
    if (
        !empty($_POST["dateReser"]) &&
        !empty($_POST["types_transport"])
    ) {
        $reservation = new Reservation(
            null,
            new DateTime($_POST['dateReser']),
            $_POST['types_transport']
        );
        $reservationC->addReservation($reservation);
         header('Location:ListReservations.php');
        //header('Location:login.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <style>
      body{
background-image:url(../header-bg1.jpg);
background-size: 1600px;


        }
  
    </style>
    <title> Sign-Up</title>
</head>
<body>

<div class="container">
    <form id="form" class="form" name="reservation" autocomplete="off" method="POST"  style="z-index: 1; left: -3px; top: 214px; position: absolute; height: 132px; width: 494px">
    <pre><h2 id="formName">         Sign-Up  </h2></pre>
        <div class="form-control">
            <input type="date" name="dateReser" id="dateReser" placeholder="Date de Reservation"/>
            <small>Error message</small>
            <input type="text" name="types_transport" id="types_transport" placeholder="types de transport" onkeyup="typesValidation()"/>
            <td >
            
              <p style="color: red" id="typesEr""></p>
            
            </td>
            <small>Error message</small>
        </div>
        <button type="submit" onclick="passValidation()" >Submit</button>
        <p style="color: red" id="erreur""></p>
        <a href="contactEmail.php">Contact</a>
    </form>
    
</div>

    <!-- <script src="views/app.js"></script> -->
    <script src="js/employe1.js"></script>
</body>
</html>