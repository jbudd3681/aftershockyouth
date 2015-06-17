<?php 
session_start();
$pageTitle = $_SESSION['currentUser']. " | Inbox";
if(empty($_SESSION['currentUser']) || $_SESSION['currentUser'] == ''){
	header("Location: ../login/?status=notauth");
}

include('../assets/inc/config.php');
include('../assets/db/db_config.php');
include('../assets/inc/header.php')
?>

<table class='table table-stripped'>
	<tr><th></th>
		<th>From</th>
		<th>Subject</th>
		<th>message</th>
	</tr>
	<?php
	$user = $_SESSION['currentUser'];
	echo $user;
	$results = $db->query("SELECT * FROM pm WHERE userto='$user' AND msg_read <=1");
		if ($results->num_rows) {
		while($row = $results->fetch_object()){
			$from = $row->userfrom;
			$subj = $row->subject;
			$msg = $row->message;
			$read = $row->msg_read;
			?>
			<tr class="<?php if($read == 0){echo 'read';}else{echo 'unread';}?>"><td></td><td><?php echo $from;?></td><td><?php echo $subj;?></td><td><?php echo substr($msg,0,15);?></td></tr>
		<?php }
	}?>	
</table>
<?php include(ROOT_PATH. 'assets/inc/contact.php');?>
<?php include(ROOT_PATH .'assets/inc/global_scripts.php');?>
<?php
include('../assets/inc/footer.php');
?>
