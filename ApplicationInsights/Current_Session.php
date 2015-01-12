<?php
namespace ApplicationInsights;

/**
 * Main object used for managing sessions for other telemetry items. 
 */
class Current_Session
{
    /**
     * A session cannot last longer without being recreated than this constant. (24 hours)
     */
    const MAX_SESSION_DURATION = 24 * 60 * 60 * 1000;
    
    /**
     * A session must be updated by the session renewal duration, otherwise a new session must be created (30 minutes)
     */
    const MAX_SESSION_RENEWAL = 30 * 60 * 1000;
    
    /**
     * The current session id.
     */ 
    public $id;
    
    /**
     * Initializes a new Current_Session.
     */
    function __construct()
    {
        
    }
}
