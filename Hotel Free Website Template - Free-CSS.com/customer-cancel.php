<?php 
require "connectdb.php";
$reservationID = $_GET['ReservationID'];
echo $reservationID;






$stmt = "DELETE FROM Reservations where ReservationID = $reservationID";
$stmt2 = $pdo->query($stmt);


    if($stmt2){
      header("Location: your-reservations.php");  
    };
    
?>