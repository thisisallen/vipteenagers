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

	
    
    
}

?>
