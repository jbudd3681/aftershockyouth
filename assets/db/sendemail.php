<?php 
session_start();

include('db_config.php');
	$results = $db->query('SELECT * FROM parents');
	if ($results->num_rows) {
				$subject = $_POST['subj'];
				$msg = $_POST['msg'];
				$header = 'From: '. $_SESSION['email'];
		while($row = $results->fetch_object()){
	        $id = $row->id;
	        $name = $row->name;
	        $email = $row->email;
				$to = $email;
				$send = mail($to, $subject, $msg, $header);
	        } 
	        if($send === true){
					$response = array(
		                "status" => "Success",
		                "message" => "Email has been sent!"
		            );
		            echo json_encode($response);
				}else{
					$response = array(
		                "status" => "error",
		                "message" => "Error Sending Email"
		            );
		            echo json_encode($response);
				}
	    }else{ 
		echo "<tr><td colspan='2'>No users present</td></tr>";
	}