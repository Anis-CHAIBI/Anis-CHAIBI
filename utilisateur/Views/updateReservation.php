<?php

include '../Controller/ReservationC.php';

$error = "";

// create Reservation
$reservation = null;

// create an instance of the controller
$reservationC = new ReservationC();
if (
    isset($_POST["IdReser"]) &&
    isset($_POST["dateReser"]) &&
    isset($_POST["types_transport"])
) {
    if (
        !empty($_POST["IdReser"]) &&
        !empty($_POST["dateReser"]) &&
        !empty($_POST["types_transport"])
    ) {
        $reservation = new Reservation(
            $_POST['IdReser'],
            new DateTime($_POST['dateReser']),
            $_POST['types_transport']
        );
        $reservationC->updateReservation($reservation, $_POST["IdReser"]);
        header('Location:ListReservations.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ListReservations.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdReser'])) {
        $reservation = $reservationC->showReservation($_POST['IdReser']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdReser">Id Reservation:
                        </label>
                    </td>
                    <td><input type="text" name="IdReser" id="IdReser" value="<?php echo $reservation['IdReser']; ?>" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="dateReser">Date de Reservation:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateReser" id="dateReser" value="<?php echo $reservation['dateReser']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="types_transport">Types de transport:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="types_transport" id="types_transport" value="<?php echo $reservation['types_transport']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>