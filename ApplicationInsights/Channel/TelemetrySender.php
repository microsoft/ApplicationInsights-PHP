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
     * Initializes a new TelemetrySender.
     * @param string $endpointURL Optional. Allows caller to override which endpoint to send data to.
     * @param callback $verificationCallback Optional: For testing, allows caller to have result sent to their callback instead of the endpoint.
     */
    function __construct($endpointURL = 'http://dc.services.visualstudio.com/v2/track')
    {
        $this->_endpointURL = $endpointURL;
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
        
        $client = new \GuzzleHttp\Client();
        
        $response = $client->post($this->_endpointURL, [
            'headers'         => ['Accept' => 'application/json', 
                                  'Content-Type' => 'application/json; charset=utf-8'],
            'body'            => utf8_encode($serializedTelemetryItem),
            'proxy'           => '127.0.0.1:8888'
        ]);
    }
        
}

?>