<?php
class classmodel extends CI_Model{
    public function __construct()
    {
    	parent::__construct();
    	// Your own constructor code
    	$this->load->database();
    }

	public function inviteTeacher($TeacherID){
        $data = array(
          'TeacherID' => $TeacherID,
        );  
        $this->db->update('Class',$data);
    }

    public function inviteStudent($StudentID){
        $data = array(
          'StudentID' => $StudentID,
        );  
        $this->db->update('Class',$data);
    }

    public function addPackage($PackageID){
        $data = array(
          'PackageID' => $PackageID,
        );  
        $this->db->update('Class',$data);
    }

    public function getClass($ClassID){
        $query = $this->db->query("SELECT * FROM Class WHERE ClassID = '$ClassID' ");
        return $query->row_array();
    }

    public function getLesson($LessonID){
        $query = $this->db->query("SELECT * FROM Lesson WHERE LessonID = '$LessonID' ");
        return $query->row_array();
    }

    public function getLessonConfirm($LessonID){
        $query = $this->db->query("SELECT * FROM LessonConfirm WHERE LessonID = '$LessonID' ");
        return $query->row_array();
    }

    public function myClass($UserType,$UserID){
        if($UserType == "Teacher"){
            $query = $this->db->query("SELECT * FROM Class WHERE TeacherID = '$UserID'");
        }
        elseif ($UserType == "Student") {
            $query = $this->db->query("SELECT * FROM Class WHERE Student1ID = '$UserID' OR Student2ID = '$UserID' OR Student3ID = '$UserID' OR Student4ID = '$UserID'");
        }
        elseif ($UserType == "Advisor"){
            $query = $this->db->query("SELECT * FROM CLASS WHERE AdvisorID = '$UserID'");
        }
        return $query->result_array();
    }

	
    
    
}

?>
