<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Exception_Data. 
*/
class Exception_Data
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
    * Creates a new ExceptionData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Exception';
        $this->_dataTypeName = 'ExceptionData';
        $this->_data['ver'] = 2;
        $this->_data['handledAt'] = NULL;
        $this->_data['exceptions'] = [];
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
    * Gets the handledAt field. 
    */
    public function getHandledAt()
    {
        return array_key_exists('handledAt', $this->_data) ? $this->_data['handledAt'] : null;
    }

    /**
    * Sets the handledAt field. 
    */
    public function setHandledAt($handledAt)
    {
        $this->_data['handledAt'] = $handledAt;
    }

    /**
    * Gets the exceptions field. 
    */
    public function getExceptions()
    {
        return array_key_exists('exceptions', $this->_data) ? $this->_data['exceptions'] : null;
    }

    /**
    * Sets the exceptions field. 
    */
    public function setExceptions($exceptions)
    {
        $this->_data['exceptions'] = $exceptions;
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
    * Gets the measurements field. 
    */
    public function getMeasurements()
    {
        return array_key_exists('measurements', $this->_data) ? $this->_data['measurements'] : null;
    }

    /**
    * Sets the measurements field. 
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
