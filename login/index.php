<?php 
session_start();

$pageTitle = 'Login | LOFBC AfterShock';
	include("../assets/inc/config.php");
	include(ROOT_PATH . "assets/inc/header.php");?>
		<div class="row">
		<div class="col-sm-offset-4 col-sm-3 margintop10">
			<?php 
			if(isset($_GET['status'])){
				if($_GET['status'] == "loggedout"){
					echo "<p class='alert alert-success'>You have successfully logged out!</p>";
				}
				if($_GET['status'] == "notauth"){
					echo "<p class='alert alert-danger'>Please log in to view this page.";
				}
				if($_GET['status'] == "pending"){
					echo "<p><h3>Authorization Pending</h3> Please try back later.</p>";
				}
			}

			if(($_SERVER["REQUEST_METHOD"] == "POST")){
				require '../assets/db/db_config.php';
				if(isset($_POST['username'])){
					$username = htmlspecialchars($_POST['username']);
					$password = htmlspecialchars($_POST['password']);
					$hashpass = md5($password);
					$results = $db->query("SELECT * FROM users WHERE username='$username' && password='$hashpass' LIMIT 1");
					if($results->num_rows){
						while($row = $results->fetch_object()){
							$id = $row->id;
							$name = $row->fullname;
							$email = $row->email;
							$role = $row->authlvl;
							$img = $row->img;
							if($role == 0){
								header("Location: ../login/?status=pending");
							}else{
							// setcookie('currentUser', $name, time()+1600, '/');
							// setcookie('authlvl', $role, time()+1600, '/');
							$_SESSION['id'] = $id;	
							$_SESSION['currentUser'] = $name;
							$_SESSION['email'] = $email;
							$_SESSION['authlvl'] = $role;
							$_SESSION['img'] = $img;
							header("Location: ../userarea/"); 			
							}
						}
					}else{
						echo 'not authorized';
					}
				}
			}

			?>

		</div>
		</div>
		<form method="post" class="form-horizontal login">
		  <div class="form-group">
		    <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Username</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-offset-1 col-sm-3 control-label">Password</label>
		    <div class="col-sm-4">
		      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		    </div>
		  </div>
		  <div class="row">
			  <div class="form-group">
			    <div class="col-sm-offset-4 col-sm-2">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox" name="rememberme"> Remember me
			        </label>
			      </div>
			    </div>
	 	        <div class="col-sm-4">
			        <a  href="<?php echo BASE_URL;?>register/">Register.</a>
		     	</div>
			  </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-4">
		      <button type="submit" class="btn btn-primary">Sign in</button>
		    </div>
		  </div>
		</form>
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');
	include(ROOT_PATH . "assets/inc/footer.php");?>