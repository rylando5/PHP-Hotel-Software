<?php
require "connectdb.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">




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
        <li><a href="manage-customers.php">Customers</a></li>        
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
  

    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->

<div id="information" class="spacer reserve-info ">
<div class="container"  >
<div class="row">

<div class="col-sm-12 col-md-12">


<table class = "table">


<table class = "table">
	<h4>Current Reservations </h4>
	
	<tr>
			<th>ReservationID</th>
		<th>GuestID</th>
		<th>RoomID</th>
		<th># Of Guests</th>
		<th>CheckInDate</th>
		<th>CheckOutDate</th>
		<th>ReservationDate</th>
		<th>ReservationStatusID</th>
	
  </tr>


  <?php 
 $reservationInfo = "SELECT * FROM Reservations";
 $result = $pdo->query($reservationInfo);
 
 ?>


 <?php 
					   //var_dump($result);
while($r = $result->fetch(PDO::FETCH_ASSOC)){
					  //var_dump($r);
?>
					<tr>
					  <td> <?php echo $r['ReservationID'];?> </td>
						<td> <?php echo $r['GuestID'];?> </td>
						<td> <?php echo $r['RoomID'];?> </td>
						<td> <?php echo $r['NumberOfGuests'];?> </td>
						<td> <?php echo $r['CheckInDate'];?> </td>
						<td> <?php echo $r['CheckOutDate'];?> </td>
						<td> <?php echo $r['ReservationDate'];?> </td>
						<td> <?php echo $r['ReservationStatusID'];?> </td>
					
            
            <td><a href = "admin-cancel-reservations.php?ReservationID=<?php echo $r['ReservationID'];?>"> Cancel </a> </td>
						<?php }?>
					</tr>
					</table>
					<?php 
					
 					if($result->rowCount()== 0){
						 echo "none";
					 }
																				
					
					?>
						
	

</div>
</div>  
</div>
</div>
<!-- reservation-information -->

<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                 
                </div>              
            <!--/.row--> 
            </div>
        <!--/.container-->    
       </div>
    <!--/.footer-bottom--> 
</footer>

<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>

<script src="assets/jquery.js"></script>

<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>

<!-- uniform -->
<script src="assets/uniform/js/jquery.uniform.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>

<!-- jquery mobile -->
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<script src="assets/script.js"></script>

</body>
</html>