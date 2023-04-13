<?php

include '../Controller/LocationC.php';

$error = "";

// create location
$location = null;

// create an instance of the controller
$locationC = new LocationC();
if (
    isset($_POST["d_dep"]) &&
    isset($_POST["d_arr"]) &&
    isset($_POST["etat_loc"]) &&
    isset($_POST["duree_loc"])
) {
    if (
        !empty($_POST["d_dep"]) &&
        !empty($_POST["d_arr"]) &&
        !empty($_POST["etat_loc"]) &&
        !empty($_POST["duree_loc"])
    ) {
        $location = new Locations(
            null,
            new DateTime($_POST['d_dep']),
            new DateTime($_POST['d_arr']),
            $_POST['etat_loc'],
            $_POST['duree_loc']
        );
        $locationC->addLocation($location);
         header('Location:ListLocations.php');
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
    <form id="form" class="form" name="location" autocomplete="off" method="POST"  style="z-index: 1; left: -3px; top: 214px; position: absolute; height: 132px; width: 494px">
    <pre><h2 id="formName">         Sign-Up  </h2></pre>
        <div class="form-control">
            <input type="date" name="d_dep" id="d_dep" placeholder="Date de départ" >
            <td >
            
              <p style="color: red" id="dpEr""></p>
            
            </td>
            <small>Error message</small>
            <input type="date" name="d_arr" id="d_arr" placeholder="Date d'arrivée" >
            <td >
            
              <p style="color: red" id="arrEr""></p>
            
            </td>
            <small>Error message</small>
            <input type="text" name="etat_loc" id="etat_loc" placeholder="état de Location" >
            <td >
            
              <p style="color: red" id="etatEr""></p>
            
            </td>
            <small>Error message</small>
            <input type="text" name="duree_loc" id="duree_loc" placeholder="durée de Location" >
            <td >
            
              <p style="color: red" id="dureeEr""></p>
            
            </td>
            <small>Error message</small>
        </div>
        <button type="submit">Submit</button>
        <p style="color: red" id="erreur""></p>
        <a href="contactEmail.php">Contact</a>
    </form>
    
</div>

    <!-- <script src="views/app.js"></script> -->
</body>
</html>