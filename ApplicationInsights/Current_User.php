<?php
namespace ApplicationInsights;

/**
 * Main object used for managing users for other telemetry items. 
 */
class Current_User
{
    /**
     * The current user id.
     */ 
    public $id;
    
    /**
     * Initializes a new Current_User.
     */
    function __construct()
    {
        if (array_key_exists('ai_user', $_COOKIE))
        {
            $parts = explode('|', $_COOKIE['ai_user']);
            if (sizeof($parts) > 0)
            {
                $this->id = $parts[0];
            }
        }
        
        if ($this->id == NULL)
        {
            $this->id = \ApplicationInsights\Channel\Contracts\Utils::returnGuid();
            $_COOKIE['ai_user'] = $this->id;
        }
    }
}
