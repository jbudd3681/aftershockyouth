<?php
session_start();
include('db_config.php');

// $month = isset($_POST['month']);
// $day = isset($_POST['day']);
// $year = isset($_POST['year']);


$date = $_POST['date'];
$time = $_POST['time'];
$TOD = $_POST['TOD'];
$desc = $_POST['desc'];
$user = $_SESSION['currentUser'];
if($TOD == 'pm'){
	$time = date('H:i', strtotime($time.'+12 hour'));
}

$db_date = $date. ' '.$time;

if($insert = $db->query("
		INSERT INTO events (date, description, added_by, timestamp)
		VALUES ('{$db_date}','{$desc}', '${user}', now()+INTERVAL 3 HOUR)"
	)){
		$response = array(
                "status" => "Success",
                "message" => "New Event Added"
            );
            echo json_encode($response);
	}else{
		$response = array(
                "status" => "error",
                "message" => "Error adding Event"
            );
            echo json_encode($response);
}

?>