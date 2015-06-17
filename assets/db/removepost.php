<?php 
include('db_config.php');

$id = htmlspecialchars($_POST['postID']);
$user = htmlspecialchars($_POST['user']);


if(isset($id)){
    if($update = $db->query("UPDATE userwall SET status='0', removed_by='$user' WHERE id='$id'")){
    	$response = array(
                "status" => "Success",
                "message" => "Post Removed"
            );
            echo json_encode($response);
    }else{ $response = array(
                "status" => "error",
                "message" => "Error Removing Post"
            );
            echo json_encode($response);
        }
    }

?>