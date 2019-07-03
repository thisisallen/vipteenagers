<?php
class auth extends CI_Controller {

	 public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('apimodel');
    $this->load->helper('form','url');
    $this->load->library('form_validation');
 

    }

  
  

  public function index()
  {
      $this->load->view('welcome_message');
  }

  public function testAPI(){

    
     $query = $this->db->query('select * from user');
     echo json_encode($query->result());
  }

  public function login($page = 'login'){

    $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view($page);
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
        //echo $this->session->userdata('Email');
        //echo $this->session->userdata('Phone');
        //echo $this->session->userdata('UserID');
        //echo '<pre>'.json_encode($data).'</pre>';
        //redirect('api_v1/auth/dashboard');
    } else{
      echo "<script>alert('Email or Password is not correct');</script>";
    }

    } 

  }

  public function dashboard($page = 'dashboard'){
    $this->load->view($page);
  }

  public function logout()
    {
        $this->session->sess_destroy();
        echo "<script>alert('Logout Successful');</script>";
       // redirect('users/login');
    }

  public function registration(){
    $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('registration');
    }else{
      $data = array(
        'UserID' => $this->input->post('userID'),
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
        echo "<script>alert('This email has been registrated');</script>";  
      }else{ 
        $this->apimodel->registration_api($data);
        echo "<script>alert('Registration Successful');</script>"; 
      }
    }

    
  }


  public function forgetpass(){
        $email = $this->session->userdata('Email');
        $result = $this->apimodel->forgetpass($email);
        if($result != "No"){
            $to = $email;
            $subject = " VIPTeenagers: Reset your password";
            //$message = "Please reset your password by clicking the link below:"
            $message = "kkkkkk";
            $from = "VIPTeenagers@gmail.com";
            $headers = "From:".$from;
            mail($to,$subject,$message,$headers);
            echo "<script>alert('Mail Sent');</script>";
        }
        else{
            echo "Sorry, we don't have this username.";
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