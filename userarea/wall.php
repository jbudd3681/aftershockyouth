<?php
	session_start();
	include('../assets/inc/config.php');
	include('../assets/db/db_config.php');
					$results = $db->query('SELECT * FROM userwall WHERE status = 1 ORDER BY id DESC');
						if ($results->num_rows) {
							while($row = $results->fetch_object()){
						        $id = $row->id;
						        $img = $row->img;
						        $name = $row->name;
						        $post = $row->post;
						        $timestamp = date_create($row->timestamp);
				?>
				<html>
				<head>
					<!-- normalize css (standarizes each browser) -->
					<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/normalize.css">

					<!-- Latest compiled and minified CSS -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

					<!-- Optional theme -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

					<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/datepicker.css">

					<!--custom css -->
					<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/main.css">
					<!-- checks for mobile device -->
					<meta name="viewport" content="width=device-width, initial-scale=1">

				</head>
				<body style="margin: 5px;">
							<div class="media-object">
							  <div class="media-left profile">
							      <img class="img-responsive" style='max-width:45px;' src="<?php echo BASE_URL.$img?>" alt="User-Image">
							  </div>
							  <div class="media-body">
								<form action="../assets/db/removepost.php" method="post" id="deletepost">
							    <h4 class="media-heading"><?php echo $name?> <small>Says:</small></h4>
							    <?php echo $post.'<br><em style="font-size:11px;">'.date_format($timestamp, 'm/d/y h:ia').'<em>'?>
							    <?php
							    if($_SESSION['currentUser'] == $name || $_SESSION['authlvl'] >=3){
							    	$user = $_SESSION['currentUser'];
							    	echo '<input type="hidden" name="postID" value="'.$id.'"><input type="hidden" name="user" value="'.$user.'"><input type="submit" class="link" name="action" value="Remove"></form>';
							    }?>
							    <hr>
							  </div>
							</div>
					  <?php }
					}?>

					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					    <!-- Latest compiled and minified JavaScript -->
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
					<script src="<?php echo BASE_URL;?>assets/js/approve.js"></script>
				</body>
				</html>