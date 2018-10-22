<?php
namespace classes\business;

use classes\entity\Feedback;
use classes\data\FeedbackManagerDB;

/**
 *
 * @author User
 *        
 */
class FeedbackManager
{

    public static function getAllFeedback()
    {
        return FeedbackManagerDB::getAllFeedback();
    }

    public function getFeedbackByEmail($email)
    {
        return FeedbackManagerDB::getFeedbackByEmail($email);
    }

    public function deleteFeedback($id)
    {
        return FeedbackManagerDB::deleteFeedback($id);
    }

    public function insertFeedback($feedback)
    {
        FeedbackManagerDB::insertFeedback($feedback);
    }

    public function deleteAccount($email)
    {
        FeedbackManagerDB::deleteAccount($email);
    }

    public static function searchByEmail($email)
    { // Add searchByEmail
        return FeedbackManagerDB::searchByEmail($email);
    }

    public static function searchByCriteria($firstName, $lastName, $email)
    {
        return FeedbackManagerDB::searchByCriteria($firstName, $lastName, $email);
    }
}

?>