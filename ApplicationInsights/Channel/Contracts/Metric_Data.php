<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Metric_Data.
*/
class Metric_Data extends Base_Data implements Data_Interface
{
    /**
    * Creates a new MetricData.
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Metric';
        $this->_dataTypeName = 'MetricData';
        $this->_data['ver'] = 2;
        $this->_data['metrics'] = [];
    }

    /**
    * Gets the metrics field.
    */
    public function getMetrics()
    {
        if (array_key_exists('metrics', $this->_data)) { return $this->_data['metrics']; }
        return NULL;
    }

    /**
    * Sets the metrics field.
    */
    public function setMetrics($metrics)
    {
        $this->_data['metrics'] = $metrics;
    }
}
