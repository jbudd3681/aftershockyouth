<?php 
	if(isset($_POST['rusername']) === true && empty($_POST['rusername']) === false){
		include('db_config.php');
		$user = $_POST['rusername'];
		$results = $db->query("SELECT * FROM users WHERE username='$user'" );
		if($results->num_rows == 0){
			$response = array(
                "status" => "okay",
                "message" => "OKAY!"
            );
            echo json_encode($response);
		}else{
			$response = array(
                "status" => "in use",
                "message" => "User name already in Use"
            );
            echo json_encode($response);
		}
	}

?>