<?php
namespace ApplicationInsights\Channel;

/**
 * Responsible for managing a queue of telemetry items to send and sending them.
 */
class TelemetryChannel
{
    /**
     * The endpoint URL to send data to.
     * @var string
     */
    private $_endpoint_url;
    
    /**
     * The queue of already serialized JSON objects to send.
     * @var array
     */
    private $_queue;
    
    /**
     * Initializes a new TelemetryChannel.
     * @param string $endpoint_url Optional. Allows caller to override which endpoint to send data to.
     */
    function __construct($endpoint_url = 'http://dc.services.visualstudio.com/v2/track')
    {
        $this->_endpoint_url = $endpoint_url;
        $this->_queue = [];
    }
    
    /**
     * Returns the current URL this TelemetrySender will send to.
     * @return string
     */
    public function get_endpoint_url()
    {
        return $this->_endpoint_url;
    }
    
    /**
     * Sets the current URL this TelemetrySender will send to.
     * @param string $endpoint_url
     */
    public function set_endpoint_url($endpoint_url)
    {
        $this->_endpoint_url = $endpoint_url;
    }
    
    /**
     * Returns the current queue. 
     * @return array
     */
    public function get_queue()
    {
        return $this->_queue;
    }
    
    /**
     * Sets the current queue. 
     * @param array $queue
     */
    public function set_queue($queue)
    {
        $this->_queue = $queue;
    }
    
    /**
     * Summary of get_serialized_queue
     * @return string JSON representation of queue.
     */
    public function get_serialized_queue()
    {
        return json_encode($this->_queue);
    }
    
    /**
     * Writes the item into the sending queue for subsequent processing.
     * @param mixed $data The telemetry item to send. 
     */
    public function add_to_queue($data, \ApplicationInsights\TelemetryContext $telemetry_context)
    {
        // If no data or context provided, we just return to not cause upstream issues as a result of telemetry
        if ($data == NULL || $telemetry_context == NULL)
        {
            return;
        }
        
        $envelope = new Contracts\Envelope();
        
        // Main envelope properties
        $envelope->set_name($data->get_envelope_type_name());
        $envelope->set_time(gmdate('c') . 'Z');
        $envelope->set_ikey($telemetry_context->get_instrumentation_key());
        
        // Copy all context into the Tags array
        $envelope->set_tags(array_merge($telemetry_context->get_application_context()->jsonSerialize(),
                    $telemetry_context->get_device_context()->jsonSerialize(),
                    $telemetry_context->get_location_context()->jsonSerialize(),
                    $telemetry_context->get_operation_context()->jsonSerialize(),
                    $telemetry_context->get_session_context()->jsonSerialize(),
                    $telemetry_context->get_user_context()->jsonSerialize()));
        
        // Merge properties from global context to local context
        $context_properties = $telemetry_context->get_properties();
        if (method_exists($data, 'get_properties') == true && $context_properties != NULL && count($context_properties) > 0)
        {
            $data_properties = $data->get_properties();
            if ($data_properties == NULL)
            {
                $data_properties = [];
            }
            foreach ($context_properties as $key => $value)
            {
            	if (array_key_exists($key, $data_properties) == false)
                {
                    $data_properties[$key] = $value;
                }
            }
            $data->set_properties($data_properties);
        }
            
        // Embed the main data object
        $envelope->set_data(new Contracts\Data());
        $envelope->get_data()->set_base_type($data->get_data_type_name());
        $envelope->get_data()->set_base_data($data);
        
        array_push($this->_queue, $envelope);
    }
    
    /**
     * Summary of send
     * @param mixed $telemetryItem 
     */
    public function send()
    {
        if (count($this->_queue) == 0)
        {
            return;
        }
        
        $serializedTelemetryItem = $this->get_serialized_queue();
        
        $client = new \GuzzleHttp\Client();
    
        $response = $client->post($this->_endpoint_url, [
            'headers'         => ['Accept' => 'application/json', 
                                    'Content-Type' => 'application/json; charset=utf-8'],
            'body'            => utf8_encode($serializedTelemetryItem),
            'proxy'           => '127.0.0.1:8888'
        ]);
    }
}

?>