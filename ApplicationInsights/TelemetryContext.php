<?php
namespace ApplicationInsights;

/**
 * Responsible for managing the context to send along with all telemetry items.
 */
class TelemetryContext
{
    /**
     * The instrumentation key
     * @var string (Guid)
     */
    private $_ikey;
    
    /**
     * The device context
     * @var ApplicationInsights\Channel\Contracts\Device
     */
    private $_device_context;
    
    /**
     * The application context
     * @var ApplicationInsights\Channel\Contracts\Application
     */
    private $_application_context;
    
    /**
     * The user context
     * @var ApplicationInsights\Channel\Contracts\User
     */
    private $_user_context;
    
    /**
     * The location context
     * @var ApplicationInsights\Channel\Contracts\Location
     */
    private $_location_context;
    
    /**
     * The operation context
     * @var ApplicationInsights\Channel\Contracts\Operation
     */
    private $_operation_context;
    
    /**
     * The session context
     * @var ApplicationInsights\Channel\Contracts\Session
     */
    private $_session_context;
    
    /**
     * Additional custom properties array.
     * @var array Additional properties (name/value pairs) to append as custom properties to all telemetry.
     */
    private $_properties;
    
    /**
     * Initializes a new TelemetryContext.
     */
    function __construct()
    {
        $this->_device_context = new Channel\Contracts\Device();
        $this->_application_context = new Channel\Contracts\Application();
        $this->_user_context = new Channel\Contracts\User();
        $this->_location_context = new Channel\Contracts\Location();
        $this->_operation_context = new Channel\Contracts\Operation();
        $this->_session_context = new Channel\Contracts\Session();
        $this->_properties = [];
    }
    
    /**
     * The instrumentation key for your Application Insights application.
     * @return string (Guid)
     */
    public function get_instrumentation_key()
    {
        return $this->_ikey;
    }
    
    /**
     * Sets the instrumetation key on the context. This is the key for you application in Application Insights.
     * @param string $instrumentation_key (Guid)
     */
    public function set_instrumentation_key($instrumentation_key)
    {
        $this->_ikey = $instrumentation_key;
    }
    
    /**
     * The device context object. Allows you to set properties that will be attached to all telemetry about the device.
     * @return  ApplicationInsights\Channel\Contracts\Device 
     */
    public function get_device_context()
    {
        return $this->_device_context;
    }
    
    /**
     * Sets device context object. Allows you to set properties that will be attached to all telemetry about the device.
     * @param ApplicationInsights\ApplicationInsights\Channel\Contracts\Device $device_context 
     */
    public function set_device_context(Channel\Contracts\Device $device_context)
    {
        $this->_device_context = $device_context;
    }
    
    /**
     * The application context object. Allows you to set properties that will be attached to all telemetry about the application.
     * @return  ApplicationInsights\Channel\Contracts\Application 
     */
    public function get_application_context()
    {
        return $this->_application_context;
    }
    
    /**
     * Sets application context object. Allows you to set properties that will be attached to all telemetry about the application.
     * @param ApplicationInsights\Channel\Contracts\Application $application_context 
     */
    public function set_application_context(Channel\Contracts\Application $application_context)
    {
        $this->_application_context = $application_context;
    }
    
    /**
     * The user context object. Allows you to set properties that will be attached to all telemetry about the user.
     * @return  ApplicationInsights\Channel\Contracts\User 
     */
    public function get_user_context()
    {
        return $this->_user_context;
    }
    
    /**
     * Set user context object. Allows you to set properties that will be attached to all telemetry about the user.
     * @param  ApplicationInsights\Channel\Contracts\User $user_context
     */
    public function set_user_context(Channel\Contracts\User $user_context)
    {
        $this->_user_context = $user_context;
    }
    
    /**
     * The location context object. Allows you to set properties that will be attached to all telemetry about the location.
     * @return  ApplicationInsights\Channel\Contracts\Location 
     */
    public function get_location_context()
    {
        return $this->_location_context;
    }
    
    /**
     * Set location context object. Allows you to set properties that will be attached to all telemetry about the location.
     * @param  ApplicationInsights\Channel\Contracts\Location $location_context
     */
    public function set_location_context(Channel\Contracts\Location $location_context)
    {
        $this->_location_context = $location_context;
    }
    
    /**
     * The operation context object. Allows you to set properties that will be attached to all telemetry about the operation.
     * @return  ApplicationInsights\Channel\Contracts\Location 
     */
    public function get_operation_context()
    {
        return $this->_operation_context;
    }
    
    /**
     * Set operation context object. Allows you to set properties that will be attached to all telemetry about the operation.
     * @param ApplicationInsights\Channel\Contracts\Operation $operation_context
     */
    public function set_operation_context(Channel\Contracts\Operation $operation_context)
    {
        $this->_operation_context = $operation_context;
    }
    
    /**
     * The session context object. Allows you to set properties that will be attached to all telemetry about the session.
     * @return  ApplicationInsights\Channel\Contracts\Session 
     */
    public function get_session_context()
    {
        return $this->_session_context;
    }
    
    /**
     * Set session context object. Allows you to set properties that will be attached to all telemetry about the session.
     * @param  ApplicationInsights\Channel\Contracts\Session $session_context
     */
    public function set_session_context(Channel\Contracts\Session $session_context)
    {
        $this->_session_context = $session_context;
    }
    
    /**
     * Get the additional custom properties array.
     * @return array Additional properties (name/value pairs) to append as custom properties to all telemetry.
     */
    public function get_properties()
    {
        return $this->_properties;
    }
    
    /**
     * Set the additional custom properties array.
     * @param array $properties Additional properties (name/value pairs) to append as custom properties to all telemetry.
     */
    public function set_properties($properties)
    {
        $this->_properties = $properties;
    }
}

?>