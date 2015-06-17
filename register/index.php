<?php 
	session_start();
	$pageTitle = 'Registration | LOFBC AfterShock';
	include("../assets/inc/config.php");
	include(ROOT_PATH . "assets/inc/header.php");
	require ROOT_PATH . "assets/db/db_config.php"; //database

	if(isset($_POST['rusername'])) {

		$user = htmlspecialchars($_POST['rusername']);
		$password = htmlspecialchars($_POST['password']);
		$confrimpass = htmlspecialchars($_POST['confirmpass']);
		$email = htmlspecialchars($_POST['email']);
		$fullname = htmlspecialchars($_POST['fullname']);
		$authlvl = 0;
		$hashpass = md5($password);
		$img = 'profilePictures/notava.jpg';

		if($insert = $db->query("
		INSERT INTO users (fullname, username, password, email, img, created, authlvl)
		VALUES ('{$fullname}', '{$user}', '{$hashpass}', '{$email}', '{$img}', now(), 0)"
	)){	
					$to = 'info@lofbcaftershockyouth.org';
			        $from = "User Request AfterShock Youth <no-reply@lofbcaftershockyouth.org>";
			        $subject = "User Request AfterShock Youth";
			        $message = "<h3>New User Request Received</h3> <p>".$fullname.", has requested access to AfterShock Youth's Members area.<br>Please <a href='http://www.aftershockyouth.lofbc.org/login/'>Login</a> to view the request.</p>\n \n --AfterShock Youth \n \n \n This an automated message from LOFBC AfterShock Youth.  Please do not respond to this email.";

			        $headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			        $headers .= "From:" . $from;

			        mail($to,$subject,$message,$headers);
		header("Location: ../register/?status=sucess");
	}else{
		echo "OOPS!";
	}
}

	if(isset($_GET['status']) == "success"){
		echo "<p class='alert alert-success center-block'>Success! Status-Approval Pending.... You will receive an email once you are approved</p>";
	}
?>


		<form method="post" class="form-horizontal register margintop10">
		  <div class="form-group" id="user">
		    <label for="rusername" class="col-sm-offset-1 col-sm-3 control-label">Username:</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="rusername" name="rusername" placeholder="Username">    
		    </div>
		    <span class="margintop10" id="check"></span> 
		  </div>

		  <div class="form-group">
		    <label for="password" class="col-sm-offset-1 col-sm-3 control-label">Password:</label>
		    <div class="col-sm-4">
		      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="confirmpass" class="col-sm-offset-1 col-sm-3 control-label">Confirm Password:</label>
		    <div class="col-sm-4">
		      <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Confirm Password">
		    </div>
		    <span id='passchk'></span>
		  </div>

		  <div class="form-group">
		    <label for="email" class="col-sm-offset-1 col-sm-3 control-label">Email:</label>
		    <div class="col-sm-4">
		      <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter your Email:">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="fullname" class="col-sm-offset-1 col-sm-3 control-label">Full Name:</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control"  id="fullname" name="fullname" placeholder="Full Name">     
		    </div>
		  </div>
		 <!-- <div class="form-group">
		    <label for="profile_pic" class="col-sm-offset-1 col-sm-3 control-label">Profile Picture:</label>
		    <div class="col-sm-4">
		      <input type="file" class="form-control" id="profile_pic" name="profile_pic" placeholder="Upload a profile Picture">
		    </div>
		  </div> for future use -->
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-4">
		      <button type="submit" id="register" class="btn btn-primary">Register</button>
		    </div>
		  </div>
		</form>
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');?>
<?php include(ROOT_PATH . "assets/inc/footer.php");?>