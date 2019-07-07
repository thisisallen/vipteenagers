<?php
class auth extends CI_Controller {

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
      $this->load->view('welcome_message');
  }

  public function testAPI(){

    
    //$query1 = $this->db->query('select * from user');
    // echo json_encode($query1->result());
      $query = $this->db->query("SELECT MAX(UserID) from User WHERE UserID LIKE '1%' ");
      
       $result = $query->row_array();
      // $UserID = (int)$result['MAX(UserID)'] + 1;
       echo json_encode($result);



  }

  public function login($page = 'login'){
      if (!$this->session->UserID){         //didn't login
          $this->load->view($page);
      }
      else{
          
          //redirect to different userpage.
       //   $this->load->view('dashboard');
          redirect('api_v1/auth/dashboard','refresh');
          //"redirect" => "/dashboard"
      }
  }
    
    public function logingo($page = 'login'){
    
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        if ($this->form_validation->run() == FALSE)
            {
             //   $this->load->view('response');
                $this->errorhandler->errorhandler("40002");
               // $this->load->view($page);
               // echo "Invalid form: Email or password!";
            }else{
              $email = $this->input->post('email');
              $pass = $this->input->post('password');
              $data = $this->apimodel->login_api($email,$pass);
              if($data){
                $UserID = $data['UserID'];
                $Email = $data['Email'];
                $Phone = $data['Phone'];
                $User_type = $data['User_type'];
                $Icon = $data['Icon'];
                $Last_name = $data['Last_name'];
                $First_name = $data['First_name'];
                $Age = $data['Age'];
                $WeChat_ID = $data['WeChat_ID'];
                $Registration_date = $data['Registration_date'];
                $Date_of_Birth = $data['Date_of_Birth'];
                $Gender = $data['Gender'];
        
                $sesdata = array(
                                 'UserID' => $UserID,
                                 'Email' => $Email,
                                 'Phone' => $Phone,
                                 'User_type' => $User_type,
                                 'Icon' => $Icon,
                                 'Last_name' => $Last_name,
                                 'First_name' => $First_name,
                                 'Age' => $Age,
                                 'WeChat_ID' => $WeChat_ID,
                                 'Registration_date' => $Registration_date,
                                 'Date_of_Birth' => $Date_of_Birth,
                                 'Gender' => $Gender,
                                 'logged_in' => TRUE
                                 );
                $this->session->set_userdata($sesdata);
                  
                  
                $params = array( 'code' => 200, 'message' => $sesdata);
                $this->load->view('response',$params);

            } else{
              //echo "<script>alert('Email or Password is not correct');</script>";
                //$this->load->view('response');
                $this->errorhandler->errorhandler("40005");
            }
        
            }
    }
