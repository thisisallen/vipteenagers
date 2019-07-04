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
  //  $this->load->model('in_model');

  }

  public function index()
  {
      $this->load->view('profile');
  }
    
    
    public function getprofile(){
        $username = $this->session->userdata('Email');
        $email = $this->input->post('email');
        $query = $this->apimodel->getProfile($username,$email);
        $this->load->view('response.php');
        if ($query == 'Dennied.'){
            $this->errorhandler->errorhandler('40006');
        }else{
            echo json_encode($query);
        }
    }

  public function update(){
      $this->load->view('update');
  }
    public function updatego(){
        $this->load->database();
        $id = $this->session->userdata('UserID');
        $this->db->where('UserID',$id);
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[3]|valid_email');
        if ($this->form_validation->run() == FALSE)
        {
          $this->load->view('update');
            $this->errorhandle->errorhandle('40002');
        }else{

          $data = array(
          //'UserID' => $this->input->get('userID'),
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

          $this->db->update('User',$data);
            $this->load->view('response');
            $this->errorhandle->errorhandle('200');
        }
  }

  public function getTeacherList($page = 'getTeacherList'){
    $data['query_result'] = $this->apimodel->getTeacherList();
    $this->load->view($page, $data);
  }


}



