<?php
namespace ApplicationInsights\Channel;

/**
 * Responsible for managing a queue of telemetry items to send and sending them.
 */
class TelemetryChannel
{
    /**
     * The telemetry sender this channel will use
     * @var ApplicationInsights\Channel\TelemetrySender
     */
    private $_telemetry_sender;
    
    /**
     * Initializes a new TelemetryChannel.
     */
    function __construct()
    {
        $this->_telemetry_sender = new TelemetrySender();
    }
    
    /**
     * Writes the item into the sending queue for subsequent processing.
     * @param mixed $data The telemetry item to send. 
     */
    public function write($data)
    {
        /* If no data provided, we just return to not cause upstream issues as a result of telemetry */
        if ($data == NULL)
        {
            return;
        }
        
        $envelope = new Contracts\Envelope();
        $envelope->set_ver(2);
        $envelope->set_name($data->get_envelope_type_name());
        $envelope->set_time(gmdate('c') . 'Z');
        $envelope->set_ikey('f22d426f-57e2-47c3-9668-c58013a26eb4');
        $envelope->set_data(new Contracts\Data());
        $envelope->get_data()->set_base_type($data->get_data_type_name());
        $envelope->get_data()->set_base_data($data);

        $this->_telemetry_sender->send($envelope);
    }
        
}

?>