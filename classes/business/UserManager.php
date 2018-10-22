<?php
namespace classes\business;

use classes\entity\User;
use classes\data\UserManagerDB;
/**
 ** This is the business tier.
 * This is a set of PHP Classes 
 * consisting of Business logic 
 * that can handle Caching Database data.
 * This Tier Uses Database tier to store and retrieve data.
 * @author User
 */
class UserManager
{
/**
 * Method to cache request
 * to view all users.
 * @return \classes\entity\User[]
 */
    public static function getAllUsers()
    {
        return UserManagerDB::getAllUsers();
    }

/**
 * Method to cache request for
 * to log in.
 * @param string $email
 * @param string $password
 * @return NULL|\classes\entity\User
 */
    public function getUserByEmailPassword($email, $password)
    {
        return UserManagerDB::getUserByEmailPassword($email, $password);
    }

 /**
  * Method to cache request 
  * for user with the given email
  * @param string $email
  * @return NULL|\classes\entity\User
  */   
    public function getUserByEmail($email)
    {
        return UserManagerDB::getUserByEmail($email);
    }

    
    public function getUserById($id)
    {
        return UserManagerDB::getUserById($id);
    }

    public function saveUser(User $user)
    {
        UserManagerDB::saveUser($user);
    }

    public function updatePassword($email, $password)
    {
        UserManagerDB::updatePassword($email, $password);
    }

    public function deleteAccount($id)
    {
        UserManagerDB::deleteAccount($id);
    }

    public function editAccount($id)
    {
        UserManagerDB::editAccount($id);
    }

    // Search Users
    public static function searchByFirstName($firstName)
    {
        return UserManagerDB::searchByFirstName($firstName);
    }

    public static function searchByLastName($lastName)
    {
        return UserManagerDB::searchByLastName($lastName);
    }

    public static function searchByEmail($email)
    {
        return UserManagerDB::searchByEmail($email);
    }
    
    public static function searchByCriteria($firstName, $lastName, $email){
        return UserManagerDB::searchByCriteria($firstName, $lastName, $email);
    }
    
    
    public static function UnSubscribe($id, $subscribe)
    {
        return UserManagerDB::UnSubscribe($id, $subscribe);
    }
    
    
    public function randomPassword($length, $count, $characters)
    {
        // $length - the length of the generated password
        // $count - number of passwords to be generated
        // $characters - types of characters to be used in the password
        
        // define variables used within the function
        $symbols = array();
        $passwords = array();
        $used_symbols = '';
        $pass = '';
        
        // an array of different character types
        $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
        $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols["numbers"] = '1234567890';
        $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
        
        $characters = explode(",", $characters); // get characters types to be used for the passsword
        foreach ($characters as $key => $value) {
            $used_symbols .= $symbols[$value]; // build a string with all characters
        }
        $symbols_length = strlen($used_symbols) - 1; // strlen starts from 0 so to get number of characters deduct 1
        
        for ($p = 0; $p < $count; $p ++) {
            $pass = '';
            for ($i = 0; $i < $length; $i ++) {
                $n = rand(0, $symbols_length); // get a random character from the string with all characters
                $pass .= $used_symbols[$n]; // add the character to the password string
            }
            $passwords[] = $pass;
        }
        return $passwords; // return the generated password
    } // end of generate random password function
}

?>