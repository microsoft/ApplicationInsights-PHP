<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Message_Data.
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
    * Gets the message field.
    */
    public function getMessage()
    {
        if (array_key_exists('message', $this->_data)) { return $this->_data['message']; }
        return NULL;
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
}
