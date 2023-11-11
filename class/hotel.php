<?php

class hotel {

      //attributs 
      private $_db;

      //connexion pdo
      public function __construct($db) {
            $this->setDB($db);
      }

      //setter
      public function setDB($dbh) {
            $this->_db = $dbh;
      }

      public function getHotel() {
            $sql = "SELECT * FROM hotel";
            $stmnt = $this->_db->prepare($sql);
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC); 
      }
}

class booking {

      //attributs 
      private $_db;

      //connexion pdo
      public function __construct($db) {
            $this->setDB($db);
      }

      //setter
      public function setDB($dbh) {
            $this->_db = $dbh;
      }

      public function insertBooking($booking_start, $booking_end, $client_name, $client_email) {
            try {

                  $bookingSql = "INSERT INTO booking (booking_start, booking_end, room_id, hotel_id, client_name, client_email, booking_date) 
                        VALUES (:booking_start, :booking_end, :room_id, :hotel_id, :client_name, :client_email, NOW())";
                  $bookingStmt = $this->_db->prepare($bookingSql);
                  $room_id = rand(1, 3);; 
                  $hotel_id = rand(1, 3);;
                  $bookingStmt->bindParam(':booking_start', $booking_start, PDO::PARAM_STR);
                  $bookingStmt->bindParam(':booking_end', $booking_end, PDO::PARAM_STR);
                  $bookingStmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
                  $bookingStmt->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
                  $bookingStmt->bindParam(':client_name', $client_name, PDO::PARAM_STR);
                  $bookingStmt->bindParam(':client_email', $client_email, PDO::PARAM_STR);
                  $bookingStmt->execute();

                  return true;
            } catch (PDOException $e) {
                  echo "Erreur: " . $e->getMessage();
                  return false;
            }     
      }

      public function getBooking() {
            $sql = "SELECT * FROM booking ORDER BY booking_date DESC LIMIT 1";
            $stmnt = $this->_db->prepare($sql);
            $stmnt->execute();
            return $stmnt->fetchAll(PDO::FETCH_ASSOC); 
      }
}

