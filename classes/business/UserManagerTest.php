<?php
require_once '/public/includes/autoload.php';
use classes\business\UserManager; //add
use classes\data\UserManagerDB;
use classes\entity\User;
use classes\util\DBUtil;


//require_once 'classes/business/UserManager.php';

/**
 * UserManager test case.
 */
class UserManagerTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var UserManager
     */
    private $userManager;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated UserManagerTest::setUp()
        
        $this->userManager = new UserManager(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated UserManagerTest::tearDown()
        $this->userManager = null;           
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests UserManager::getAllUsers()
     */
    public function testGetAllUsers()
    {
        // TODO Auto-generated UserManagerTest::testGetAllUsers()
        $this->markTestIncomplete("getAllUsers test not implemented");
        
        UserManager::getAllUsers(/* parameters */);
    }

    /**
     * Tests UserManager->getUserByEmailPassword()
     */
    public function testGetUserByValidEmailPassword()  //ass valid
    {
        // TODO Auto-generated UserManagerTest->testGetUserByEmailPassword()
        $this->markTestIncomplete("getUserByEmailPassword test not implemented");
        
        $user = $this->userManager->getUserByEmailPassword("fin@gmail.com", "Password01"); //(/* parameters */)
        $this ->assertInstanceof("classes\entity\user");
        
    }

    /**
     * Tests UserManager->getUserByEmail()
     */
    public function testGetUserByEmail()
    {
        // TODO Auto-generated UserManagerTest->testGetUserByEmail()
        $this->markTestIncomplete("getUserByEmail test not implemented");
        
        $this->userManager->getUserByEmail(/* parameters */);
    }

    /**
     * Tests UserManager->getUserById()
     */
    public function testGetUserById()
    {
        // TODO Auto-generated UserManagerTest->testGetUserById()
        $this->markTestIncomplete("getUserById test not implemented");
        
        $this->userManager->getUserById(/* parameters */);
    }

    /**
     * Tests UserManager->saveUser()
     */
    public function testSaveUser()
    {
        // TODO Auto-generated UserManagerTest->testSaveUser()
        $this->markTestIncomplete("saveUser test not implemented");
        
        $this->userManager->saveUser(/* parameters */);
    }

    /**
     * Tests UserManager->updatePassword()
     */
    public function testUpdatePassword()
    {
        // TODO Auto-generated UserManagerTest->testUpdatePassword()
        $this->markTestIncomplete("updatePassword test not implemented");
        
        $this->userManager->updatePassword(/* parameters */);
    }

    /**
     * Tests UserManager->deleteAccount()
     */
    public function testDeleteAccount()
    {
        // TODO Auto-generated UserManagerTest->testDeleteAccount()
        $this->markTestIncomplete("deleteAccount test not implemented");
        
        $this->userManager->deleteAccount(/* parameters */);
    }

    /**
     * Tests UserManager->editAccount()
     */
    public function testEditAccount()
    {
        // TODO Auto-generated UserManagerTest->testEditAccount()
        $this->markTestIncomplete("editAccount test not implemented");
        
        $this->userManager->editAccount(/* parameters */);
    }

    /**
     * Tests UserManager::searchByFirstName()
     */
    public function testSearchByFirstName()
    {
        // TODO Auto-generated UserManagerTest::testSearchByFirstName()
        $this->markTestIncomplete("searchByFirstName test not implemented");
        
        UserManager::searchByFirstName(/* parameters */);
    }

    /**
     * Tests UserManager::searchByLastName()
     */
    public function testSearchByLastName()
    {
        // TODO Auto-generated UserManagerTest::testSearchByLastName()
        $this->markTestIncomplete("searchByLastName test not implemented");
        
        UserManager::searchByLastName(/* parameters */);
    }

    /**
     * Tests UserManager::searchByEmail()
     */
    public function testSearchByEmail()
    {
        // TODO Auto-generated UserManagerTest::testSearchByEmail()
        $this->markTestIncomplete("searchByEmail test not implemented");
        
        UserManager::searchByEmail(/* parameters */);
    }

    /**
     * Tests UserManager->randomPassword()
     */
    public function testRandomPassword()
    {
        // TODO Auto-generated UserManagerTest->testRandomPassword()
        $this->markTestIncomplete("randomPassword test not implemented");
        
        $this->userManager->randomPassword(/* parameters */);
    }
}

