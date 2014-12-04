<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type MetricData. 
*/
class MetricData implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_envelope_type_name;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_data_type_name;

    /**
    * Creates a new MetricData. 
    */
    function __construct()
    {
        $this->_envelope_type_name = 'Microsoft.ApplicationInsights.Metric';
        $this->_data_type_name = 'MetricData';
        $this->_data['ver'] = 2;
        $this->_data['metrics'] = [];
    }

    /**
    * Gets the envelope_type_name field. 
    */
    public function get_envelope_type_name()
    {
        return $this->_envelope_type_name;
    }

    /**
    * Gets the data_type_name field. 
    */
    public function get_data_type_name()
    {
        return $this->_data_type_name;
    }

    /**
    * Gets the ver field. 
    */
    public function get_ver()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. 
    */
    public function set_ver($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the metrics field. 
    */
    public function get_metrics()
    {
        if (array_key_exists('metrics', $this->_data)) { return $this->_data['metrics']; }
        return NULL;
    }

    /**
    * Sets the metrics field. 
    */
    public function set_metrics($metrics)
    {
        $this->_data['metrics'] = $metrics;
    }

    /**
    * Gets the properties field. 
    */
    public function get_properties()
    {
        if (array_key_exists('properties', $this->_data)) { return $this->_data['properties']; }
        return NULL;
    }

    /**
    * Sets the properties field. 
    */
    public function set_properties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::remove_empty_value($this->_data);
    }
}
?>
