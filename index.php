<?php 
session_start();
include("assets/inc/config.php");
$pageTitle = 'Home | LOFBC AfterShock';
 include("assets/inc/header.php");
 include("assets/inc/carousel.php");
 //include("assets/inc/db_config.php");
 // require("assets/inc/test.php");
 ?>

	<div class="col-12">
		<h3>Welcome to LOFBC AfterShock Youth Group!</h3>
		<p>We are not just a church youth group but a tight knit family who welcomes new people with open arms.
		Our goal is to help and equip teens to live a life according to what the Bible teaches and nothing less.</p>
 
		<p class="verse">"Let no one despise your youth, but be an example to the believers in word, in conduct, in love, in spirit, in faith, in purity" 1 Timothy 4:12</p>

		<p class="verse">"Be not conformed of this world but be transformed by the renewing of your mind that you may prove what is that good and acceptable and perfect will of God." Rom 12:2</p>


	</div><!-- end of introduction -->


	<div class="row"><!-- start of activity row -->
		<div class="col-md-6">
			<h2>Upcoming Events</h2>
			<table class="table table-striped">
				<tr>
					<th>Date / Time</th>
					<th>Description</th>
				</tr>
				<?php eventsx3();?>
			</table>
		</div><!-- end of events -->

		<div class="col-offset-md-2 col-md-4 pull-right">
			<h2>Verse of the Day</h2>
	    	<script type="text/javascript" language="JavaScript" src="https://www.biblegateway.com/votd/votd.write.callback.js"> 
			</script>
			<script type="text/javascript" language="JavaScript" src="https://www.biblegateway.com/votd/get?format=json&version=NKJV&callback=BG.votdWriteCallback"> 
			</script>
		</div><!-- end of verse of day -->
	</div><!-- end of activity row -->
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');?>
<?php include("assets/inc/footer.php"); ?>