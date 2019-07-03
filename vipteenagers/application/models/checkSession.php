<?php
class checkSession extends CI_Model{
    public function __construct()
    {
    	parent::__construct();
    	// Your own constructor code
    	$this->load->database();
    }

    public function main(){
        if( isset( $this->session->userdata('UserID') ) && ($this->session->userdata('logged_in')) ){
            return true;
        }else{
            return false;
        }
    }

	
}

?>
