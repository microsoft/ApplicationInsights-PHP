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
* Data contract class for type Message_Data. Instances of Message represent printf-like trace statements that are text-searched. Log4Net, NLog and other text-based log file entries are translated into intances of this type. The message does not have measurements. 
*/
class Message_Data extends Base_Data implements Data_Interface
{

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
    * Gets the message field. Trace message 
    */
    public function getMessage()
    {
        if (array_key_exists('message', $this->_data)) { return $this->_data['message']; }
        return NULL;
    }

    /**
    * Sets the message field. Trace message 
    */
    public function setMessage($message)
    {
        $this->_data['message'] = $message;
    }

    /**
    * Gets the severityLevel field. Trace severity level. 
    */
    public function getSeverityLevel()
    {
        if (array_key_exists('severityLevel', $this->_data)) { return $this->_data['severityLevel']; }
        return NULL;
    }

    /**
    * Sets the severityLevel field. Trace severity level. 
    */
    public function setSeverityLevel($severityLevel)
    {
        $this->_data['severityLevel'] = $severityLevel;
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
}
