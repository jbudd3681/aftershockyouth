<?php

require 'db_config.php';

$id = $_POST['id'];
$action = $_POST['action'];


if($action == 'removeevent'){
		if($update = $db->query("DELETE FROM events WHERE id='$id'")){
			$response = array(
                "status" => "Success",
                "message" => "Event Removed"
            );
            echo json_encode($response);
		}else {
			$response = array(
                "status" => "error",
                "message" => "Error Removing the Event"
            );
            echo json_encode($response);
			echo 'an error has occured!';
		}
	} 