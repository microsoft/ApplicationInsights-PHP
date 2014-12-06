<?php
namespace ApplicationInsights;

require_once 'vendor/autoload.php';

/**
 * Main object used for interacting with the Application Insights service. 
 */
class Telemetry_Client
{
    /**
     * The telemetry context this client will use
     * @var ApplicationInsights\Channel\Telemetry_Context
     */
    private $_context;
    
    /**
     * The telemetry channel this client will use
     * @var ApplicationInsights\Channel\Telemetry_Channel
     */
    private $_channel;
    
     /**
     * Initializes a new Telemetry_Client.
     * @param ApplicationInsights\Telemetry_Context $context 
     * @param ApplicationInsights\Channel\Telemetry_Channel $channel 
     */
    public function __construct(Telemetry_Context $context = NULL, Channel\Telemetry_Channel $channel = NULL)
    {
        if ($context == NULL)
        {
            $this->_context = new Telemetry_Context();
        }
        else
        {
            $this->_context = $context;
        }
        
        if ($channel == NULL)
        {
            $this->_channel = new Channel\Telemetry_Channel();
        }
        else
        {
            $this->_channel = $channel;
        }
    }
    
    /**
     * Returns the Telemetry_Context this Telemetry_Client is using. 
     * @return ApplicationInsights\Telemetry_Context
     */
    public function getContext()
    {
        return $this->_context;
    }
    
    /**
     * Returns the Telemetry_Channel this Telemetry_Client is using. 
     * @return ApplicationInsights\Channel\Telemetry_Channel
     */
    public function getChannel()
    {
        return $this->_channel;
    }
    
    /**
     * Sends an Page_View_Data to the Application Insights service.
     * @param string $name The friendly name of the page view.
     * @param string $url The url of the page view. 
     * @param int duration The duration in milliseconds of the page view.
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     * @param array $measurements An array of name to double pairs. Use the name as the index and any double as the value.
     */
    public function queuePageView($name, $url, $duration = 0, $properties = NULL, $measurements = NULL)
    {
        $data = new Channel\Contracts\Page_View_Data();
        $data->setName($name);
        $data->setUrl($url);
        $data->setDuration($duration);
        if ($properties != NULL)
        {
            $data->setProperties($properties);
        }
        if ($measurements != NULL)
        {
            $data->setMeasurements($measurements);
        }
        
        $this->_channel->addToQueue($data, $this->_context);
    }
    
    /**
     * Sends an Metric_Data to the Application Insights service.
     * @param string $name Name of the metric.
     * @param double $value Value of the metric.
     * @param \ApplicationInsights\Channel\Data_Point_Type::Value $type The type of value being sent.
     * @param int $count The number of samples.
     * @param double $min The minimum of the samples.
     * @param double $max The maximum of the samples. 
     * @param double $stdDev The standard deviation of the samples. 
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     */
    public function queueMetric($name, $value, $type = NULL, $count = NULL, $min = NULL, $max = NULL, $stdDev = NULL, $properties = NULL)
    {
        $dataPoiint = new Channel\Contracts\Data_Point();
        $dataPoiint->setName($name);
        $dataPoiint->setValue($value);
        $dataPoiint->setKind($type == NULL ? Data_Point_Type::Aggregation : $type);
        $dataPoiint->setCount($count);
        $dataPoiint->setMin($min);
        $dataPoiint->setMax($max);
        $dataPoiint->setStdDev($stdDev);
        
        $data = new Channel\Contracts\Metric_Data();
        $data->setMetrics([$dataPoiint]);
        if ($properties != NULL)
        {
            $data->setProperties($properties);
        }
        
        $this->_channel->addToQueue($data, $this->_context);
    }
        
    /**
     * Sends an Event_Data to the Application Insights service.
     * @param string $name 
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     * @param array $measurements An array of name to double pairs. Use the name as the index and any double as the value.
     */
    public function queueEvent($name, $properties = NULL, $measurements = NULL)
    {
        $data = new Channel\Contracts\Event_Data();
        $data->setName($name);
        if ($properties != NULL)
        {
            $data->setProperties($properties);
        }
        if ($measurements != NULL)
        {
            $data->setMeasurements($measurements);
        }
        
        $this->_channel->addToQueue($data, $this->_context);
    }
    
    /**
     * Sends an Message_Data to the Application Insights service.
     * @param string $message The trace message.
     * @param array $properties An array of name to value pairs. Use the name as the index and any string as the value.
     */
    public function queueMessage($message, $properties = NULL)
    {
        $data = new Channel\Contracts\Message_Data();
        $data->setMessage($message);
        
        if ($properties != NULL)
        {
            $data->setProperties($properties);
        }
        
        $this->_channel->addToQueue($data, $this->_context);
    }
    
    /**
     * Flushes the underlying Telemetry_Channel queue. 
     */
    public function flushQueue()
    {
        $this->_channel->send();
    }
}

?>