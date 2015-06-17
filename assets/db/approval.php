<?php

require 'db_config.php';

$action = $_POST['action'];
$currentuser = $_POST['currentuser'];
$id = $_POST['id'];
$role = $_POST['role'];
$username = $_POST['username'];
$email = $_POST['useremail'];

if($action == 'Approve'){
    if($update = $db->query("UPDATE users SET approved_by='$currentuser', authlvl=$role, approved_on=now()+INTERVAL 3 HOUR WHERE id='$id'")){
    	$to = $email;
        $from = "no-reply AfterShock Youth <no-reply@lofbcaftershockyouth.org>";
        $subject = "Approved AfterShock Youth";
        $message = "Welcome ". $username."!\n\n". "You have been approved for access to LOFBC AfterShock Youth Member's Area.  Please Visit http://www.aftershockyouth.lofbc.org/login/ to enter. \n \n --AfterShock Youth Staff \n \n \n This an automated message from LOFBC AfterShock Youth.  Please do not respond to this email.";

        $headers = "From:" . $from;

        mail($to,$subject,$message,$headers);

        $response = array(
                "status" => "Success",
                "message" => "User Approved"
            );
            echo json_encode($response);
    }else{ $response = array(
                "status" => "error",
                "message" => "Error Aprroving User"
            );
            echo json_encode($response);
        }
}else{
	if($action == 'Reject'){
		if($update = $db->query("DELETE FROM users WHERE id='$id'")){
        $to = $email;
        $from = "no-reply AfterShock Youth <no-reply@lofbcaftershockyouth.org>";
        $subject = "Denied AfterShock Youth";
        $message =  $username.",\n\n". "We are sorry, you were denied for access to LOFBC AfterShock Youth Member's Area.  If you feel you were denied in error please reachout to a youth leader and reregister. http://www.aftershockyouth.lofbc.org/register/ \n \n \n This an automated message from LOFBC AfterShock Youth.  Please do not respond to this email.";

        $headers = "From:" . $from;

        mail($to,$subject,$message,$headers);
    	$response = array(
                "status" => "Success",
                "message" => "User has been removed"
            );
            echo json_encode($response);
   		 }else{ $response = array(
                "status" => "error",
                "message" => "Error Rejecting User"
            );
            echo json_encode($response);}
	}
}