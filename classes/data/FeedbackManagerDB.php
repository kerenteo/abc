<?php
namespace classes\data;

use classes\entity\Feedback;
use classes\util\DBUtil;
/**
 * 
 * @author User
 *
 */
class FeedbackManagerDB
{
    public static function deleteAccount($email){
        $conn=DBUtil::getConnection();
        $sql="DELETE from tb_user WHERE id='$email';";
        $stmt = $conn->prepare($sql);
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert(Record deleted successfully)</script>";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		$conn->close();	
    }	
/**
 * 
 * @return \classes\entity\Feedback
 */
    public static function getAllFeedback(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_feedback";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $feedback=self::fillFeedback($row);
                $feedbacks[]=$feedback;
            }
        }
        $conn->close();
        return $feedbacks;
    }
   /**
    * 
    * @param unknown $email
    * @return NULL|\classes\entity\Feedback
    */ 
    public static function getFeedbackByEmail($email){
        $feedback=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_feedback where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $feedback=self::fillFeedback($row);
            }
        }
        $conn->close();
        return $feedback;
    }
   /**
    * 
    * @return \classes\entity\Feedback[]
    */ 
    public static function searchByEmail(){   //add searchByEmail
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_feedback WHERE email like '%$email%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillFeedback($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
    
    /**
     * 
     * @param unknown $firstName
     * @param unknown $lastName
     * @param unknown $email
     * @return unknown[]
     */
    public static function searchByCriteria($firstName, $lastName, $email){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user ";
        $condition = "";
        
        $condition = self::searchCondition($condition, "firstName" , $firstName, "OR");
        $condition = self::searchCondition($condition, "lastName" , $lastName, "OR");
        $condition = self::searchCondition($condition, "email" , $email, "OR");
        
        
        
        if (!($condition == "")){
            $sql = $sql . " WHERE " . $condition;
        }
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
    
    //public function searchSQL($prevCond, $fieldName, $fieldValue, $operator){
    public function searchSQL( $firstName, $lastName, $email){
        $sql = " SELECT * FROM tb_user";
        $condition = "";
        
        $condition = self::searchCondition($condition, "firstName" , $firstName, "OR");
        var_dump ($condition);
        $condition = self::searchCondition($condition, "lastName" , $lastName, "OR");
        var_dump ($condition);
        $condition = self::searchCondition($condition, "email" , $email, "OR");
        var_dump ($condition);
        
        if (!($condition == "")){
            $sql = $sql . " WHERE " . $condition;
        }
        return $sql;
    }
    
    
    private static function searchCondition($prevCond, $fieldName, $fieldValue, $operator){
        $condition ="";
        IF ($fieldValue ==""){
            $condition = $prevCond;
        } else {
            $condition=$fieldName  . " like '%$fieldValue%'";
            IF ( $prevCond !=="" ) {
                $condition = $prevCond . " " . $operator . " " . $condition;
            }
        }
        

        return $condition;
    }  



    public static function insertFeedback(Feedback $feedback){
        $conn=DBUtil::getConnection();
        $sql="INSERT INTO TB_FEEDBACK (firstname, lastname, email, comments) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $feedback->firstName, $feedback->lastName, $feedback->email,$feedback->comments);
        $stmt->execute();
        if($stmt->errno!=0){
            printf("SQL Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();        
        }
    
    
    public static function deleteFeedback($id){
        $conn=DBUtil::getConnection();
        $sql="DELETE from tb_feedback WHERE id='$id';";
        $stmt = $conn->prepare($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert(Record deleted successfully)</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    
    
    public static function fillFeedback($row){
        $feedback=new Feedback();
        $feedback->id=$row["id"];
        $feedback->firstName=$row["firstname"];
        $feedback->lastName=$row["lastname"];
        $feedback->email=$row["email"];
        $feedback->comments=$row["comments"];
        $feedback->feedback_creation_time=$row["feedback_creation_time"];
        return $feedback;
    }
    
	
    public static function updatePassword($email,$password){
        $conn=DBUtil::getConnection();
        $sql="UPDATE tb_user SET password='$password' WHERE email='$email';";
        $stmt = $conn->prepare($sql);
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
		$conn->close();
        }	


}  		
?>    
 
	
  
    
	

