<?php 
require "connectdb.php";
$reservationID = $_GET['ReservationID'];


$stmt = "DELETE FROM Reservations where ReservationID = $reservationID ";

$stmt = "DELETE FROM Reservations where ReservationID = $reservationID";
$stmt2 = $pdo->query($stmt);


    if($stmt2){
      header("Location: manage-reservations.php");  
    };





?>