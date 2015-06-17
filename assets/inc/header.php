<?php 
  //error_reporting(0);
 include('config.php');
 include(ROOT_PATH.'assets/db/db_querys.php');
?>

<html>
<head>
	<title><?php echo $pageTitle;?></title>

  <!-- normalize css (standarizes each browser) -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/normalize.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/datepicker.css">

  <!--custom css -->
  <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/main.css">

  <link rel="icon" type="image/png" href="sourceimages/48x48.png" />

  <!-- checks for mobile device -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <div class="container-fluid">
      <div class="navbar navbar-inverse navbar-fixed-top navbar-custom">      
        <div class="container">

        	 <a class="navbar-brand" href="<?php echo BASE_URL;?>"><span class="brand">LOFBC  AfterShock Youth</span></a>


          <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="clearfix visible-xs-block"></div>
          <div class="navbar-collapse collapse navbar-responsive-collapse">
          
            <ul class="nav navbar-nav">
              <li class="<?php if($pageTitle == 'home') echo 'active';?>">
                <a href="<?php echo BASE_URL;?>">Home</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">I'm New<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                  <li class="<?php if($pageTitle == 'visit') echo 'active';?>">
                    <a href="<?php echo BASE_URL;?>visit/">Come Visit Us</a>
                  </li>
                  <li class="<?php if($pageTitle == 'believe') echo 'active';?>">
                    <a href="<?php echo BASE_URL;?>believe/">What we Believe</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown">About us<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                	<li class="<?php if($pageTitle == 'leaders') echo 'active';?>">
                		<a href="<?php echo BASE_URL;?>leaders/">Youth Leaders</a>
                	</li>
                	<li>
            			<a href="#contact" data-toggle="modal" data-original-title="Opens modal">Contact us</a>
            		</li>
                </ul>
              </li>
              <li class="<?php if($pageTitle == 'events') echo 'active';?>">
                <a href="<?php echo BASE_URL.'events/'?>">Events</a>
              </li>
              <li>
              	<a href="#" data-toggle="dropdown">Media<strong class="caret"></strong></a>
              	<ul class="dropdown-menu">
              		<li class="<?php if($pageTitle == 'live') echo 'active';?>">
              		<a href="<?php echo BASE_URL;?>live/">Live Stream</a>
              		</li>
                  <!--
              		<li class="<?php if($pageTitle == 'message') echo 'active';?>">
              		<a href="#">Message</a>
              		</li>
              		<li class="<?php if($pageTitle == 'short') echo 'active';?>">
              		<a href="#">Short Films</a>
              		</li>
                -->
              	</ul>
              </li>              	
            </ul>
            <ul class="nav navbar-nav pull-right">
    <?php if(isset($_SESSION['currentUser'])){ 
                    // $session = $_COOKIE['currentUser'];
                    $session = $_SESSION['currentUser'];
                  // }else{
                  //   // if(isset($_COOKIE['currentUser'])){
                  //   //   $_SESSION['currentUser'] = $_COOKIE['currentUser'];
                  //   //   $session = $_SESSION['currentUser'];
                  ?>
                  <li class="dropdown">
                     <a href='#' data-toggle='dropdown'><span class='badge'><?php echo newmsgcount();?></span> Welcome <?php echo $session;?>,<strong class='caret'></strong></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo BASE_URL;?>userarea/">User's Area</a></li>
                      <li><a href="<?php echo BASE_URL;?>inbox/"><span class='badge'><?php echo newmsgcount();?> </span> Inbox</a>
                      <li><a href="<?php echo BASE_URL;?>logout/">Sign Out</a></li>
                    </ul>
                  </li>
              <?php }else{?>
              <li class="<?php if($pageTitle == 'login') echo 'active';?>">
                <a href="<?php echo BASE_URL;?>login/"><span class="glyphicon glyphicon-user">&nbsp</span>Login/Register</a>              
              </li>
              <?php } ?>
            </ul>
          </div><!--nav collapse -->
        </div><!-- navbar container -->
      </div><!-- end of navbar class -->
      <div class="container centerpage">