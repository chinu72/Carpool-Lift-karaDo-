
<?php
$username = 'sinha.aryan@gmail.com';
$hash = 'e/sNIrHzM5o-yCdGFo8JElaOxqp4lcIZep5GTMgkLS';
	
	// Message details
	//$numbers = array($number);
	$numbers = array($umobile);
	$sender = urlencode('Lift kara do');
    $message =""
	$message = rawurlencode($message);
 
        $numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?> 