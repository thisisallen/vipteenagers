<?php
class vipclass extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('classmodel');
    $this->load->model('errorhandler');
    $this->load->helper('form','url');
    $this->load->library('form_validation');
    $this->load->helper('date');
  }

  
  

  public function index()
  {
      $this->load->view('welcome_message');
  }


  public function createclass(){
    
    $this->form_validation->set_rules('Student1ID', 'Student1ID', 'required|min_length[3]');
    if ($this->form_validation->run() == FALSE){
      $this->load->view('createclass');
    }else{

      //Check if user logged in
      if($this->session->UserID){
        //Check if user type is advisor
        if($this->session->User_type == 'Advisor'){
          //post data from front end
          $timestamp = date("Y-m-d H:i:s");
         
          $data = array(
            'ClassID' => $this->input->post('ClassID'),
            'ClassName' => $this->input->post('Classname'),
            'ClassLevel' => $this->input->post('Classlevel'),
            'PackageID' => $this->input->post('PackageID'),
            'TeacherID' => $this->input->post('TeacherID'),
            'AdvisorID' => $this->session->UserID,
            'Student1ID' => $this->input->post('Student1ID'),
            'Student2ID' => $this->input->post('Student2ID'),
            'Student3ID' => $this->input->post('Student3ID'),
            'Student4ID' => $this->input->post('Student4ID'),
            'ZoomID' => $this->input->post('ZoomID'),
            'ZoomCode' => $this->input->post('ZoomCode'),
            'Confirm' => FALSE,
            'CreateTime' => $timestamp,
          );  
          //insert data into Class table  
          $this->db->insert('Class',$data);      
          $params = array( 'code' => 200, 'message' => $data);
          $this->load->view('response',$params);
        }else{
          //if user is not advisor, pass to errorhandler: 'Permission dennied'.;
          $this->errorhandler->errorhandler('40003');
        }
      }else{
        //if user didn't log in, pass to errorhandler: 'Permission dennied'.;
        $this->errorhandler->errorhandler('40003');
      }
    }
  }

  public function updateclass(){
    //Check if user logged in
    if($this->session->UserID){
      //Check if user type is advisor
      if($this->session->User_type == 'Advisor'){
        $ClassID = $this->input->post('ClassID');        
        $info = $this->classmodel->getClass($ClassID);
        //check if class has confirmed and class belongs to this advisor
        if($info['Confirm'] == FALSE && $info['AdvisorID']==$this->session->UserID){
          $data = array(
            'AdvisorID' => $this->session->UserID,
            'Student1ID' => $this->input->post('Student1ID'),
            'Student2ID' => $this->input->post('Student2ID'),
            'Student3ID' => $this->input->post('Student3ID'),
            'Student4ID' => $this->input->post('Student4ID'),
            'TeacherID' => $this->input->post('TeacherID'),
            'PackageID' => $this->input->post('PackageID'),
            'Classname' => $this->input->post('Classname'),
            'Classlevel' => $this->input->post('Classlevel'),
            'ZoomID' => $this->input->post('ZoomID'),
            'ZoomCode' => $this->input->post('ZoomCode'),
          ); 

          //get class data
          $this->db->where('ClassID',$ClassID);
          //update class   
          $this->db->update('Class',$data);

          $params = array( 'code' => 200, 'message' => $data);
          $this->load->view('response',$params);
        }else{
          //if class is confirmed or class doesn't belong to this advisor, pass to errorhandler: 'Permission dennied'.;
          $this->errorhandler->errorhandler('40003');
        }
      }else{
        //if user is not advisor, pass to errorhandler: 'Permission dennied'.;
        $this->errorhandler->errorhandler('40003');
      }
    }else{
      //if user didn't log in, pass to errorhandler: 'Permission dennied'.;
      $this->errorhandler->errorhandler('40003');

    }
  }

  public function confirmclass(){
    //check if user logged in
    if($this->session->UserID){
      //check if user type is advisor
      if($this->session->User_type == 'Advisor'){
        $ClassID = $this->input->post('ClassID'); 
        $info = $this->classmodel->getClass($ClassID);
        if ($info['Confirm'] == FALSE && $info['AdvisorID']==$this->session->UserID) {
          $data = array(           
            'Confirm' => TRUE,
          );
          //get class data
          $this->db->where('ClassID',$ClassID);
          //confirm
          $this->db->update('Class',$data);
        }else{
          //需要加一个errorhandler吗？
          echo "This class has already been confirmed";
        }
      }else{
        //if user is not advisor, pass to errorhandler: 'Permission dennied'.;
        $this->errorhandler->errorhandler('40003');
      }
    }else{
      //if user didn't log in, pass to errorhandler: 'Permission dennied'.;
      $this->errorhandler->errorhandler('40003');
    }
  }

  public function startlesson(){
    //check if user logged in
    if($this->session->UserID){
      $LessonID = $this->input->post('LessonID'); 
      //get lesson data
      $info = $this->classmodel->getLesson($LessonID);
      //get class data
      $class = $this->classmodel->getClass($info['ClassID']);
      //check if user type is advisor
      if($this->session->User_type == 'Advisor'){
        if ($info['Start'] == FALSE && $class['AdvisorID'] == $this->session->UserID) {
          $data = array(           
            'Start' => TRUE,
          );
          //get lesson data
          $this->db->where('LessonID',$LessonID);
          //start class
          $this->db->update('Lesson',$data);
        }else{
          echo "This lesson has already started or user id is wrong";
        }
        //or if user type is teacher
      }else if($this->session->User_type == 'Teacher'){
        if ($info['Start'] == FALSE && $class['TeacherID'] == $this->session->UserID) {
          $data = array(           
            'Start' => TRUE,
          );
          //get lesson data
          $this->db->where('LessonID',$LessonID);
          //start class
          $this->db->update('Lesson',$data);
        }else{
          
          echo "This lesson has already started or user id is wrong";
        }
      }else{
        //if user is not Advisor or Teacher
        echo "Only teacher and advisor can start a lesson";
      }
    }else{
      //if user didn't log in, pass to errorhandler: 'Permission dennied'.;
      $this->errorhandler->errorhandler('40003');
    }
  }

  public function confirmlesson(){
    //check if user logged in
    if($this->session->UserID){
      //post LessonID
      $LessonID = $this->input->post('LessonID');
      //get lesson data
      $lesson = $this->classmodel->getLesson($LessonID);
      //get class data
      $class = $this->classmodel->getClass($lesson['ClassID']);
      //get lessonConfirm data
      $lessonConfirm = $this->classmodel->getLessonConfirm($LessonID);
      //if user is student1 and student1 doesn't confirm
      if($this->session->UserID == $class['Student1ID'] && $lessonConfirm['Student1Confirm'] == FALSE){
        $data = array(           
            'Student1Confirm' => TRUE,
          );
        //get lesson data
        $this->db->where('LessonID',$LessonID);
        //student1 confirm class
        $this->db->update('LessonConfirm',$data);

      //if user is student2 and student2 doesn't confirm
      }else if($this->session->UserID == $class['Student2ID'] && $lessonConfirm['Student2Confirm'] == FALSE){
        $data = array(           
            'Student2Confirm' => TRUE,
          );
        //get lesson data
        $this->db->where('LessonID',$LessonID);
        //student2 confirm class
        $this->db->update('LessonConfirm',$data);

        //if user is student3 and student3 doesn't confirm
      }else if($this->session->UserID == $class['Student3ID'] && $lessonConfirm['Student3Confirm'] == FALSE){
        $data = array(           
            'Student3Confirm' => TRUE,
          );
        //get lesson data
        $this->db->where('LessonID',$LessonID);
        //student3 confirm class
        $this->db->update('LessonConfirm',$data);

        //if all students has confirmed and lesson doesn't confirm
      }else if($lessonConfirm['Student1Confirm'] == TRUE && $lessonConfirm['Student2Confirm'] == TRUE && $lessonConfirm['Student3Confirm'] == TRUE && $lesson['Confirm'] == FALSE ){
        $data = array(           
            'Confirm' => TRUE,
          );
        //get lesson data
        $this->db->where('LessonID',$LessonID);
        //confirm lesson
        $this->db->update('Lesson',$data);
      }else{
        echo "You can't confirm or you has already confirmed";
      }

    }else{
      //if user didn't log in, pass to errorhandler: 'Permission dennied'.;
      $this->errorhandler->errorhandler('40003');
    }
  }

  public function myclass(){
    if($this->session->UserID){
      $result = $this->classmodel->myClass($this->session->User_type,$this->session->UserID);
      $params = array( 'code' => 200, 'message' => $result);
      // Pass code: 200 and the array to response.php
      $this->load->view('response',$params);

    }else{
      //if user didn't log in, pass to errorhandler: 'Permission dennied'.;
      $this->errorhandler->errorhandler('40003');
    }
  }


  






}

