<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type MessageData. 
*/
class MessageData implements \JsonSerializable 
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
    * Creates a new MessageData. 
    */
    function __construct()
    {
        $this->_envelope_type_name = 'Microsoft.ApplicationInsights.Message';
        $this->_data_type_name = 'MessageData';
        $this->_data['ver'] = 2;
        $this->_data['message'] = NULL;
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
    * Gets the message field. 
    */
    public function get_message()
    {
        if (array_key_exists('message', $this->_data)) { return $this->_data['message']; }
        return NULL;
    }

    /**
    * Sets the message field. 
    */
    public function set_message($message)
    {
        $this->_data['message'] = $message;
    }

    /**
    * Gets the severityLevel field. 
    */
    public function get_severity_level()
    {
        if (array_key_exists('severityLevel', $this->_data)) { return $this->_data['severityLevel']; }
        return NULL;
    }

    /**
    * Sets the severityLevel field. 
    */
    public function set_severity_level($severity_level)
    {
        $this->_data['severityLevel'] = $severity_level;
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
