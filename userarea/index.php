<?php 
session_start();
 // $_SESSION['currentUser'] = 'admin';
 // $_SESSION['authlvl'] = "4";
if ($_SESSION['currentUser'] == ''){
 	header("Location: ../login/?status=notauth");
 }
if ($_SESSION['authlvl'] == '0'){
	header("Location: ../login/?status=pending");
}
$img = $_SESSION['img'];

$pageTitle = 'User Area';
include("../assets/inc/config.php");
include(ROOT_PATH . "assets/inc/header.php");
include(ROOT_PATH . "assets/db/db_config.php");

?>
</div><!-- closing center container for this page only -->

<div class="row">
	<div class="col-md-2  pull-right adminButtons">
		<ul class="list-unstyled adminButtons">
			<?php if ($_SESSION['authlvl'] >= 2){ ?>
			<li>
				Admin Functions:
			</li>
			<div class="clearfix-xs"></div>
			<li>
				<button class="btn btn-primary admin"  type="button" data-toggle="modal" data-target="#pendingusers">
				  Pending Users <span class="badge" id="refresh">
					  <?php countpending();?>
				</span>
				</button>
			</li> 
			<?php if($_SESSION['authlvl'] >=3){?>
			<li>
				<button class="btn btn-primary admin" type="button" data-toggle="modal" data-target="#newemail">
				Send Email
			</button>
			</li>
			<?php }?>
			<li>
				<button class="btn btn-info admin" type="button" data-toggle="modal" data-target="#newparent">
				Add New Parent
				</button>
			</li>
			<div class="clearfix-xs"></div>
			<li>
				<button class="btn btn-info admin" type="button" data-toggle="modal" data-target="#newevent">
				Add New Event
				</button>
			</li>
			<?php if($_SESSION['authlvl'] >=3){?>
			<li>
				<button class="btn btn-success admin" type="button" data-toggle="modal" data-target="#allevents">
				Edit Events
				</button>
			</li>
			<li>
				<button class="btn btn-success admin" type="button" data-toggle="modal" data-target="#allParents">
				View All Parents
				</button>
			</li>
			<?php }?>
			<li>
				<button class="btn btn-success admin" type="button" data-toggle="modal" data-target="#allusers">
				Edit Users
				</button>
			</li>
			<hr>
	<?php }?>
