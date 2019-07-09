<?php
class apimodel extends CI_Model{
    public function __construct()
    {
    	parent::__construct();
    	// Your own constructor code
    	$this->load->database();
    }

	// code for login api

	public function login_api($Email,$Password){
		$query = $this->db->query("SELECT * FROM User WHERE Email = '$Email' AND Password = '$Password'");
		return $query->row_array();
	}

    public function registration_api($data){

        $this->db->insert('User',$data);      
    }
    

    public function ai_userid($User_type){
        if($User_type == 'Student'){
        $query = $this->db->query("SELECT MAX(UserID) from User WHERE UserID LIKE '1%' ");
        $result = $query->row_array();
        $checkID = $this->db->query("SELECT * from User WHERE UserID LIKE '1%' ");
        if($checkID->num_rows()> 0){
            $UserID = (int)$result['MAX(UserID)'] + 1;
            
        }else{
            $UserID = 1000000;
        }
        
      }else if($User_type == 'Teacher'){
        $query = $this->db->query("SELECT MAX(UserID) from User WHERE UserID LIKE '2%' ");
        $result = $query->row_array();
        $checkID = $this->db->query("SELECT * from User WHERE UserID LIKE '2%' ");
        if($checkID->num_rows()> 0){
            $UserID = (int)$result['MAX(UserID)'] + 1;
            
        }else{
            $UserID = 2000000;
        }
        
      }else if ($User_type == 'Advisor') {
        $query = $this->db->query("SELECT MAX(UserID) from User WHERE UserID LIKE '3%' ");
        $result = $query->row_array();
        $checkID = $this->db->query("SELECT * from User WHERE UserID LIKE '3%' ");
        if($checkID->num_rows()> 0){
            $UserID = (int)$result['MAX(UserID)'] + 1;
            
        }else{
            $UserID = 3000000;
        }
        
      }

      return $UserID;
    }


    public function checkEmail($Email){
        $query = $this->db->query("SELECT * from User WHERE Email = '$Email'");
        return $query->row_array();

    }

    public function update_api($data){
        $this->db->update('User',$data);

    }

    public function forgetpass($username){
        $check_query = $this->db->query("Select * from User where Email = '$username'");
        if($check_query->num_rows() > 0){
            return $check_query->result_array();
        }
        else{
            return "No";
        }
    }
    
    
    public function getProfile($username,$email){
        $check_query = $this->db->query("Select * from User where Email = '$username' And User_type = 'Advisor'");
        if($check_query->num_rows()>0){
            $info_query = $this->db->query("Select * from User where Email = '$email'");
            return $info_query->result_array();
        }
        else{
            return "Dennied.";
        }
    }

    public function getTeacherList(){
        $query = $this->db->query(" Select * from User where User_type = 'Teacher'");
        return $query->result_array();
    }
    
    public function resetPass($username,$password){
        $query = $this->db->query("Update User set Password = '$password' where Email = '$username'");
        return "Update works.";
    }
    
    
}

?>
