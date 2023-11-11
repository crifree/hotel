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

                  $client = new Client($this->_db);
                  $client_id = $client->getClientId($client_name, $client_email);
                  var_dump($client_id);

                  $bookingSql = "INSERT INTO booking (booking_start, booking_end, room_id, hotel_id, client_id, booking_date) 
                        VALUES (:booking_start, :booking_end, :room_id, :hotel_id, :client_id, NOW())";
                  $bookingStmt = $this->_db->prepare($bookingSql);
                  $room_id = rand(1, 3);; 
                  $hotel_id = rand(1, 3);;
                  $bookingStmt->bindParam(':booking_start', $booking_start, PDO::PARAM_STR);
                  $bookingStmt->bindParam(':booking_end', $booking_end, PDO::PARAM_STR);
                  $bookingStmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
                  $bookingStmt->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
                  $bookingStmt->bindValue(':client_id', $client_id, PDO::PARAM_INT);
                  $bookingStmt->execute();

                  return true;
            } catch (PDOException $e) {
                  echo "Errore nell'inserimento: " . $e->getMessage();
                  return false;
            }     
      }
}


class client {

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

      public function insertClient($client_name, $client_email) {
            $clientSql = "INSERT INTO client ( client_name, client_email) VALUES ( :client_name, :client_email)";
            $clientStmt = $this->_db->prepare($clientSql);
            $clientStmt->bindParam(':client_name', $client_name, PDO::PARAM_STR);
            $clientStmt->bindParam(':client_email', $client_email, PDO::PARAM_STR);
            $clientStmt->execute();
            return $this->_db->lastInsertId();
      }

      public function getClientId($client_name, $client_email) {
            $sql = "SELECT client_id, client_name, client_email FROM client WHERE client_name = :client_name AND client_email = :client_email";
            $stmnt = $this->_db->prepare($sql);
            $stmnt->bindValue(':client_name', $client_name, PDO::PARAM_STR);
            $stmnt->bindValue(':client_email', $client_email, PDO::PARAM_STR);
            $stmnt->execute();
            $client_id = $stmnt->fetchColumn();
            return $client_id;
      }
}