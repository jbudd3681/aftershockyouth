$postUrl = "https://api.groupme.com/v3/bots/post";
$data = array("bot_id" => "950b70ef0788fc4e06935a79a2", "text" => $text);                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                                                                                                     
$ch = curl_init($postUrl);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$response = curl_exec($ch);
print_r($response);