
<?php
require "connectdb.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Email = $_POST['Email'];
	$UserName = $_POST['UserName'];
	$Password = $_POST['Password'];
	$ConfirmedPassword = $_POST['Confirmed-Password'];

	$newUser = "SELECT * FROM UserAccounts WHERE UserName = '$UserName'";

	$first_statement = $pdo->query($newUser); 

	$info = $first_statement->fetch(PDO::FETCH_ASSOC);
	$preUser = $info['UserName'];
	
	if($Password == $ConfirmedPassword && $newUser != $preUser){
	

		$data = [
			':FirstName' => $FirstName,
			':LastName' => $LastName,
			':UserName' => $UserName,
			':Password' => $Password,
			':Email' => $Email
		];

			$insertUser = "INSERT INTO UserAccounts (FirstName, LastName, UserName, Password, Email) VALUES
			 (:FirstName, :LastName, :UserName, :Password, :Email)";

		$second_statement = $pdo->prepare($insertUser);
		$second_statement->execute($data);
		echo "success!";


		session_start();
		$_SESSION['UserName']==$UserName;
		header("Location: index.php");
	}else{
		echo "username already taken please try again.";
	}

};



?>








<!--- This is the sign up page ---> 
<?php include 'login-signup-header.php';?>
<div class="container">

<h1 class="title">Sign Up</h1>


<!-- form -->
<div class="contact">



       <!-- <div class="row">
       	
       	<div class="col-sm-12">
       	<div class="map">
       	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9933.460884430251!2d-0.13301252240929382!3d51.50651527467666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2snp!4v1414314152341" width="100%" height="300" frameborder="0"></iframe>	
       	</div> -->


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4><strong>Sign Up</strong></h4>
			<form role="form" method = "POST">
			<div class="form-group">	
		

			<div class="form-group">	
			<input type="text" class="form-control" id="name" placeholder="First name" name = "FirstName">
			</div>

			<div class="form-group">	
			<input type="text" class="form-control" id="name" placeholder="Last name" name = "LastName">
			</div>

			<div class="form-group">	
			<input type="text" class="form-control" id="name" placeholder="Email" name = "Email">
			</div>

			<div class="form-group">	
			<input type="text" class="form-control" id="name" placeholder="Username" name = "UserName">
			</div>

			<div class="form-group">
			<input type="password" class="form-control" id="email" placeholder="Password" name = "Password">
			</div>

			<div class="form-group">
			<input type="password" class="form-control" id="email" placeholder="Confirm Password" name = "Confirmed-Password">
			</div>
		
			<div class="form-group">
			
			</div>
					
			<button type="submit" class="btn btn-default">Sign Up!</button>
			</form>
			</div>

			<h4> Already have an Account? <a href = "login.php"> Log In </a> </h4>


       	</div>
	




       </div>
</div>
</div>
<!-- form -->

</div>










