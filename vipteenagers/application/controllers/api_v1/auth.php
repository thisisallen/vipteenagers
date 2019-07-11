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

<<<<<<< Updated upstream
      $Email = $data['Email'];
      $result = $this->apimodel->checkEmail($Email);
      if($result){
        echo "<script>alert('This email has been registrated');</script>";  
      }else{ 
        $this->apimodel->registration_api($data);
        echo "<script>alert('Registration Successful');</script>"; 
=======
    }
  public function registrationgo(){
    $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');                  // Validation: Regular expression for email.(Can be replaced by JS)
    if ($this->form_validation->run() == FALSE)                                                                 // If Validation failed:
    {
      $this->load->view('registration');                                                                            // load resistration page again.
    }else                                                                                                       // If Validation passed:
      {
        $User_type = $this->input->post('user_type');                                                               // read user_type from view.
        $UserID = $this->apimodel->ai_userid($User_type);                                                           // According to the user type, assign userid by using "ai_userid"

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
          'Date_of_Birth' => $this->input->post('date_of_Birth'),
          'Gender' => $this->input->post('gender'), 
        );                                                                                                          // Read inputs from view and append those into an array. 
        $Email = $data['Email'];
        $result = $this->apimodel->checkEmail($Email);                                                              // Check if Email has been registrated.
        if($result)                                                                                                 // if true:
        {
            $this->errorhandler->errorhandler("40001");                                                                 // Pass to errorhandler: 'Email has been registered';
        }
        else                                                                                                        // if not:
        { 
          $this->apimodel->registration_api($data);                                                                     // Insert these into the database.
          $params = array( 'code' => 200, 'message' => $data);
          $this->load->view('response',$params);                                                                        // Pass code: 200 and the array to response.php
          redirect('api_v1/auth/login','refresh');                                                                      // Redirect to login page

       
        }
>>>>>>> Stashed changes
      }
    }

    
  }
  public function generateV(){
      $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
      $name=substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),6);
      return $name;
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
<<<<<<< Updated upstream
        
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
=======
  }
  public function forgetpassgo(){
      $email = $this->input->post('Email'); 
      $result = $this->apimodel->forgetpass($email);                                                            // Read email from view, send it to function "forgetpass".
      if($result != "No")                                                                                       // If the email can be found in the database:
          {
            $to = $email;                                                                                           // Send to ...
            $subject = " VIPTeenagers: Reset your password";                                                        // Email subject
            $vcode = $this->generateV();
            $this->apimodel->insertVcode($vcode,$email);
            $message = "Please click this link to reset your password: <a href = 'http://localhost/vipteenagers/index.php/api_v1/auth/resetpass?vcode={$vcode}}&email={$email}'>Password Reset</a>" ;
                                                                                                                   // Use "GET" method to pass email to the resetpass view.
            $from = "VIPTeenagers@gmail.com";                                                                      // Send from ...
            $headers = "From:".$from;                                                                              // Email Header
            mail($to,$subject,$message,$headers);
            $params = array( 'code' => 200, 'message' => $result);
            $this->load->view('response',$params);                                                                 // Pass code: 200 and the array to response.php
            redirect('api_v1/auth/login');                                                                         // Redirect to login page.
          }
      else                                                                                                      // If the email doesn't exist in the databse:
      { 
          $this->errorhandler->errorhandler("40004");                                                              // Pass to errorhandler: 'Can't find it';
      }
  }
  
  
  public function resetpass(){                                                                                  // if the user didn't login to the website: (Comes from forgetpass())
       if (!$this->session->UserID)
          {  
              $useremail = $this->input->get("email");                                                             // Use "GET" to receive UserID, set session->UserID.
              $vcode = $this->input->get("vcode");
              if($this->apimodel->verify_ev($useremail,$vcode) == "False"){
                  $this->errorhandler->errorhandler("40003");
              }else{
                  $result = $this->apimodel->getUserID_E($useremail);
                  $this->session->UserID = $result['UserID'];
                  $this->apimodel->delete_v($vcode);
              }
              
          }
          $this->load->view('resetpass');                                                                       // load resetpass view.
  }
  public function resetpassgo(){
      if ($this->session->UserID)                                                                               // Users can only come from userpage or forgetpass(), in either way UserID should already in the session.
      {    
          echo $this->session->UserID;
          $pass = $this->input->post('password');                                                                  // Read post from view
          $result = $this->apimodel->resetPass($this->session->UserID, $pass);                                     // Send password to function "forgetpass".
          $this->session->sess_destroy();
          redirect('api_v1/auth/login');                                                                         // Redirect to login page, ask users to re-login.
      }else{                                                                                                   // If not:
          $this->errorhandler->errorhandler("40003");                                                              // Pass to errorhandler: 'Permission dennied.'.
>>>>>>> Stashed changes
      }
    }
  }
<<<<<<< Updated upstream
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
=======
}

>>>>>>> Stashed changes
