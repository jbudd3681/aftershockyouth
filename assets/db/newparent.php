<?php 
include('db_config.php');

$parentName = $_POST['parentsname'];
$parentEmail = htmlspecialchars($_POST['parentemail']);
$parentPhone = htmlspecialchars($_POST['parentphone']);
$youthName = $_POST['youth'];
$added_by = htmlspecialchars($_POST['parent_added_by']);


if($parentName != ''){
	if($insert = $db->query("
			INSERT INTO parents (name, phone, email, Youth, added_by, timestamp)
			VALUES ('{$parentName}','{$parentPhone}', '{$parentEmail}', '{$youthName}', '{$added_by}', now()+INTERVAL 3 HOUR)"
		)){
			$response = array(
	                "status" => "Success",
	                "message" => "New Parent Added"
	            );
	            echo json_encode($response);
		}else{
			$response = array(
	                "status" => "error",
	                "message" => "Error adding new Parent"
	            );
	            echo json_encode($response);
	}
}