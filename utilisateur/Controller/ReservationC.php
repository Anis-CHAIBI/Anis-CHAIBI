<?php
include '../config.php';
include '../Model/Reservation.php';

class ReservationC
{
    public function listReservations()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReservation($id)
    {
        $sql = "DELETE FROM reservation WHERE IdReser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReservation($reservation)
    {
        $sql = "INSERT INTO reservation  
        VALUES (NULL, :drn, :tst)";
        $db = config::getConnexion();
        try {
            print_r($reservation->getdateReser()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'drn' => $reservation->getdateReser()->format('Y/m/d'),
                'tst' => $reservation->gettypes_transport()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReservation($reservation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                    dateReser = :dateReser,
                    types_transport = :types_transport
                WHERE IdReser= :IdReser'
            );
            $query->execute([
                'IdReser' => $id,
                'dateReser' => $reservation->getdateReser()->format('Y/m/d'),
                'types_transport' => $reservation->gettypes_transport()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showReservation($id)
    {
        $sql = "SELECT * from reservation where IdReser = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function SearchReservation($id)
    {   
        $sql = "SELECT * from reservation where  IdReser = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error : ' .$e->getMessage());
        }

    }

    function SortReservation($id)
    {   
        $sql = "SELECT IdReser, dateReser, types_transport
        FROM reservation where  IdReser = $id
        ORDER BY IdReser DESC ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error : ' .$e->getMessage());
        }

    }
   /* public function SortByNom (){
        $sql = "SELECT * FROM reservation ORDER BY Nom";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
    catch (Exception $e){
        echo($e->getMessage());
    }*/
    // public function SearchReservation ($inputsearch){
    //     $sql = "SELECT * FROM reservation WHERE Age LIKE '%$inputsearch%' ";
    //     $db  = config ::getConnexion();
    //     try {
    //      $list = $db->query($sql);
    //      return $list;
    //     }
    
    // catch (Exception $e){
    //     echo('Error:'.$e->getMessage());
    // }
    // }
}
?>
