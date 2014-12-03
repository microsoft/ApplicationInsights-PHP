<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type EventData. 
*/
class EventData implements \JsonSerializable 
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
    * Creates a new EventData. 
    */
    function __construct()
    {
        $this->_envelope_type_name = 'Microsoft.ApplicationInsights.Event';
        $this->_data_type_name = 'EventData';
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
        return $this->_data['ver'];
    }

    /**
    * Sets the ver field. 
    */
    public function set_ver($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the name field. 
    */
    public function get_name()
    {
        return $this->_data['name'];
    }

    /**
    * Sets the name field. 
    */
    public function set_name($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the properties field. 
    */
    public function get_properties()
    {
        return $this->_data['properties'];
    }

    /**
    * Sets the properties field. 
    */
    public function set_properties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Gets the measurements field. 
    */
    public function get_measurements()
    {
        return $this->_data['measurements'];
    }

    /**
    * Sets the measurements field. 
    */
    public function set_measurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return $this->_data;
    }
}
?>
