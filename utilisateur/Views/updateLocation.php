<?php

include '../Controller/LocationC.php';

$error = "";

// create location
$location = null;

// create an instance of the controller
$locationC = new LocationC();
if (
    isset($_POST["num_loc"]) &&
    isset($_POST["d_dep"]) &&
    isset($_POST["d_arr"]) &&
    isset($_POST["etat_loc"]) &&
    isset($_POST["duree_loc"])
) {
    if (
        !empty($_POST["num_loc"]) &&
        !empty($_POST["d_dep"]) &&
        !empty($_POST["d_arr"]) &&
        !empty($_POST["etat_loc"]) &&
        !empty($_POST["duree_loc"])
    ) {
        $location = new Locations(
            $_POST['num_loc'],
            new DateTime($_POST['d_dep']),
            new DateTime($_POST['d_arr']),
            $_POST['etat_loc'],
            $_POST['duree_loc']
        );
        $locationC->updateLocation($location, $_POST["num_loc"]);
        header('Location:ListLocations.php');
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
    <button><a href="ListLocations.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['num_loc'])) {
        $location = $locationC->showLocation($_POST['num_loc']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="num_loc">Numéro de Location:
                        </label>
                    </td>
                    <td><input type="text" name="num_loc" id="num_loc" value="<?php echo $location['num_loc']; ?>" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="d_dep">Date de départ:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="d_dep" id="d_dep" value="<?php echo $location['d_dep']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="d_arr">Date d'arrivée:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="d_arr" id="d_arr" value="<?php echo $location['d_arr']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="etat_loc">Etat de Location:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="etat_loc" id="etat_loc" value="<?php echo $location['etat_loc']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="duree_loc">Durée de Location:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="duree_loc" id="duree_loc" value="<?php echo $location['duree_loc']; ?>">
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