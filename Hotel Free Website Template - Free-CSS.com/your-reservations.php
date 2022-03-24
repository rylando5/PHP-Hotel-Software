<?php include 'header.php';
require "connectdb.php";

session_start();
print_r($_SESSION);
?>
<div class="container">

<h1 class="title"></h1>

<?php 

$stmt = "SELECT GuestID FROM Guests WHERE UserID = '". $_SESSION['UserID'] . "'";
    $result = $pdo->query($stmt);
    if ($r = $result->fetch(PDO::FETCH_ASSOC)){
    $guestid = $r['GuestID'];
	$_SESSION['GuestID'] = $guestid;
    }

	
$test = $_SESSION['GuestID'];
//print_r($_SESSION);
 $reservationInfo = "SELECT * FROM Reservations where GuestID = $test";
$result = $pdo->query($reservationInfo);
// if ($r = $result->fetch(PDO::FETCH_ASSOC)){
// 	//$userID = $r['GuestID'];
// }


?>

<table class = "table">
	<h4>Your Current Reservation </h4>
	
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
 
 
 ?>

	<!-- form -->
	<div class="contact">
        <div class="row">
		 <div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		
       			<div class="form-group">
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
						
						<td><a href = "customer-cancel.php?ReservationID=<?php echo $r['ReservationID'];?>"> Cancel </a> </td>
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
   </div>
</div>
<!-- form -->


