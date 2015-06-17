<?php
include('db_config.php');

$img = $_POST['img'];
$name = htmlspecialchars($_POST['name']);
$post = htmlspecialchars($_POST['newpost']);



if($insert = $db->query("
		INSERT INTO userwall (img, name, post, status, timestamp)
		VALUES ('{$img}','{$name}', '{$post}', '1', now()+INTERVAL 3 HOUR)"
	)){
		$response = array(
                "status" => "Success",
                "message" => "New Post Added"
            );
            echo json_encode($response);
	}else{
		$response = array(
                "status" => "error",
                "message" => "Error adding new post"
            );
            echo json_encode($response);
}