<?php
include '../config.php';
include '../Model/Location.php';

class LocationC
{
    public function listLocations()
    {
        $sql = "SELECT * FROM Locations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteLocation($nu)
    {
        $sql = "DELETE FROM Locations WHERE num_loc = :nu";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nu', $nu);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addLocation($location)
    {
        $sql = "INSERT INTO Locations  
        VALUES (NULL,:hdep, :harr, :etl, :dul)";
        $db = config::getConnexion();
        try {
            print_r($location->getd_dep()->format('Y-m-d'));
            print_r($location->getd_arr()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'hdep' => $location->getd_dep()->format('Y/m/d'),
                'harr' => $location->getd_arr()->format('Y/m/d'),
                'etl' => $location->getetat_loc(),
                'dul' => $location->getduree_loc()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateLocation($location, $nu)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Locations SET 
                    d_dep = :d_dep,
                    d_arr = :d_arr,
                    etat_loc = :etat_loc,
                    duree_loc = :duree_loc
                WHERE num_loc= :num_loc'
            );
            $query->execute([
                'num_loc' => $nu,
                'd_dep' => $location->getd_dep()->format('Y/m/d'),
                'd_arr' => $location->getd_arr()->format('Y/m/d'),
                'etat_loc' => $location->getetat_loc(),
                'duree_loc' => $location->getduree_loc()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function showLocation($nu)
    {
        $sql = "SELECT * from Locations where num_loc = $nu";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $location = $query->fetch();
            return $location;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    /*function findReservation($Age,$Nom,$types_transport)
    {   
        $sql = "SELECT * from reservation where Age = :Age and Nom = :Nom and types_transport = :types_transport";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(["Age" => $Age,"address" => $address,"types_transport" => $types_transport]);

            $reservation = $query->fetch();
            return $employee;
        } catch (Exception $e) {
            die('Error : ' .$e->getMessage());
        }

    }
    public function SortByNom (){
        $sql = "SELECT * FROM reservation ORDER BY Nom";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
    catch (Exception $e){
        echo($e->getMessage());
    }
}*/
}
?>
