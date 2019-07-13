<?php
class profile extends CI_Controller {

	 public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('apimodel');
    $this->load->model('errorhandler');
    $this->load->helper('form','url');
    $this->load->library('form_validation');
    $this->load->database();
  

  }

  public function index()
  {
      if ($this->session->UserID){                                                                     //if the user was logged in to the website:
          $this->load->view('profile');                                                                   //load profile page.
      }
      else{                                                                                            //if the user didn't login to the website:
          $this->errorhandler->errorhandler('40003');                                                     // pass to errorhandler: "Permission dennied";
      }
  }
    
    
  public function getprofile(){
      $username = $this->session->userdata('Email');                                                    //get advisor email from session
      $email = $this->input->post('email');                                                             //post user's email
      $query = $this->apimodel->getProfile($username,$email);                                           //get user's profile
      
      
      if ($query == 'Dennied.'){                                                                        //if message "Dennied" returned  
          $this->errorhandler->errorhandler('40006');                                                       // pass to errorhandler: "User type constraint";
      }else{                                                                                            //if message array returned  
          $params = array( 'code' => 200, 'message' => $query);
          $this->load->view('response',$params);                                                            // Pass code: 200 and this array to response.php

      }
  }

  public function update(){
      if($this->session->UserID){                                                                       //if the user was logged in to the website: 
          $UserID = $this->session->UserID;
          $data['query_result'] = $this->apimodel->getOwnProfile($UserID);
          $this->load->view('templates/headerProfile');  
          $this->load->view('update',$data);                                                                      //load update page.
      }else{                                                                                            //if the user didn't login to the website:
          $this->errorhandler->errorhandler('40003');                                                       // pass to errorhandler: "Permission dennied";
      }
  }
  public function updatego(){
     
      $id = $this->session->userdata('UserID');                                                         //get userID from session
      $this->db->where('UserID',$id);                                                                   //select user's data from database
      $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');        // Validation: Regular expression for email.(Can be replaced by JS)
      if ($this->form_validation->run() == FALSE)                                                       // If Validation failed:
      {
        $this->load->view('update');                                                                        // load update page again.
        $this->errorhandle->errorhandler('40002');                                                       // pass to errorhandler: "Invalid form: Email or password!";
      }else{                                                                                            //If Validation passed:

        $data = array(
          'Email' => $this->input->post('email'),
          'Password' => $this->input->post('password'),
          'Phone' => $this->input->post('phone'),
          'User_type' => $this->input->post('user_type'),
          'Icon' => $this->input->post('icon'),
          'Last_name' => $this->input->post('last_name'),
          'First_name' => $this->input->post('first_name'),
          'Age' => $this->input->post('age'),
          'WeChat_ID' => $this->input->post('weChat_ID'),
          'Registration_date' => $this->input->post('registration_date'),
          'Date_of_Birth' => $this->input->post('date_of_Birth'),
          'Gender' => $this->input->post('gender'),
        );                                                                                              // Read inputs from view and append those into an array. 
       

        $this->db->update('User',$data);                                                                //update user's profile
        $params = array( 'code' => 200, 'message' => $data);
        $this->load->view('response',$params);
        redirect('api_v1/auth/dashboard');                                                          // Pass code: 200 and the array to response.php
       
      }
    }

  public function getTeacherList(){
    $data = $this->apimodel->getTeacherList();                                                          //get teachers' email
   
    $params = array( 'code' => 200, 'message' => $data);                                                // Pass code: 200 and the array to response.php
    $this->load->view('response',$params);
  }


}



