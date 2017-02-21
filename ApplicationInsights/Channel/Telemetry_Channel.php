<?php
namespace ApplicationInsights\Channel;

/**
 * Responsible for managing a queue of telemetry items to send and sending them.
 */
class Telemetry_Channel
{
    /**
     * The endpoint URL to send data to.
     * @var string
     */
    private $_endpointUrl;

    /**
     * The queue of already serialized JSON objects to send.
     * @var array
     */
    private $_queue;

    /**
     * Initializes a new Telemetry_Channel.
     * @param string $endpointUrl Optional. Allows caller to override which endpoint to send data to.
     */
    function __construct($endpointUrl = 'https://dc.services.visualstudio.com/v2/track')
    {
        $this->_endpointUrl = $endpointUrl;
        $this->_queue = array();
    }

    /**
     * Returns the current URL this TelemetrySender will send to.
     * @return string
     */
    public function getEndpointUrl()
    {
        return $this->_endpointUrl;
    }

    /**
     * Sets the current URL this TelemetrySender will send to.
     * @param string $endpointUrl
     */
    public function setEndpointUrl($endpointUrl)
    {
        $this->_endpointUrl = $endpointUrl;
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
     * Sets the current queue.
     * @param array $queue
     */
    public function setQueue($queue)
    {
        $this->_queue = $queue;
    }

    /**
     * Summary of getSerializedQueue
     * @return string JSON representation of queue.
     */
    public function getSerializedQueue()
    {
        $queueToEncode = array();
        foreach ($this->_queue as $dataItem)
        {
        	array_push($queueToEncode, Contracts\Utils::getUnderlyingData($dataItem->jsonSerialize()));
        }

        return json_encode($queueToEncode);
    }

    /**
     * Writes the item into the sending queue for subsequent processing.
     * @param \ApplicationInsights\Channel\Contracts\Data_Interface $data The telemetry item to send.
     * @param \ApplicationInsights\Telemetry_Context $telemetryContext The context to use.
     */
    public function addToQueue(\ApplicationInsights\Channel\Contracts\Data_Interface $data, \ApplicationInsights\Telemetry_Context $telemetryContext)
    {
        // If no data or context provided, we just return to not cause upstream issues as a result of telemetry
        if ($data == NULL || $telemetryContext == NULL)
        {
            return;
        }

        $envelope = new Contracts\Envelope();

        // Main envelope properties
        $envelope->setName($data->getEnvelopeTypeName());
        $envelope->setTime(Contracts\Utils::returnISOStringForTime());

        // Set the SDK version
        $internalContext = new Contracts\Internal();
        $internalContext->setSdkVersion('php:0.3.2');

        // The instrumentation key to use
        $envelope->setInstrumentationKey($telemetryContext->getInstrumentationKey());

        // Copy all context into the Tags array
        $envelope->setTags(array_merge($telemetryContext->getApplicationContext()->jsonSerialize(),
                    $telemetryContext->getDeviceContext()->jsonSerialize(),
                    $telemetryContext->getLocationContext()->jsonSerialize(),
                    $telemetryContext->getOperationContext()->jsonSerialize(),
                    $telemetryContext->getSessionContext()->jsonSerialize(),
                    $telemetryContext->getUserContext()->jsonSerialize(),
                    $internalContext->jsonSerialize()));

        // Merge properties from global context to local context
        $contextProperties = $telemetryContext->getProperties();
        if (method_exists($data, 'getProperties') == true && $contextProperties != NULL && count($contextProperties) > 0)
        {
            $dataProperties = $data->getProperties();
            if ($dataProperties == NULL)
            {
                $dataProperties = array();
            }
            foreach ($contextProperties as $key => $value)
            {
            	if (array_key_exists($key, $dataProperties) == false)
                {
                    $dataProperties[$key] = $value;
                }
            }
            $data->setProperties($dataProperties);
        }

        // Embed the main data object
        $envelope->setData(new Contracts\Data());
        $envelope->getData()->setBaseType($data->getDataTypeName());
        $envelope->getData()->setBaseData($data);

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

        $serializedTelemetryItem = $this->getSerializedQueue();

        $headersArray = array('Accept' => 'application/json',
                         'Content-Type' => 'application/json; charset=utf-8');

        if (array_key_exists('HTTP_USER_AGENT', $_SERVER) == true)
        {
            $headersArray['User-Agent'] = $_SERVER['HTTP_USER_AGENT'];
        }

        $body = utf8_encode($serializedTelemetryItem);

        if (class_exists('\GuzzleHttp\Client') == true)
        {
            // Standard case if properly pulled in composer dependencies

            $client = new \GuzzleHttp\Client();

            $client->post($this->_endpointUrl, array(
                'headers'         => $headersArray,
                'body'            => $body,
                'verify'          => false /* If you want to verify, you can, but you will need to provide proper CA bundle. See http://guzzle.readthedocs.org/en/latest/clients.html#verify-option */
                //,'proxy'           => '127.0.0.1:8888' /* For Fiddler debugging */
            ));
        }
        else if (function_exists('wp_remote_post'))
        {
            // Used in WordPress
            wp_remote_post($this->_endpointUrl, array(
               'method'     => 'POST',
               'blocking'   => true,
               'headers'    => $headersArray,
               'body'       => $body
            ));
        }
    }
}
