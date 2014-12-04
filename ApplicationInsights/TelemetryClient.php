<?php
namespace ApplicationInsights;

require_once 'vendor/autoload.php';

/**
 * Main object used for interacting with the Application Insights service. 
 */
class TelemetryClient
{
    /**
     * The telemetry context this client will use
     * @var ApplicationInsights\Channel\TelemetryContext
     */
    private $_context;
    
    /**
     * The telemetry channel this client will use
     * @var ApplicationInsights\Channel\TelemetryChannel
     */
    private $_channel;
    
     /**
     * Initializes a new TelemetryClient.
     * @param ApplicationInsights\TelemetryContext $context 
     * @param ApplicationInsights\Channel\TelemetryChannel $channel 
     */
    public function __construct(TelemetryContext $context = NULL, Channel\TelemetryChannel $channel = NULL)
    {
        if ($context == NULL)
        {
            $this->_context = new TelemetryContext();
        }
        else
        {
            $this->_context = $context;
        }
        
        if ($channel == NULL)
        {
            $this->_channel = new Channel\TelemetryChannel();
        }
        else
        {
            $this->_channel = $channel;
        }
    }
    
    /**
     * Returns the TelemetryContext this TelemetryClient is using. 
     * @return ApplicationInsights\TelemetryContext
     */
    public function get_context()
    {
        return $this->_context;
    }
    
    /**
     * Returns the TelemetryChannel this TelemetryClient is using. 
     * @return ApplicationInsights\Channel\TelemetryChannel
     */
    public function get_channel()
    {
        return $this->_channel;
    }
    
    /**
     * Sends an PageViewData to the Application Insights service.
     * @param string $name The friendly name of the page view.
     * @param string $url The url of the page view. 
     * @param int duration The duration in milliseconds of the page view.
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     * @param array $measurements An array of name to double pairs. Use the name as the index and any double as the value.
     */
    public function queue_page_view($name, $url, $duration = 0, $properties = NULL, $measurements = NULL)
    {
        $data = new Channel\Contracts\PageViewData();
        $data->set_name($name);
        $data->set_url($url);
        $data->set_duration($duration);
        if ($properties != NULL)
        {
            $data->set_properties($properties);
        }
        if ($measurements != NULL)
        {
            $data->set_measurements($measurements);
        }
        
        $this->_channel->add_to_queue($data, $this->_context);
    }
    
    /**
     * Sends an PageViewData to the Application Insights service.
     * @param string $name Name of the metric.
     * @param double $value Value of the metric.
     * @param \ApplicationInsights\Channel\DataPointType::Value $type The type of value being sent.
     * @param int $count The number of samples.
     * @param double $min The minimum of the samples.
     * @param double $max The maximum of the samples. 
     * @param double $std_dev The standard deviation of the samples. 
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     */
    public function queue_metric($name, $value, $type = NULL, $count = NULL, $min = NULL, $max = NULL, $std_dev = NULL, $properties = NULL)
    {
        $data_point = new Channel\Contracts\DataPoint();
        $data_point->set_name($name);
        $data_point->set_value($value);
        $data_point->set_kind($type == NULL ? Channel\Contracts\DataPointType::Aggregation : $type);
        $data_point->set_count($count);
        $data_point->set_min($min);
        $data_point->set_max($max);
        $data_point->set_std_dev($std_dev);
        
        $data = new Channel\Contracts\MetricData();
        $data->set_metrics([$data_point]);
        if ($properties != NULL)
        {
            $data->set_properties($properties);
        }
        
        $this->_channel->add_to_queue($data, $this->_context);
    }
        
    /**
     * Sends an EventTelemetry to the Application Insights service.
     * @param string $name 
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     * @param array $measurements An array of name to double pairs. Use the name as the index and any double as the value.
     */
    public function queue_event($name, $properties = NULL, $measurements = NULL)
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
        
        $this->_channel->add_to_queue($data, $this->_context);
    }
    
    /**
     * Sends an MessageData to the Application Insights service.
     * @param string $message The trace message.
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     */
    public function queue_message($message, $properties = NULL)
    {
        $data = new Channel\Contracts\MessageData();
        $data->set_message($message);
        
        if ($properties != NULL)
        {
            $data->set_properties($properties);
        }
        
        $this->_channel->add_to_queue($data, $this->_context);
    }
    
    /**
     * Flushes the underlying TelemetryChannel queue. 
     */
    public function flush_queue()
    {
        $this->_channel->send();
    }
}

?>