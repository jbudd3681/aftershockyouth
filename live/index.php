<?php 
session_start();
$pageTitle = 'Live Broadcast | LOFBC AfterShock';
include("../assets/inc/config.php");
include(ROOT_PATH . "assets/inc/header.php");?>
		<div class="col-12">
			<!--4:3 aspect ratio -->
			<div class="embed-responsive embed-responsive-4by3">
				<iframe class="embed-responsive-item" src="http://lifeoffaith.sermon.net/widget/player/6536" style="position:absolute;top:0;left:0;width:100%;height:100%;" allowfullscreen></iframe>
			</div>
		</div><!--end of live service player -->
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>		
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');?>
<?php include(ROOT_PATH . "assets/inc/footer.php");?>