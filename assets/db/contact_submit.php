<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST");
    
    $name = htmlspecialchars($_POST['contact-name']);
    $email = htmlspecialchars($_POST['contact-email']);
    $message= htmlspecialchars($_POST['contact-message']);

    if($name!=""){

        $to = "info@lofbcaftershockyouth.org";
        $from = "Contact Form <no-reply@lofbcaftershockyouth.org>";
        $subject = "NEW CONTACT! AfterShock Youth";
        $message = "Name:". $name."\n"."Email:". $email."\n"."\n". $message."\n"."\n"."\n". '"This is an automated message from LOFBC AfterShock Youth.  Please do not respond to this email."';

        $headers = "From:" . $from;

        if(mail($to,$subject,$message,$headers)){

            $response = array(
                "status" => "Success",
                "message" => "<p> Thank You ". $name. "! Your information was succesfully submitted! </p>"
            );
            echo json_encode($response);

        }else{

            $response = array(
                "status" => "Error",
                "message" => "Whoops!"
            );

            echo json_encode($response);
        }

    }else{

        $response = array(
            "status" => "Error",
            "message" => "Please fill in your name!"
        );
        echo json_encode($response);
    }

?>