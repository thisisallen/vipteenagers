<?php

// HTTP Resp Headers
header('content-Type: application/json; charset=utf-8');

// Construct Response Message
$resp =  array(
	"code" => $code, 
	"message" => $message,
);

// Return Response
$JSON = json_encode($resp);
echo $JSON;
    
?>
