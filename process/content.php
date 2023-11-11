<?php
require('C:\wamp64\www\php avancé 2\inc\inc_menu.php');
require('C:\wamp64\www\php avancé 2\class\hotel.php');

echo "<h2>lista hotels</h2>";
$db = new PDO('mysql:host=localhost;dbname=php_avance2', 'root', '');
$hotel = new hotel($db);
$result = $hotel->getHotel();
if($result) {
      foreach ($result as $row) {
            echo "Hotel Name: " . $row['hotel_name'] . "<br>";
            echo "Hotel Address: " . $row['hotel_adress'] . "<br>";
            echo "<br>";
      }
}