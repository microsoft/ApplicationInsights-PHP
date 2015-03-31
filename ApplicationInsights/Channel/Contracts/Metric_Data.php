<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Metric_Data. 
*/
class Metric_Data
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_envelopeTypeName;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_dataTypeName;

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
    * Gets the envelopeTypeName field. 
    */
    public function getEnvelopeTypeName()
    {
        return $this->_envelopeTypeName;
    }

    /**
    * Gets the dataTypeName field. 
    */
    public function getDataTypeName()
    {
        return $this->_dataTypeName;
    }

    /**
    * Gets the ver field. 
    */
    public function getVer()
    {
        return array_key_exists('ver', $this->_data) ? $this->_data['ver'] : null;
    }

    /**
    * Sets the ver field. 
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the metrics field. 
    */
    public function getMetrics()
    {
        return array_key_exists('metrics', $this->_data) ? $this->_data['metrics'] : null;
    }

    /**
    * Sets the metrics field. 
    */
    public function setMetrics($metrics)
    {
        $this->_data['metrics'] = $metrics;
    }

    /**
    * Gets the properties field. 
    */
    public function getProperties()
    {
        return array_key_exists('properties', $this->_data) ? $this->_data['properties'] : null;
    }

    /**
    * Sets the properties field. 
    */
    public function setProperties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
