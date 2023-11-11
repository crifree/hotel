<?php
require('C:\wamp64\www\php_avance2\inc\inc_menu.php');
require('C:\wamp64\www\php_avance2\class\hotel.php');


echo "pagina di prenotazione";
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>booking page</title>
</head>
<body>
      <form action="" method="POST">
            <div>
                  <label for="name">name:</label>
                  <input type="text" name="client_name">
            </div>
            <div>
                  <label for="email">email:</label>
                  <input type="email" name="client_email">
            </div>
            <div>
                  <label for="name">booking:</label>
                  <input type="date" name="booking_start">
                  <input type="date" name="booking_end">
            </div>
            <div>
                  <input type="submit" name="submitForm">
            </div>
      </form>
</body>
</html>
<?php

      if(isset($_POST['submitForm'])) {
            $client_name = $_POST['client_name'];
            $client_email = $_POST['client_email'];
            $booking_start = $_POST['booking_start'];
            $booking_end = $_POST['booking_end'];
            if(empty($client_name) OR empty($client_email) OR empty($booking_start) OR empty($booking_end)) {
                  echo "Tous les champs doivent être remplis";
            } else {
                  if($booking_start >= $booking_end) {
                  echo "la date de départ doit être au moins un jour après la date d'arrivée";
                  exit();
                  } else {
                        $db = new PDO('mysql:host=localhost;dbname=php_avance2', 'root', '');
                        $booking = new booking($db);
                        $result = $booking->insertBooking($booking_start, $booking_end, $client_name, $client_email);
                        if($result) {
                              $bookingResult = new booking($db);
                              $lastBooking = $bookingResult->getBooking();
                              if($lastBooking) {
                                    echo "réservation réussie <br>";
                                    echo "last book: <br>";
                                    echo $lastBooking[0]['booking_start'] . "<br>";
                                    echo $lastBooking[0]['booking_end'] . "<br>";
                                    echo $lastBooking[0]['client_name'] . "<br>";
                                    echo $lastBooking[0]['client_email'] . "<br>";
                              }
                        }
                  }
            }
      }

