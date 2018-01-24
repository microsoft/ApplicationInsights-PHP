<?php
namespace ApplicationInsights\Tests;

/**
 * Contains tests for Current_Session class
 */
class Current_Session_Test extends \PHPUnit_Framework_TestCase
{
    private $sessionId;
    private $sessionCreatedTime;
    private $sessionLastRenewedTime;
    
    protected function setUp()
    {
        $this->sessionId = \ApplicationInsights\Channel\Contracts\Utils::returnGuid();
        $this->sessionCreatedTime = time();
        $this->sessionLastRenewedTime = time() - 10000;
        Utils::setSessionCookie($this->sessionId, $this->sessionCreatedTime, $this->sessionLastRenewedTime);
    }
    
    protected function tearDown()
    {
        Utils::clearSessionCookie();
    }
    
    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructor()
    {
        $currentSession = new \ApplicationInsights\Current_Session();
        
        $this->assertEquals($currentSession->id, $this->sessionId);
        $this->assertEquals($currentSession->sessionCreated, $this->sessionCreatedTime);
        $this->assertEquals($currentSession->sessionLastRenewed, $this->sessionLastRenewedTime);
    }
    
    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructorWithNoCookie()
    {
        Utils::clearSessionCookie();
        $currentSession = new \ApplicationInsights\Current_Session();
        
        $this->assertEquals($currentSession->id, NULL);
        $this->assertEquals($currentSession->sessionCreated, NULL);
        $this->assertEquals($currentSession->sessionLastRenewed, NULL);
    }
}
