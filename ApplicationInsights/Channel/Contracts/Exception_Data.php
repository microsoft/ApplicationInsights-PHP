<?php
namespace ApplicationInsights\Channel\Contracts;
/**
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/

/**
* Data contract class for type Exception_Data. An instance of Exception represents a handled or unhandled exception that occurred during execution of the monitored application. 
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
    * Gets the ver field. Schema version 
    */
    public function getVer()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. Schema version 
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the exceptions field. Exception chain - list of inner exceptions. 
    */
    public function getExceptions()
    {
        if (array_key_exists('exceptions', $this->_data)) { return $this->_data['exceptions']; }
        return NULL;
    }

    /**
    * Sets the exceptions field. Exception chain - list of inner exceptions. 
    */
    public function setExceptions($exceptions)
    {
        $this->_data['exceptions'] = $exceptions;
    }

    /**
    * Gets the severityLevel field. Severity level. Mostly used to indicate exception severity level when it is reported by logging library. 
    */
    public function getSeverityLevel()
    {
        if (array_key_exists('severityLevel', $this->_data)) { return $this->_data['severityLevel']; }
        return NULL;
    }

    /**
    * Sets the severityLevel field. Severity level. Mostly used to indicate exception severity level when it is reported by logging library. 
    */
    public function setSeverityLevel($severityLevel)
    {
        $this->_data['severityLevel'] = $severityLevel;
    }

    /**
    * Gets the problemId field. Identifier of where the exception was thrown in code. Used for exceptions grouping. Typically a combination of exception type and a function from the call stack. 
    */
    public function getProblemId()
    {
        if (array_key_exists('problemId', $this->_data)) { return $this->_data['problemId']; }
        return NULL;
    }

    /**
    * Sets the problemId field. Identifier of where the exception was thrown in code. Used for exceptions grouping. Typically a combination of exception type and a function from the call stack. 
    */
    public function setProblemId($problemId)
    {
        $this->_data['problemId'] = $problemId;
    }

    /**
    * Gets the properties field. Collection of custom properties. 
    */
    public function getProperties()
    {
        if (array_key_exists('properties', $this->_data)) { return $this->_data['properties']; }
        return NULL;
    }

    /**
    * Sets the properties field. Collection of custom properties. 
    */
    public function setProperties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Gets the measurements field. Collection of custom measurements. 
    */
    public function getMeasurements()
    {
        if (array_key_exists('measurements', $this->_data)) { return $this->_data['measurements']; }
        return NULL;
    }

    /**
    * Sets the measurements field. Collection of custom measurements. 
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }
}
