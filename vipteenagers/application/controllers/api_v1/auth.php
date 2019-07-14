<?php
class auth extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('apimodel');
      $this->load->model('errorhandler');
      $this->load->helper('form','url');
      $this->load->library('form_validation');
    }

    
    public function index()
    {
        $this->load->view('templates/header');
    }

    
    public function login($page = 'login')
    {
        if (!$this->session->UserID)                                                                              //if the user didn't login to the website:
        { 
            $this->load->view('templates/header');                              
            $this->load->view($page);                                                                                 //load login page.
        }
        else                                                                                                      //if the user was logged in to the website:   
        {                  
            redirect('api_v1/auth/dashboard','refresh');                                                              //redirect to different userpage(current: Dashboard).
        }
    }
    

    public function logingo()
    {
        // Registration From Validation
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

        if (!$this->form_validation->run()) { // Validation Failed: 
          $this->errorhandler->errorhandler("40002");
        } else { 
            // Validation Success, then:
            // Get post data
            // TODO: Switch to json data. 
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            // Authentication
            $data = $this->apimodel->login_api($email,$pass);

            // User Exist: 
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
                                  'User_type' => $User_type,
                                  );
                $this->session->set_userdata($sesdata);
                  
                $params = array( 'code' => 200, 'message' => $data);
                $this->load->view('response',$params);

                // redirect('api_v1/auth/dashboard');
            } 
            // User Not Exist:
            else
            {
              $this->errorhandler->errorhandler("40005");
            }
        }
    }


  /**
   * @Return Format: HTML
   */
  public function dashboard($page = 'dashboard'){
    $UserID = $this->session->UserID;
    if(!$UserID) {
      $this->errorhandler->errorhandler("40003");
    }
    $data['query_result'] = $this->apimodel->getOwnProfile($UserID);
    $this->load->view('templates/headerProfile');  
    $this->load->view($page,$data);
  }


  /**
   * @ Return Format: JSON
   * @ Controller Description: Return current user profile.
   */
  public function profile(){
    $UserID = $this->session->UserID;

    // Session Check
    if(!$UserID) {
      $this->errorhandler->errorhandler("40003");
    }

    // Construct Response
    $Q = $this->apimodel->getOwnProfile($UserID);

    // Return Json
    header('content-Type: application/json; charset=utf-8');
    $params = array( 'code' => 200, 'message' => $Q->result_array());
    $this->load->view('response',$params);
  }


  public function logout()
    {
        if($this->session->UserID)                                                                              // if the user was logged in to the website:
            {
              $this->session->sess_destroy();                                                                        // Destroy session.
              $logout = array(
                  'code' => '200',
                  'message' => 'Logout Successful'
            );
            $this->load->view('response',$logout);                                                                  // Pass code: 200 and "Logout Successful" to response.php.
            redirect('api_v1/auth/login');                                                                          // Redirect to login page.
          }
          else{                                                                                                 // if the user didn't login to the website:
            $this->errorhandler->errorhandler("40003");                                                             // pass to errorhandler: 'Permission dennied'.;
          }
          
    }


  public function registration()
    {
        if(!$this->session->UserID)                                                                             // if the user was logged in to the website:
            {
              $this->load->view('templates/header');
              $this->load->view('registration');                                                                    // load registration page.
            }
        else                                                                                                    // if the user didn't login to the website:
            {
              redirect('api_v1/auth/dashboard','refresh');                                                          // redirect to different userpage(current: Dashboard).
            }

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
      }
  }


  public function generateV(){
      $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
      $name=substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),6);
      return $name;
  } 


  public function forgetpass(){
      if(!$this->session->UserID)                                                                               // if the user didn't login to the website:
        {
            $this->load->view('templates/header');
            $this->load->view('forgetpass');                                                                        // load forgetpass page.
        }
      else                                                                                                      // if the user was logged in to the website:
        {
          redirect('api_v1/auth/dashboard','refresh');                                                                // Redirect to dashboard page.
        }
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
            $message = "Please click this link to reset your password: 'http://localhost/vipteenagers/index.php/api_v1/auth/resetpass?vcode={$vcode}&email={$email}'" ;
                                                                                                                   // Use "GET" method to pass email to the resetpass view.
            $from = "VIPTeenagers@gmail.com";                                                                      // Send from ...
            $headers = "From:".$from;                                                                              // Email Header
            mail($to,$subject,$message,$headers);
            $params = array( 'code' => 200, 'message' => $result);
            $this->load->view('response',$params);                                                                 // Pass code: 200 and the array to response.php
           // redirect('api_v1/auth/login');                                                                         // Redirect to login page.
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
      }
  }
}

