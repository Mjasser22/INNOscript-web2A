<?php
include '../config.php';

class ReservationC
{
    public function listReservations()
    {
        $sql = "SELECT * FROM reservation";
        $db = Config::getConnexion();
        try {
            $stmt = $db->query($sql);
            // Fetch all rows as an associative array
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Error fetching reservations: ' . $e->getMessage());
        }
    }

    function deleteReservation($id)
    {
        $sql = "DELETE FROM reservation WHERE id = :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error deleting reservation: ' . $e->getMessage());
        }
    }

    function addReservation($reservation)
    {
        $sql = "INSERT INTO reservation  
                (destination_id, user_name, phone_number, check_in_date, check_out_date, accomodation_type, total_price)
                VALUES 
                (:destination_id, :user_name, :phone_number, :check_in_date, :check_out_date, :accomodation_type, :total_price)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'destination_id' => $reservation->getDestinationId(),
                'user_name' => $reservation->getUserName(),
                'phone_number' => $reservation->getPhoneNumber(),
                'check_in_date' => $reservation->getCheckInDate(),
                'check_out_date' => $reservation->getCheckOutDate(),
                'accomodation_type' => $reservation->getAccomodationType(),
                'total_price' => $reservation->getTotalPrice(),
            ]);
            // Redirection vers la page listant les réservations après l'ajout réussi
            header("Location: listreservation.php");
            exit();
        } catch (Exception $e) {
            echo 'Error adding reservation: ' . $e->getMessage();
        }
    }

   // In ReservationC.php

   public function updateReservation($reservation, $id)
   {
       try {
           $db = Config::getConnexion();
           $query = $db->prepare(
               'UPDATE reservation SET 
                   user_name = :user_name, 
                   phone_number = :phone_number, 
                   check_in_date = :check_in_date, 
                   check_out_date = :check_out_date, 
                   accomodation_type = :accomodation_type, 
                   total_price = :total_price
               WHERE id = :id'
           );
           $query->execute([
               'id' => $id,
               'user_name' => $reservation->getUserName(),
               'phone_number' => $reservation->getPhoneNumber(),
               'check_in_date' => $reservation->getCheckInDate(),
               'check_out_date' => $reservation->getCheckOutDate(),
               'accomodation_type' => $reservation->getAccomodationType(),
               'total_price' => $reservation->getTotalPrice(),
           ]);
           echo $query->rowCount() . " records UPDATED successfully <br>";
       } catch (PDOException $e) {
           echo 'Error updating reservation: ' . $e->getMessage();
       }
   }

    function showReservation($id)
    {
        $sql = "SELECT * FROM reservation WHERE id = :id";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            $reservation = $query->fetch(PDO::FETCH_ASSOC);
            return $reservation;
        } catch (Exception $e) {
            die('Error fetching reservation: ' . $e->getMessage());
        }
    }
}
?>
