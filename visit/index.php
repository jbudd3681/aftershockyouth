<?php
session_start(); 
$pageTitle = 'Visit us | LOFBC AfterShock';
include("../assets/inc/config.php");
include(ROOT_PATH . "assets/inc/header.php");

?>
	<div class="row">	
		<div class="col-md-6 margintop10">

			<div class="embed-responsive embed-responsive-4by3">			
				<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3136.3402235995036!2d-85.5097942!3d38.178770500000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8869a3cfe75e650d%3A0x9a4e1d0dc89f0447!2s14200+Spegal+Ln%2C+Louisville%2C+KY+40299!5e0!3m2!1sen!2sus!4v1432521606089" width="600" height="450" frameborder="0" style="border:0"></iframe>
			</div>
		</div><!--end of google maps -->
			<div class="col-md-3 margintop10">
				<address>
					<strong>LOFBC AfterShock Youth</strong><br>
					<em>C/O Life of Faith Bible Church</em><br>
					14200 Spegal Lane<br>
					Louisville, KY 40299<br>
					<span class="glyphicon glyphicon-earphone">&nbsp;</span><abbr title="Phone">P:</abbr>(502)240-0016
				</address>
				<address>
				<span class="glyphicon glyphicon-envelope">&nbsp;</span><a href="mailto:info@lofbcaftershockyouth.org">info@lofbcaftershockyouth.org</a>
				</address>
			</div><!-- end of mailing address -->
			<div class="col-md-3 margintop10">
				<strong>Service Times</strong><br>
				Sunday - 10:45am<br>
				Wednesday - 7:00pm
			</div><!-- End of service times -->
		</div><!-- end of row 2 -->
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');?>
<?php include(ROOT_PATH . "assets/inc/footer.php");?>