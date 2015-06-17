
<?php 
/*
    $name = isset($_POST['name') ? htmlspecialchars($_POST['name']) : "";
    $num = isset($_POST['num_guest') ? htmlspecialchars($_POST['num_guest']) : "";

*/


header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST");

// $p = json_decode(file_get_contents("php://input"),true);
// $match = '!events';  
// $data = $p['text'];
// $user = $p['user_id'];
// $name = $p['name'];
// $avatar = $p['avatar_url'];

// $demo = array ();

// if($data == $match) {

include('../db/db_config.php');
$bot = '950b70ef0788fc4e06935a79a2';
$text = 'This is a test!';
$postUrl = 'https://api.groupme.com/v3/bots/post';
$data = array("bot_id" => '950b70ef0788fc4e06935a79a2', "text" => 'this is a test!');                                                                    
$data_string = json_encode($data);                                                                                   
 
$ch = curl_init('https://api.groupme.com/v3/bots/post');                                                                      
curl_setopt($ch, CURLOPT_POST, true);                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                                                                 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); 
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>