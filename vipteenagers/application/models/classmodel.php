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

    // 7.13 Alan
    
    public function syllabus_show($teacherID){
        $query = $this->db->query("Select * from syllabus where TeacherID = '$teacherID'");
        $temp = $query->result_array();
        $obj = unserialize($temp[0]['Schedule']);
        return $obj;
    }
    public function check_repeat($teacherID){
        $query = $this->db->query("Select * from syllabus where TeacherID ='$teacherID'");
        if($query->result_array()){
            return "True";
        }
        else{
            return "False";
        }
    }
    
    public function syllabus_initialize($teacherID,$oneW, $oneS, $twoW, $twoS,$threeW, $threeS,$fourW, $fourS){
        $week = [
        "Monday" => [],
        "Tuesday" => [],
        "Wednesday" => [],
        "Thursday"=> [],
        "Friday" => [],
        "Saturday" => [],
        "Sunday" => []
        ];
        array_push($week[$oneW],$oneS);
        array_push($week[$twoW],$twoS);
        array_push($week[$threeW],$threeS);
        array_push($week[$fourW],$fourS);
        $obj = serialize($week);
        $this->db->query("Insert into syllabus Values ('$teacherID','$obj',4,'Applied')");
    }
    
    public function syllabus_gettotal($teacherID){
        $total = $this->db->query("Select Total from syllabus where TeacherID = '$teacherID'");
        $arr = $total->result_array();
        return (int)($arr[0]['Total']);
    }
    
    
    
    public function syllabus_add($teacherID, $oneW, $oneS){
        $query = $this->db->query("Select Schedule from syllabus where TeacherID = '$teacherID'");
        $obj = $query->result_array();
        $arr = unserialize($obj[0]['Schedule']); // this is an array
        foreach ($arr as $key => $value){
            if ($key == $oneW){
                if(in_array($oneS,$value)){
                    return "False";
                }else{
                    array_push($arr[$key], $oneS);
                }
            }
        }
        $obj = serialize($arr);
        $new_total = $this->classmodel->syllabus_gettotal($teacherID) + 1;
        $this->db->query("UPDATE syllabus set Schedule = '$obj', Total = '$new_total' where TeacherID = '$teacherID'");
        return "True";
    }
    
    
    public function syllabus_delete($teacherID, $week,$oneW,$oneS){
        foreach ($week as $key => $value):
        if ($key == $oneW){
            $k = array_search($oneS,$value);
            
            
            echo $k;
            unset($week[$key][$k]);
        }
        endforeach;
        $obj = serialize($week);
        
        $new_total = $this->classmodel->syllabus_gettotal($teacherID) - 1;
        
        $this->db->query("UPDATE syllabus set Schedule = '$obj', Total = '$new_total' where TeacherID = '$teacherID'");
        
    }
    
    
    public function syllabus_update($teacherID,$oneW, $oneS, $new_oneW, $new_oneS){
        $result = $this->classmodel->syllabus_add($teacherID, $new_oneW, $new_oneS);
        if ($result == "False"){
            return "False"; // Can not add the same record
        }else{
            
            $week = $this->classmodel->syllabus_show($this->session->UserID);
            $this->classmodel->syllabus_delete($teacherID, $week, $oneW, $oneS);
            return "True";
        }
        
    }

	
    
    
}

?>
