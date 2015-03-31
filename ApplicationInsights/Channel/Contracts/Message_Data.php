<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Message_Data. 
*/
class Message_Data
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
    * Creates a new MessageData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Message';
        $this->_dataTypeName = 'MessageData';
        $this->_data['ver'] = 2;
        $this->_data['message'] = NULL;
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
    * Gets the message field. 
    */
    public function getMessage()
    {
        return array_key_exists('message', $this->_data) ? $this->_data['message'] : null;
    }

    /**
    * Sets the message field. 
    */
    public function setMessage($message)
    {
        $this->_data['message'] = $message;
    }

    /**
    * Gets the severityLevel field. 
    */
    public function getSeverityLevel()
    {
        return array_key_exists('severityLevel', $this->_data) ? $this->_data['severityLevel'] : null;
    }

    /**
    * Sets the severityLevel field. 
    */
    public function setSeverityLevel($severityLevel)
    {
        $this->_data['severityLevel'] = $severityLevel;
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
