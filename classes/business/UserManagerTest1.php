<?php
//use classes\business\UserManager;

//require_once 'classes/business/UserManager.php';

/**
 * UserManager test case.
 */
class UserManagerTest1 extends PHPUnit_Framework_TestCase
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
        
        // TODO Auto-generated UserManagerTest1::setUp()
        
        $this->userManager = new UserManager(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated UserManagerTest1::tearDown()
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
        // TODO Auto-generated UserManagerTest1::testGetAllUsers()
        $this->markTestIncomplete("getAllUsers test not implemented");
        
        UserManager::getAllUsers(/* parameters */);
    }

    /**
     * Tests UserManager->getUserByEmailPassword()
     */
    public function testGetUserByEmailPassword()
    {
        // TODO Auto-generated UserManagerTest1->testGetUserByEmailPassword()
        $this->markTestIncomplete("getUserByEmailPassword test not implemented");
        
        $this->userManager->getUserByEmailPassword(/* parameters */);
    }

    /**
     * Tests UserManager->getUserByEmail()
     */
    public function testGetUserByEmail()
    {
        // TODO Auto-generated UserManagerTest1->testGetUserByEmail()
        $this->markTestIncomplete("getUserByEmail test not implemented");
        
        $this->userManager->getUserByEmail(/* parameters */);
    }

    /**
     * Tests UserManager->getUserById()
     */
    public function testGetUserById()
    {
        // TODO Auto-generated UserManagerTest1->testGetUserById()
        $this->markTestIncomplete("getUserById test not implemented");
        
        $this->userManager->getUserById(/* parameters */);
    }

    /**
     * Tests UserManager->saveUser()
     */
    public function testSaveUser()
    {
        // TODO Auto-generated UserManagerTest1->testSaveUser()
        $this->markTestIncomplete("saveUser test not implemented");
        
        $this->userManager->saveUser(/* parameters */);
    }

    /**
     * Tests UserManager->updatePassword()
     */
    public function testUpdatePassword()
    {
        // TODO Auto-generated UserManagerTest1->testUpdatePassword()
        $this->markTestIncomplete("updatePassword test not implemented");
        
        $this->userManager->updatePassword(/* parameters */);
    }

    /**
     * Tests UserManager->deleteAccount()
     */
    public function testDeleteAccount()
    {
        // TODO Auto-generated UserManagerTest1->testDeleteAccount()
        $this->markTestIncomplete("deleteAccount test not implemented");
        
        $this->userManager->deleteAccount(/* parameters */);
    }

    /**
     * Tests UserManager->editAccount()
     */
    public function testEditAccount()
    {
        // TODO Auto-generated UserManagerTest1->testEditAccount()
        $this->markTestIncomplete("editAccount test not implemented");
        
        $this->userManager->editAccount(/* parameters */);
    }

    /**
     * Tests UserManager::searchByFirstName()
     */
    public function testSearchByFirstName()
    {
        // TODO Auto-generated UserManagerTest1::testSearchByFirstName()
        $this->markTestIncomplete("searchByFirstName test not implemented");
        
        UserManager::searchByFirstName(/* parameters */);
    }

    /**
     * Tests UserManager::searchByLastName()
     */
    public function testSearchByLastName()
    {
        // TODO Auto-generated UserManagerTest1::testSearchByLastName()
        $this->markTestIncomplete("searchByLastName test not implemented");
        
        UserManager::searchByLastName(/* parameters */);
    }

    /**
     * Tests UserManager::searchByEmail()
     */
    public function testSearchByEmail()
    {
        // TODO Auto-generated UserManagerTest1::testSearchByEmail()
        $this->markTestIncomplete("searchByEmail test not implemented");
        
        UserManager::searchByEmail(/* parameters */);
    }

    /**
     * Tests UserManager->randomPassword()
     */
    public function testRandomPassword()
    {
        // TODO Auto-generated UserManagerTest1->testRandomPassword()
        $this->markTestIncomplete("randomPassword test not implemented");
        
        $this->userManager->randomPassword(/* parameters */);
    }
}

