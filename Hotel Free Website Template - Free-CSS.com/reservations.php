<?php 
require "connectdb.php"; 
session_start();


 if($_SERVER['REQUEST_METHOD']=="POST"){
   //User //credentials. 
   $first_name = $_POST['firstname'];
   $last_name = $_POST['lastname']; 
   $address = $_POST['address'];
   $city = $_POST['city'];
   $province = $_POST['province'];
   $postal_code = $_POST['postalcode'];
   $country = $_POST['country'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];

    //Accessibility 
    $accessibility = $_POST['accessibility'];
 
    // //RoomTypes 
    $roomType = $_POST['RoomTypeID'];

    //NumberOfRooms & Number Of Adults 
    $NumberOfGuests = $_POST['numberOfguests'];
    $NumberOfRooms = $_POST['numberOfrooms'];


   //Checkin/CheckOut
    $checkInDate = $_POST['checkIndate'];
    $checkOutDate = $_POST['checkOutdate'];
    $reservationDate = date('Y-m-d');
    $checkInSeconds = strtotime($checkInDate);
    $checkOutSeconds = strtotime($checkOutDate);
    $currentTime = time();
    //echo $checkOutDate . "<br>";
    
  
 //SELECT STATEMENTS----------------------

 $roomIDquery = "SELECT RoomID FROM Rooms WHERE RoomTypeID = $roomType and AccessibilityID = $roomType";
 $statement = $pdo->query($roomIDquery);
 $info9 = $statement->fetch(PDO::FETCH_ASSOC);
 $roomID = $info9;
 //echo $roomID;




   //selecting userID for current user. 
   $userIDQuery = "SELECT * from UserAccounts where Email = '$email'";
   $statementUserID = $pdo->query($userIDQuery);
   $info = $statementUserID->fetch(PDO::FETCH_ASSOC);
   $userID = $info['UserID'];
   //echo ($userID);

   //Selecting GuestID for current guest reservation. 
   $guestIDQuery = "SELECT * FROM Guests where UserID = '$userID'";
   $statementGuestID = $pdo->query($guestIDQuery);
   $info2 = $statementGuestID->fetch(PDO::FETCH_ASSOC);
   $guestID = $info2['GuestID'];
   //echo($guestID);


    //selecting from availibilty table
    $availability = "SELECT RoomAvailability FROM RoomAvailability WHERE RoomAvailabilityID = 1";
    $statementAvailability = $pdo->query($availability);
    $info4 = $statementAvailability->fetch(PDO::FETCH_ASSOC);
    $availability = $info4['RoomAvailability'];
    


    $accessCardIDquery = "SELECT AccessCardsID from AccessCards where CardStatus = 0";
    $statementCardID = $pdo->query($accessCardIDquery);
    $info5 = $statementCardID->fetch(PDO::FETCH_ASSOC);
    $accessCardID = $info5['AccessCardsID'];

 

    
        $roomIDquery = "SELECT RoomID FROM Rooms WHERE RoomTypeID = $roomType and AccessibilityID = $accessibility";
        $statement = $pdo->query($roomIDquery);
        $info9 = $statement->fetch(PDO::FETCH_ASSOC);
        $roomID = $info9['RoomID'];
    



   
   if($currentTime <= $checkOutSeconds){
        $reservationStatus = 1;
        } else {
        $reservationStatus = 0;
        }


    try{
        $pdo->BeginTransaction();

        $stmt = $pdo->prepare("SELECT UserID FROM Guests WHERE UserID = '". $_SESSION['UserID'] . "'");
        $stmt->execute();
        if($stmt->rowCount()==0){

        
        //Guest Insert statement
        $sql_1 = "INSERT INTO Guests (UserID, FirstName, LastName, StreetAddress, City, Province, PostalCode, Country, PhoneNumber, Email) VALUES 
        ( '$userID', :firstname, :lastname, :address, :city, :province, :postalcode, :country, :phone, :email)"; 

        $statement_one = $pdo->prepare($sql_1);
        $statement_one->execute([
            ':firstname' => $first_name,
                ':lastname' => $last_name,
                ':address' => $address,
                ':city' => $city,
                ':province' => $province,
                ':country' => $country,
                ':postalcode' => $postal_code,
                ':email' => $email,
                ':phone' => $phone,
        ]);
    }
          
    
           

        if (isset($roomType) && isset($accessibility)){  

            $stmt = "SELECT GuestID FROM Guests WHERE UserID = '". $_SESSION['UserID'] . "'";
             $result = $pdo->query($stmt);
             if ($r = $result->fetch(PDO::FETCH_ASSOC)){
                $guestid = $r['GuestID'];
                $_SESSION['GuestID'] = $guestid;
            }
            $sql_3 = "INSERT INTO Reservations (GuestID, RoomID, NumberOfGuests, CheckInDate, CheckOutDate, ReservationDate, ReservationStatusID, AccessCardsID) VALUES
                (:guestID, :roomID, :numberOfguests, :checkIndate, :checkOutdate, :reservationDate, :reservationStatusID, :accessCardsID)";
              
                // echo $sql_3 . "<br>";
                // var_dump($pdo);

                $statement_two = $pdo->prepare($sql_3);
                $statement_two->execute([
                 ':guestID' => $guestid,  
                ':roomID' => $roomID,
                ':numberOfguests' => $NumberOfGuests,
                ':checkIndate' => $checkInDate,
                ':checkOutdate' => $checkOutDate,
                ':reservationDate' => $reservationDate,
                ':reservationStatusID' => $reservationStatus,
                ':accessCardsID' => $accessCardID
                
            ]);
            //echo "successfully added Reservation";
        }


            $pdo->commit();

        } catch (PDOException $e){
        echo $e->getMessage();
        $pdo->rollback();
        echo "not working";
    };

 

};
?>


<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container" style = "display: flex; justify-content: center;">
<div class="row">


<div class="col-sm-12 col-md-12">
<h3>Reservation</h3>
<p>To make a reservation please <a href = "signup.php">Sign Up or <a href = "login.php"> Login</a></a></p>
    <form role="form" class="wowload fadeInRight" method = "POST">
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="First Name" name = "firstname">
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Last Name" name = "lastname">
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Address" name = "address">
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  placeholder="City" name = "city">
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Province" name = "province">
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Country" name = "country">
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Postal code" name = "postalcode">
        </div>


        <div class="form-group">
            <input type="email" class="form-control"  placeholder="Email" name = "email">
        </div>
        <div class="form-group">
            <input type="Phone" class="form-control"  placeholder="Phone" name = "phone">
        </div>        
        <div class="form-group">
            <div class="row">

            <div class="col-xs-4">
            <p>Number Of Rooms</p>
            <input type = "number" name = "numberOfrooms">
            </div>
           

            <div class="col-xs-4">
            <p>Number Of Guests</p>
            <input type = "number" name = "numberOfguests">
            </div>

            <div class="col-xs-4">
              <!--Type Of rooms-->
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
        <div class="form-group">
            <div class="row">
            <div class="col-xs-4">            
                <p> <strong>Check In date </strong> </p>
                  <input type = "date" name = "checkIndate">         
            </div>          
            <div class="col-xs-4">        
            </div>
          </div>
        </div>
        <div class="form-group">
            
        </div>



               <p> <strong>Check Out Date </strong></p>
                  <input type = "date" name = "checkOutdate">   

     
<button style = "background-color: #0C5D93;" class="btn btn-default">Submit</button>
     
     
 </form>  
      </div>  

</div>
</div>  
</div>
</div>
<!-- reservation-information -->






 <?php 
  include "footer.php"; 
 ?> 