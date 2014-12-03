<?php
namespace ApplicationInsights\Channel;

/**
 * Responsible for managing a queue of telemetry items to send and sending them.
 */
class TelemetrySender
{
    /**
     * The endpoint URL to send data to.
     * @var string
     */
    private $_endpointURL;
    
    /**
     * The queue of already serialized JSON objects to send.
     * @var array
     */
    private $_queue;
    
    /**
     * When set, instead of sending the data to the endpoint, the class will send the data it would have sent to this callback.
     * @var callable
     */
    private $_verificationCallback;

    /**
     * Initializes a new TelemetrySender.
     * @param string $endpointURL Optional. Allows caller to override which endpoint to send data to.
     * @param callback $verificationCallback Optional: For testing, allows caller to have result sent to their callback instead of the endpoint.
     */
    function __construct($endpointURL = 'http://dc.services.visualstudio.com/v2/track')
    {
        $this->_endpointURL = $endpointURL;
        $this->_verificationCallback = NULL;
        $this->_queue = [];
    }
    
    /**
     * Returns the current URL this TelemetrySender will send to.
     * @return string
     */
    public function getEndpointURL()
    {
        return $this->_endpointURL;
    }
    
    /**
     * Sets the current URL this TelemetrySender will send to.
     * @param string $endpointURL
     */
    public function setEndpointURL($endpointURL)
    {
        $this->_endpointURL = $endpointURL;
    }
    
    /**
     * If set, returns the callback to use for verification; otherwise NULL.
     * @return callable
     */
    public function getVerificationCallback()
    {
        return $this->_verificationCallback;
    }
    
    /**
     * Sets the callback to use for verification.
     * @param string $verificationCallback
     */
    public function setVerificationCallback($verificationCallback)
    {
        return $this->_verificationCallback = $verificationCallback;
    }
    
    /**
     * Returns the current queue. 
     * @return array
     */
    public function getQueue()
    {
        return $this->_queue;
    }
    
    /**
     * Summary of send
     * @param mixed $telemetryItem 
     */
    public function send($telemetryItem)
    {
        $serializedTelemetryItem = json_encode($telemetryItem);
    }
        
}

?>