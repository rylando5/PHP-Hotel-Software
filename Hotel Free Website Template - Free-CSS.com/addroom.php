<?php
require "connectdb.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

  $roomTypeID = $_POST['RoomTypeID'];
  $accessabilityID = $_POST['accessibility'];
  $roomRateID = $roomTypeID;
  $roomStatus = 1;
  $roomAvailabilityID = 1;

  $roomIDq = "SELECT RoomID from Rooms";
  $statement = $pdo->query($roomIDq);
  $info = $statement->fetchAll(PDO::FETCH_ASSOC);
  $roomIDend = implode(end($info));
  ++$roomIDend;

  $sql_3 = "INSERT into Rooms(RoomNumber, RoomTypeID, RoomRateID, RoomStatusID, RoomAvailabilityID, AccessibilityID) values (:roomNumber, :RoomTypeID, :roomRate, :roomStatus, :roomAvailability, :accessibility)";
   
  $statement_two = $pdo->prepare($sql_3);
  $statement_two->execute([
    ':roomNumber' => ++$roomIDend,
    ':RoomTypeID' => $roomTypeID,
    ':roomRate' => $roomRateID,
    ':roomStatus' => $roomStatus,
    ':roomAvailability' => $roomAvailabilityID,
    ':accessibility' => $accessabilityID
  ]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Bird Hotel</title>

<nav class="navbar  navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.png"  alt="holiday crown" style = "margin-top: -5rem;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav">        
        <li style = "color: #BEA145; "><a href="index.php"> </a></li>
        <li><a href="manage-reservations.php">Reservations</a></li>        
        <!-- <li><a href="introduction.php">Introduction</a></li> -->
        <!-- <li><a href="gallery.php">Gallery</a></li> -->
        <li><a href="manage-rooms.php">Rooms </a></li>
     
        <li> <a href = "logout.php"> Logout </a></li>
      </ul>
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/wow/animate.css" />


<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">


<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/style.css">

</head>


<body id="home">

<div id="information" class="spacer reserve-info ">
<div class="container" style = "display: flex; justify-content: center;">
<div class="row">


<div class="col-sm-12 col-md-12">
<h3>Add a room </h3>
<h4><a href = "manage-rooms.php"> Back </a> </h4>
    <form role="form" class="wowload fadeInRight" method = "POST">
        <div class="form-group">
          <div class = "row">
          <div class = "col-xs-4">
            <p>Type Of Rooms</p>
            <input value = "1" type = "checkbox" name = "RoomTypeID">
            <label for = "RoomType"> Single $100</label>
            <br>
            <input value = "2" type = "checkbox" name = "RoomTypeID">
            <label for = "RoomType">Double $120</label>
            <br>
            <input value = "3" type = "checkbox" name = "RoomTypeID">
            <label for = "RoomType">Queen $140</label>
            <br>
            <input value = "4" type = "checkbox" name = "RoomTypeID">
            <label for ="RoomType">King $160</label>
            <br>
            <input value = "5" type = "checkbox" name = "RoomTypeID">
            <label for ="RoomType">Master Suite $250</label>
            
</div>
            




            <!--Room Accessibility inputs-->
            <div class="col-xs-8">
              
              <p> <strong>Room Accessibility</strong></p>
              <input name = "accessibility" type = "checkbox" value = "1">
              <label for = "1"> Wheelchair accessibility and pets allowed</label>
              <br>
  
              <input name = "accessibility" type = "checkbox" value = "2">
              <label for = "2">Wheelchair access and no pets</label>
              <br>
              <input name = "accessibility" type = "checkbox" value = "3">
              <label for = "3">Pets and no Wheelchair access</label>
              <br>
              <input name = "accessibility" type = "checkbox" value = "4">
              <label for ="4">No Pets No Wheelchair</label>
              <br>
          
              </div>


            </div>

         
        </div>
        </div>
                
        

     
<button  style = "background-color: #0C5D93;" class="btn btn-default"><a href = "manage-rooms.php"> Add </a></button>
     

 </form>  
      </div>  

</div>
</div>  
</div>
</div>
<!-- reservation-information -->



