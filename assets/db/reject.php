<?php
require 'db_config.php';

$id = $_POST['id'];
$action = $_POST['action'];


if($action == 'remove'){
	if($update = $db->query("DELETE FROM users WHERE id='$id'")){
				$response = array(
                "status" => "Success",
                "message" => "User Removed"
            );
            echo json_encode($response);
	}else{ 
		$response = array(
                "status" => "error",
                "message" => "Error Removing the Event"
            );
            echo json_encode($response);
        }
	}