<!-- Seen by All Users -->
			<!-- <li>
				<button class="btn btn-primary admin" type="button" data-toggle="modal" data-target="#newemail">
				  Send-PM
				</button>
			</li> -->
			<li>
				<button class="btn btn-primary admin" type="button" data-toggle="modal" data-target="#updatephoto">
				  <span class="glyphicon glyphicon-picture">&nbsp;</span>Update Picture
				</button>
			</li>
			<li>
				<button class="btn btn-primary admin" type="button" data-toggle="modal" data-target="#publicEvents">
				  <span class="glyphicon glyphicon-calendar">&nbsp;</span>View All Events
				</button>
			</li>
			
		</ul>
	</div>
	<!-- user area -->
	<div class="container">
		<div class="col-sm-10 pull-left">
			<h3>Welcome! <?php echo $_SESSION['currentUser'];?></h3>
			<div class="row">
				<div class="col-sm-1 pull-left">
					<img src='<?php echo BASE_URL.$img;?>' class='img-responsive profile-img' alt='user-image'>
				</div>
				<div class="col-sm-10 pull-left">
					<form action='../assets/db/newpost.php' method='post' id='newpost' class="form-horizontal">
						<input type='text'class='form-control' placeholder='Enter New Post' name='newpost'>
				</div>
				<div class="col-sm-1 pull-left">
						<input type='hidden' name='name' value='<?php echo $_SESSION["currentUser"];?>'>
						<input type='hidden' name='img' value='<?php echo $img;?>'>
						<input type='submit' name='newpost' value='Send' class='btn btn-info newpostbtn' >
					</form>
				</div>
			</div>
			<div id="user-form" class="col-sm-8 col-sm-offset-1 margintop10"> 
			<IFRAME src="wall.php" title="AfterShock Wall" width="100%" height="100%" frameborder="0" id="myFrame">
					<!-- Alternate content for non-supporting browsers -->
			test!
				<?php 
					$results = $db->query('SELECT * FROM userwall WHERE status = 1 ORDER BY id DESC LIMIT 100');
						if ($results->num_rows) {
							while($row = $results->fetch_object()){
						        $id = $row->id;
						        $img = $row->img;
						        $name = $row->name;
						        $post = $row->post;
						        $timestamp = date_create($row->timestamp);
				?>
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
				</IFRAME>
			</div>
		</div><!--end of user area-->

<!-- Modal Pending Users-->
			<div class="modal fade" id="pendingusers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog pendinguser">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Pending Users</h4>
			      </div>
			      <div class="modal-body">
			      	<table class="table table-stripped">
			      		<tr>
			      			<th>Name</th>
			      			<th>Username</th>
			      			<th>Role</th>
			      			<th></th>
			      			<th></th>
			      		</tr>
			      		<?php pendingusers();?>
			      	</table>
			      </div>
			      <div class="modal-footer">
			      	<a href="#" class="preventDefault" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Leader LVL 1 = Leader does NOT have aftershock email
			      	/ Leader LVL 2 = Leader does have aftershock email">Role Description</a>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>


<!-- Modal Add New Parent -->
			<div class="modal fade" id="newparent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add New Parent</h4>
			      </div>
			      <div class="modal-body">
			      	<form name="newparent" id="addnewparent" action="../assets/db/newparent.php" method="post">
			      		<div class="form-group">
				      		<label for="parentsname">Parents Name:</label>
				      		<input type="text" name="parentsname" placeholder="Parent's Name" class="form-control">
			      		</div>
			      		<div class="form-group">
			      			<label for"parentemail">Parent's Email:</label>
			      			<input type="email" name="parentemail" placeholder="Parent's Email" class="form-control">
			      		</div>
			      		<div class="form-group">
			      			<label for"parentphone">Parent's Phone:</label>
			      			<input type="tel" name="parentphone" placeholder="Parent's Phone" class="form-control">
			      		</div>
			      		<div class="form-group">
			      			<label for"parentyouth">Youth name: (Optional)</label>
			      			<input type="text" name="youth" placeholder="Youth's Name" class="form-control">
			      		</div>
			      		<input type="hidden" name="parent_added_by" value="<?php echo $_SESSION['currentUser'];?>">
			      		<div class="form-group">
			      			<input type="submit" id="addnewparent" Value="Add Parent" class="form-control btn btn-info">
			      		</div>
			      	</form>
			      </div>
			      <div class="modal-footer">
			        
			      </div>
			    </div>
			  </div>
			</div>

<!-- Modal View Parents-->
			<div class="modal fade" id="allParents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog pendinguser">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">View Parent's</h4>
			      </div>
			      <div class="modal-body" style="overflow: scroll; max-height:400px;">
			      	<table class="table table-stripped">
			      		<tr>
			      			<th>Name</th>
			      			<th>Phone</th>
			      			<th>Email</th>
			      			<th>Youth</th>
			      			<th>Last Updated</th>
			      		</tr>
			      		<?php viewallparents();?>
			      	</table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

<!-- Modal Upload Users pic-->
			<div class="modal fade" id="updatephoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Update Picture</h4>
			      </div>
			      <div class="modal-body">
			      	<form name="upl_form" id="upl_form" action="../assets/db/updatepicture.php" method="post" enctype="multipart/form-data">
			      		<input type="file" name="upload" class="form-control"><br>
			      		<input type="hidden" name="user" value="<?php echo $_SESSION['currentUser'];?>">
			      		<input type="submit" class="btn btn-info" value="Upload" name="img-btn">
			      	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

<!-- Modal All Users-->
			<div class="modal fade" id="allusers"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog width90per">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">All Users</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-striped">
			        	<tr>
			        		<th>Name</th>
			        		<th>Username</th>
			        		<th>Email</th>
			        		<th>Role</th>
			        		<th>Remove</th>
			        	</tr>
			        	<?php allusers();?>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

<!-- Modal Addnew Event-->
			<div class="modal fade" id="newevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add New Event</h4>
			      </div>
			      <div class="modal-body">	
			      		<?php addevent(); ?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

<!-- ModalEvent-->
			<div class="modal fade" id="publicEvents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Events</h4>
			      </div>
			      <div class="modal-body">
			      		<table class="table table-striped">
							<tr>
								<th>Date / Time</th>
								<th>Description</th>
							</tr>	
				      		<?php publicevents(); ?>
			      	</table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

<!-- Modal All Events-->
			<div class="modal fade" id="allevents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Events</h4>
			      </div>
			      <div class="modal-body">
			      	<table class="table table-striped">
						<tr>
							<th>Date / Time</th>
							<th>Description</th>
							<th>Added By:</th>
							<th>Remove</th>
						</tr>
						<?php allevents();?>
					</table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

	<!-- SEND EMAIL -->
			<div class="modal fade" id="newemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Send Email</h4>
			      </div>
			      <div class="modal-body">
			      	<form action="<?php echo BASE_URL;?>assets/db/sendemail.php" name="sendemail" id="sendmail" method="post">
			      		<div class="form-group">
				      		<label for="from">From: </label>
				      		<input class="form-control" type="text" disabled="true" id="from" name="from" value="<?php echo $_SESSION['email'];?>">
	 				    </div>
 				      	<div clas="form-group">
 				      		<label for="subject">Subject:</label>
 				      		<input class="form-control" type="text" name="subj" id="subj">
				      	</div>
				      	<div class="form-group">
				      		<label for="msg">Message: </label>
				      		<textarea id="msg" name="msg" class="form-control" rows="15"></textarea>
				      	</div>
				      	<div class="form-group">
				      		<input class="form-control btn btn-info" id="sendmail" type="submit" value="Send Message">
				      	</div>
				    </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal Loading-->
			<div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">	
			      		<img src='<?php echo BASE_URL?>assets/img/misc/loading.gif' class='img-responsive'>
			      </div>
			    </div>
			  </div>
			</div>
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');?>
	<script src="<?php echo BASE_URL;?>assets/js/approve.js"></script>
<?php include(ROOT_PATH . "assets/inc/footer.php");?>