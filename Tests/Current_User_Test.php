<?php
namespace ApplicationInsights\Tests;

/**
 * Contains tests for Current_User class
 */
class Current_User_Test extends \PHPUnit_Framework_TestCase
{
    private $userId;
    
    protected function setUp()
    {
        $this->userId = \ApplicationInsights\Channel\Contracts\Utils::returnGuid();
        Utils::setUserCookie($this->userId);
    }
    
    protected function tearDown()
    {
        Utils::clearUserCookie();
    }
    
    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructor()
    {
        $currentUser = new \ApplicationInsights\Current_User();
        
        $this->assertEquals($currentUser->id, $this->userId);
    }
    
    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructorWithNoCookie()
    {
        Utils::clearUserCookie();
        $currentUser = new \ApplicationInsights\Current_User();
        
        $this->assertTrue($currentUser->id != NULL && $currentUser->id != $this->userId);
    }
    
}
