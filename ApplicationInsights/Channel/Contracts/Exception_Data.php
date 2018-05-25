/**
*  
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/
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
        $this->_data['exceptions'] = [];
    }

    /**
    * Gets the ver field. 
    */
    public function getVer()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. 
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
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
    * Gets the problemId field. 
    */
    public function getProblemId()
    {
        if (array_key_exists('problemId', $this->_data)) { return $this->_data['problemId']; }
        return NULL;
    }

    /**
    * Sets the problemId field. 
    */
    public function setProblemId($problemId)
    {
        $this->_data['problemId'] = $problemId;
    }

    /**
    * Gets the properties field. 
    */
    public function getProperties()
    {
        if (array_key_exists('properties', $this->_data)) { return $this->_data['properties']; }
        return NULL;
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
