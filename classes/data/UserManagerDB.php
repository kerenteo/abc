<?php
namespace classes\data;

use classes\entity\User;
use classes\util\DBUtil;

/**
 *
 * @author User
 *        
 */
class UserManagerDB
{

    /**
     *
     * @param unknown $row
     * @return \classes\entity\User
     */
    public static function fillUser($row)
    {
        $user = new User();
        $user->id = $row["id"];
        $user->firstName = $row["firstname"];
        $user->lastName = $row["lastname"];
        $user->email = $row["email"];
        $user->password = $row["password"];
        $user->role = $row["role"];
        $user->account_creation_time = $row["account_creation_time"];
        return $user;
    }

    /**
     *
     * @param unknown $email
     * @param unknown $password
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmailPassword($email, $password)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $sql = "select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     *
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmail($email)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     *
     * @param unknown $id
     * @return NULL|\classes\entity\User
     */
    public static function getUserById($id)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "select * from tb_user where id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     *
     * @param User $user
     */
    public static function saveUser(User $user)
    {
        $conn = DBUtil::getConnection();
        $sql = "call procSaveUser(?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssss", $user->id, $user->firstName, $user->lastName, $user->email, $user->password, $user->account_creation_time, $user->role);
        $stmt->execute();
        if ($stmt->errno != 0) {
            printf("Error: %s.\n", $stmt->error);
        }
        $stmt->close();
        $conn->close();
    }

    /**
     *
     * @param unknown $email
     * @param unknown $password
     */
    public static function updatePassword($email, $password)
    {
        $conn = DBUtil::getConnection();
        $sql = "UPDATE tb_user SET password='$password' WHERE email='$email';";
        $stmt = $conn->prepare($sql);
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    /**
     *
     * @param unknown $id
     */
    public static function deleteAccount($id)
    {
        $conn = DBUtil::getConnection();
        $sql = "DELETE from tb_user WHERE id='$id';";
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
     * @param unknown $id
     * @param unknown $firstName
     * @param unknown $lastName
     * @param unknown $email
     */
    public static function editAccount($id, $firstName, $lastName, $email)
    {
        $conn = DBUtil::getConnection();
        $sql = "UPDATE from tb_user SET $firstName, $lastName, $email WHERE id='$id';";
        $stmt = $conn->prepare($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert(Record edited successfully)</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    /**
     *
     * @return \classes\entity\User[]
     */
    public static function getAllUsers()
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

    /**
     *
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public static function searchUserEmail($email)
    {
        $user = NULL;
        $conn = DBUtil::getConnection();
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }

    /**
     *
     * @param unknown $email
     * @return \classes\entity\User[]
     */
    public static function searchByEmail($email)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user WHERE email Like '%$email%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

    /**
     *
     * @param unknown $firstName
     * @return \classes\entity\User[]
     */
    public static function searchByFirstName($firstName)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "SELECT * FROM tb_user WHERE firstname LIKE '%$firstName%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

    /**
     *
     * @param unknown $lastName
     * @return \classes\entity\User[]
     */
    public static function searchByLastName($lastName)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "SELECT * FROM tb_user WHERE firstname LIKE '%$lastName%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
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
     * @return \classes\entity\User[]
     */
    public static function searchByCriteria($firstName, $lastName, $email)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user ";
        $condition = "";
        
        $condition = self::searchCondition($condition, "firstName", $firstName, "OR");
        $condition = self::searchCondition($condition, "lastName", $lastName, "OR");
        $condition = self::searchCondition($condition, "email", $email, "OR");
        
        if (! ($condition == "")) {
            $sql = $sql . " WHERE " . $condition;
        }
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

    public static function getAllSubscribe()
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "select * from tb_user WHERE subscribe='1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = self::fillUser($row);
                $users[] = $user;
            }
        }
        $conn->close();
        return $users;
    }

    public static function UnSubscribe($id, $subscribe)
    {
        $users[] = array();
        $conn = DBUtil::getConnection();
        $sql = "update tb_user SET subscribe = NULL WHERE id= '$id' and subscribe= '$subscribe';";
        $result = $conn->query($sql);
        $conn->close();
    }
    
    // public function searchSQL($prevCond, $fieldName, $fieldValue, $operator){
    public function searchSQL($firstName, $lastName, $email)
    {
        $sql = " SELECT * FROM tb_user";
        $condition = "";
        
        $condition = self::searchCondition($condition, "firstName", $firstName, "OR");
        var_dump($condition);
        $condition = self::searchCondition($condition, "lastName", $lastName, "OR");
        var_dump($condition);
        $condition = self::searchCondition($condition, "email", $email, "OR");
        var_dump($condition);
        
        if (! ($condition == "")) {
            $sql = $sql . " WHERE " . $condition;
        }
        return $sql;
    }

    private static function searchCondition($prevCond, $fieldName, $fieldValue, $operator)
    {
        $condition = "";
        IF ($fieldValue == "") {
            $condition = $prevCond;
        } else {
            $condition = $fieldName . " like '%$fieldValue%'";
            IF ($prevCond !== "") {
                $condition = $prevCond . " " . $operator . " " . $condition;
            }
        }
        
        return $condition;
    }
}
?>