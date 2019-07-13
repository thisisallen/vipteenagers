<?php


/*
//$message = ();
foreach ($query_result->result() as $row): 
	$message[] = array( 'UserID' => $row->UserID, 'Email' => $row->Email);
endforeach;
*/



header('content-Type: application/json; charset=utf-8');

$resp =  array(
	"code" => $code, 
	"message" => $message,
) ;
echo json_encode($resp);
  
    
?>
