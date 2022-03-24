<?php
require "connectdb.php"; 
if($_SERVER['REQUEST_METHOD']=="POST"){
    
	// $fname = $_POST['fname'];
	// $lname = $_POST['lname'];
    $UserName = $_POST['UserName'];
    $password = $_POST['Password'];

    
    if($password == 'admin' && $UserName = 'root'){
      echo "Success";
        session_start();
        $_SESSION['UserName']=$UserName;
        header("Location: manage-customers.php");

    }else{
        // echo "FAIL";
    }
    
    }


?>







<?php include 'login-signup-header.php';?>
<div class="container">


<h3>Employee Log In</h4>
<a href = "login.php"> Back </a>
<!-- form -->
<div class="contact">


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Log In</h4>
			<form role="form" method = "POST">
			<div class="form-group">	
		
			<!-- <div class="form-group">
			<input type="text" class="form-control" id="password" placeholder="First Name" name = "fname">
			</div>


			<div class="form-group">
			<input type="text" class="form-control" id="password" placeholder="Last Name" name = "lname">
			</div> -->

			<div class="form-group">	
			<input type="text" class="form-control" id="name" placeholder="Username" name = "UserName">
			</div>

			<div class="form-group">
			<input type="password" class="form-control" id="password" placeholder="Password" name = "Password">
			</div>
		
			<div class="form-group">
			
			</div>
					
			<button type="submit" class="btn btn-default">Log In</button>
			</form>
			</div>


       	</div>





       </div>
</div>
</div>
<!-- form -->

</div>
 <?php 
//include 'footer.php';

?> 

