<?php
class errorhandler extends CI_Model{
    public function __construct()
    {
    	parent::__construct();
    	// Your own constructor code
    	$this->load->database();
        
    }

    public function errorhandler($code){
        
        if ($code == '200'){
            //echo "It works, motherfucker!";
            header('content-Type: application/json; charset=utf-8');
            // header("status_code: $code");
            http_response_code(200);
            
            $resp =  array("code" => 20000, "message" => "Login Successful") ;
            echo json_encode($resp);
            die();
        }
        elseif ($code=='40001'){
            header('content-Type: application/json; charset=utf-8');
            // header("status_code: $code");
            http_response_code(400);
            
            $resp =  array("code" => 40001, "message" => "UserID has been registered") ;
            echo json_encode($resp);
            die();
        }
        elseif ($code == '40002'){
            
            header('content-Type: application/json; charset=utf-8');
           // header("status_code: $code");
            http_response_code(400);
            
            $resp =  array("code" => 40002, "message" => "Login Failure") ;
            echo json_encode($resp);
            die();
            
            
        }
        elseif ($code == '40003'){
            header('content-Type: application/json; charset=utf-8');
            // header("status_code: $code");
            http_response_code(403);
            
            $resp =  array("code" => 40003, "message" => "Permission dennied") ;
            echo json_encode($resp);
            die();
        }
        elseif ($code == '40004'){
            header('content-Type: application/json; charset=utf-8');
            // header("status_code: $code");
            http_response_code(404);
            
            $resp =  array("code" => 40004, "message" => "Can't find it") ;
            echo json_encode($resp);
            die();
        }
        elseif ($code == '40005'){
            header('content-Type: application/json; charset=utf-8');
            // header("status_code: $code");
            http_response_code(403);
            
            $resp =  array("code" => 40005, "message" => "Incorrect: username or password") ;
            echo json_encode($resp);
            die();
        }elseif ($code == '40006'){
            header('content-Type: application/json; charset=utf-8');
            // header("status_code: $code");
            http_response_code(401);
            
            $resp =  array("code" => 40005, "message" => "User type constraint") ;
            echo json_encode($resp);
            die();
        }
        
    }
	
}

?>