//
//
//

  

  public function dashboard($page = 'dashboard'){
    $this->load->view($page);
  }

  public function logout()
    {
        if($this->session->UserID){
            $this->session->sess_destroy();
            //echo "<script>alert('Logout Successful');</script>";
            $this->load->view('response');
            $this->errorhandler->errorhandler("200");
            // redirect('users/login');
        }else{
            $this->errorhandler->errorhandler("40003");
        }
    }

  public function registration(){
      $this->load->view('registration');
  }
  public function registrationgo(){
    $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('registration');
    }else{
      
      $User_type = $this->input->post('user_type');
      $UserID = $this->apimodel->ai_userid($User_type);
      

      $data = array(
        'UserID' => $UserID,
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
      );
      //echo json_encode($data);

      $Email = $data['Email'];
      $result = $this->apimodel->checkEmail($Email);
      if($result){
       // echo "<script>alert('This email has been registrated');</script>";
        //  $this->load->view('response');
          $this->errorhandler->errorhandler("40001");
      }else{ 
        $this->apimodel->registration_api($data);
        $params = array( 'code' => 200, 'message' => $data);
        $this->load->view('response',$params);
        redirect('api_v1/auth/login','refresh');

       // echo "<script>alert('Registration Successful');</script>";
       //   $this->load->view('response');
          //$this->errorhandler->errorhandler("200");
      }
    }

    
  }


  public function forgetpass(){
        if(!$this->session->UserID){
        $this->load->view('forgetpass');
      }
      else{
        redirect('api_v1/auth/dashboard','refresh');
      }
  }
    public function forgetpassgo(){
        $email = $this->input->post('Email');
        $result = $this->apimodel->forgetpass($email);
        if($result != "No"){
            
            $to = $email;
            $subject = " VIPTeenagers: Reset your password";
            //$message = "Please reset your password by clicking the link below:"
            $message = "kkkkkk";
            $from = "VIPTeenagers@gmail.com";
            $headers = "From:".$from;
            mail($to,$subject,$message,$headers);
            // echo "<script>alert('Mail Sent');</script>";
            //$this->load->view('response');
            $params = array( 'code' => 200, 'message' => $result);
            $this->load->view('response',$params);

            
        }
        else{
            //   echo "Sorry, we don't have this username.";
        //    $this->load->view('response');
            $this->errorhandler->errorhandler("40004");
        }
    }
    
    
    public function resetpass(){
         if (!$this->session->UserID){
            $this->session->UserID = $this->input->get("email");
         }
        
            $this->load->view('resetpass');
        
        
    }
    public function resetpassgo(){
        if ($this->session->UserID){     // from user page
            $pass = $this->input->post('password');
            echo $pass;
            $result = $this->apimodel->resetPass($this->session->UserID, $pass);
            echo $result;
        }else{
            $this->errorhandler->errorhandler("40003");
        }
    }




/*
  public function login(){
    $method = $_SERVER['REQUEST_METHOD'];

    if($method != 'POST'){
      json_output(400,array('status'=>400, 'message' =>'Bad Request'));
    }else{
      $check_auth_client = $this->mymodel->check_auth_client();
      if($check_auth_client == true){
        $params = $_REQUEST;
        $email = $params['email'];
        $password = $params['password'];

        $response = $this->mymodel->login($email,$password);
        echo $response;
        json_output($response['status'],$response);
      }
    }
  }
  */

/*
  public function login(){

    $this->form_validation->set_rules('Email', 'Email', 'required|min_length[3]|valid_email');
    $this->form_validation->set_rules('Password', 'Password', 'required|min_length[3]');

    if ($this->form_validation->run() == FALSE)
    {
        // $this->in_model->viewHome($page);
    }
    else
    {
        $Email    = $this->input->post('Email');
        $Password = $this->input->post('Password');
        $this->db->where('Email',$email);
        $this->db->where('Password',$password);
        $result = $this->db->get('User');
        if($result->num_rows() > 0){
            $data  = $result->row_array();
            $UserID = $data['UserID']
            $Email = $data['Email'];
            $Phone = $data['Phone'];
            $User_type = $data['User_type'];
            $Icon = $data['Icon'];
            $Last_name = $date['Last_name'];
            $First_name = $data['First_name'];
            $Age = $data['Age'];
            $WeChat_ID = $data['WeChat_ID'];
            $Registration_date = $data['Registration_date'];
            $Date_of_Birth = $data['Date_of_Birth'];
            $Gender = $data['Gender'];
     
            $sesdata = array(
                             'UserID' => $UserID,
                             'Email' => $Email,
                             'Phone' => $Phone,
                             'User_type' => $User_type,
                             'Icon' => $Icon,
                             'Last_name' => $Last_name,
                             'First_name' => $First_name,
                             'Age' => $Age,
                             'WeChat_ID' => $WeChat_ID,
                             'Registration_date' => $Registration_date,
                             'Date_of_Birth' => $Date_of_Birth,
                             'Gender' => $Gender,
                             'logged_in' => TRUE
                             );
            $this->session->set_userdata($sesdata);

            echo json_encode(userdata);

    }
  }*/





 

}
