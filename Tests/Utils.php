<?php
namespace ApplicationInsights\Tests;

/**
 * Contains utilities for tests
 */
class Utils
{
    /**
     * A single place for managing the instrumentation key used in the tests.
     * @return string (Guid)
     */
    public static function getTestInstrumentationKey()
    {
        return '11111111-1111-1111-1111-111111111111';
    }
    
    /**
     * Controls whether the tests should send data to the server.
     * @return bool
     */
    public static function sendDataToServer()
    {
        return false;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Device
     * @return \ApplicationInsights\Channel\Contracts\Device
     */
    public static function getSampleDeviceContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Device();
        $context->setId('my_device_id');
        $context->setLocale('EN');
        $context->setModel('my_device_model');
        $context->setOemName('my_device_oem_name');
        $context->setOsVersion('Windows 8');
        $context->setType('PC');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Cloud
     * @return \ApplicationInsights\Channel\Contracts\Cloud
     */
    public static function getSampleCloudContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Cloud();
        $context->setRole('my_role_name');
        $context->setRoleInstance('my_role_instance');
        return $context;
    }

    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Application
     * @return \ApplicationInsights\Channel\Contracts\Application
     */
    public static function getSampleApplicationContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Application();
        $context->setVer('1.0.0.0');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\User
     * @return \ApplicationInsights\Channel\Contracts\User
     */
    public static function getSampleUserContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\User();
        $context->setId('my_user_id');
        $context->setAccountId('my_account_id');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Location
     * @return \ApplicationInsights\Channel\Contracts\Location
     */
    public static function getSampleLocationContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Location();
        $context->setIp("127.0.0.0");
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Operation
     * @return \ApplicationInsights\Channel\Contracts\Operation
     */
    public static function getSampleOperationContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Operation();
        $context->setId('my_operation_id');
        $context->setName('my_operation_name');
        $context->setParentId('my_operation_parent_id');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Session
     * @return \ApplicationInsights\Channel\Contracts\Session
     */
    public static function getSampleSessionContext()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Session();
        $context->setId('my_session_id');
        $context->setIsFirst(false);
        return $context;
    }
    
    /**
     * Gets a sample custom property array.
     * @return array
     */
    public static function getSampleCustomProperties()
    {
        return ['MyCustomProperty' => 42, 'MyCustomProperty2' => 'test'];
    }
    
    /**
     * Used for testing exception related code
     */
    public static function throwNestedException($depth = 0)
    {
        if ($depth <= 0)
        {
            throw new \Exception("testException");
        }
        
        Utils::throwNestedException($depth - 1);
    }
    
    /**
     * Used for testing error related code
     */
    public static function throwError()
    {
        eval('sdklafjha asdlkja asdaksd al');
    }

    /**
     * Creates user cookie for testing.
     */
    public static function setUserCookie($userId = NULL)
    {
        $_COOKIE['ai_user'] = $userId == NULL ? \ApplicationInsights\Channel\Contracts\Utils::returnGuid() : $userId;
    }
    
    /**
     * Clears the user cookie.
     */
    public static function clearUserCookie()
    {
        $_COOKIE['ai_user'] = NULL;
    }
    
    /**
     * Creates session cookie for testing.
     */
    public static function setSessionCookie($sessionId = NULL, $sessionCreatedDate = NULL, $lastRenewedDate = NULL)
    {
        $sessionId =  $sessionId == NULL ? \ApplicationInsights\Channel\Contracts\Utils::returnGuid() : $sessionId;
        
        $sessionCreatedDate == NULL ? $sessionCreatedDate = time() : $sessionCreatedDate;
        $lastRenewedDate == NULL ? $lastRenewedDate = time() : $lastRenewedDate;
        
        $_COOKIE['ai_session'] = $sessionId.'|'.\ApplicationInsights\Channel\Contracts\Utils::returnISOStringForTime($sessionCreatedDate).'|'.\ApplicationInsights\Channel\Contracts\Utils::returnISOStringForTime($lastRenewedDate);
    }
    
    /**
     * Clears the user cookie.
     */
    public static function clearSessionCookie()
    {
        $_COOKIE['ai_session'] = NULL;
    }
}
