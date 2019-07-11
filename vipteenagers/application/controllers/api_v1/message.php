<?php
class message extends CI_Controller {

	 public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('apimodel');
    $this->load->model('errorhandler');
    $this->load->helper('form','url');
    $this->load->library('form_validation');
 

    }

  
  

  public function index()
  {
      if($this->session->UserID){
          $this->load->view('mailbox');
      }
      else{
          $this->errorhandler->errorhandler("40003");
      }
  }
    
    public function sendmail(){
        if($this->session->UserID){
            $this->load->view('message');
        }
        else{
            $this->errorhandler->errorhandler("40003");
        }
    }
    
    public function messagego(){
        $senderID = $this->session->UserID;
        $receiverID = $this->input->post('receiverID');
        $subject = $this->input->post('subject');
        $content = $this->input->post('content');
        
    }


}
