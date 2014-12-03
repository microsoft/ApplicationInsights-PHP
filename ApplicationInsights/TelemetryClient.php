<?php
namespace ApplicationInsights;

/**
 * Main object used for interacting with the Application Insights service. 
 */
class TelemetryClient
{
    /**
     * The telemetry channel this client will use
     * @var ApplicationInsights\Channel\TelemetryChannel
     */
    private $_telemetry_channel;
    
     /**
     * Initializes a new TelemetryClient.
     */
    function __construct()
    {
        $this->_telemetry_channel = new Channel\TelemetryChannel();
    }
    
    /**
     * Sends an EventTelemetry to the Application Insights service.
     * @param string $name 
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     * @param array $measurements An array of name to double pairs. Use the name as the index and any double as the value.
     */
    function track_event($name, $properties = NULL, $measurements = NULL)
    {
        $data = new Channel\Contracts\EventData();
        $data->set_name($name);
        if ($properties != NULL)
        {
            $data->set_properties($properties);
        }
        if ($measurements != NULL)
        {
            $data->set_measurements($measurements);
        }
        
        $this->_telemetry_channel->write($data);
    }
    
    
    //def track_event(self, name, properties=None, measurements=None):
    //    """Send an EventTelemetry object for display in Diagnostic Search and aggregation in Metrics Explorer."""
    //    data = channel.contracts.EventData()
    //    data.name = name or NULL_CONSTANT_STRING
    //    if properties:
    //        data.properties = properties
    //    if measurements:
    //        data.measurements = measurements

    //    self._channel.write(data, self._context)
        
}

?>