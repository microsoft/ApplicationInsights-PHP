<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Exception_Data.
*/
class Exception_Data extends Base_Data implements Data_Interface
{
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
    * Gets the handledAt field.
    */
    public function getHandledAt()
    {
        if (array_key_exists('handledAt', $this->_data)) { return $this->_data['handledAt']; }
        return NULL;
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
        if (array_key_exists('exceptions', $this->_data)) { return $this->_data['exceptions']; }
        return NULL;
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
        if (array_key_exists('severityLevel', $this->_data)) { return $this->_data['severityLevel']; }
        return NULL;
    }

    /**
    * Sets the severityLevel field.
    */
    public function setSeverityLevel($severityLevel)
    {
        $this->_data['severityLevel'] = $severityLevel;
    }

    /**
    * Gets the measurements field.
    */
    public function getMeasurements()
    {
        if (array_key_exists('measurements', $this->_data)) { return $this->_data['measurements']; }
        return NULL;
    }

    /**
    * Sets the measurements field.
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }
}
