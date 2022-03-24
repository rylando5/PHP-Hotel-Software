
<?php 
//Log In Functionality. 
require "connectdb.php"; 
session_start();


if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $UserName = $_POST['UserName'];
    $password = $_POST['Password'];

    $logInPassword = "SELECT UserID, Password from UserAccounts where UserName = :UserName";

    $statement1 = $pdo->prepare($logInPassword);
    $statement1->execute([
      ':UserName' => $UserName
    ]);
    
    $result = $statement1->fetch(PDO::FETCH_ASSOC);
    // echo "Hello";
    // echo $result['Password'];
    if($password == $result['Password']){
      echo "Success";
        
        $_SESSION['UserName']=$UserName;
        $_SESSION['UserID']=$result['UserID'];
        echo  $_SESSION['UserID'];
        
        if(isset($_SESSION["UserID"])){
          header("location: index.php");
          exit;
      }
    }else{
        echo "FAIL";
    }
    
    }


?>




<?php include 'login-signup-header.php';?>
<div class="container">

<h1 class="title">Log In to Your Account</h1>
 <p> <a href = "admin-login.php">Employee Log In-> </a></p> 
<h4> Don't have an account? <a href = "signup.php"> Sign up now </a> </h4>

<!-- form -->
<div class="contact">



       <!-- <div class="row">
       	
       	<div class="col-sm-12">
       	<div class="map">
       	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9933.460884430251!2d-0.13301252240929382!3d51.50651527467666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2snp!4v1414314152341" width="100%" height="300" frameborder="0"></iframe>	
       	</div> -->

 
		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Log In</h4>
			<form role="form" method = "POST">
			<div class="form-group">	
		

		

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

