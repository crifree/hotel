<?php
require('C:\wamp64\www\php avancé 2\inc\inc_menu.php');
require('C:\wamp64\www\php avancé 2\class\hotel.php');


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
                  echo "error";
            } else {
                  if($booking_start >= $booking_end) {
                  echo "error date";
                  exit;
                  } else {
                        $db = new PDO('mysql:host=localhost;dbname=php_avance2', 'root', '');
                        $booking = new booking($db);
                        $client = new client($db);
                        $client->insertClient($client_name, $client_email);
                        $result = $booking->insertBooking($booking_start, $booking_end, $client_name, $client_email);
                        echo "dati inseriti con successo <br>";
                  }
            }
      }

