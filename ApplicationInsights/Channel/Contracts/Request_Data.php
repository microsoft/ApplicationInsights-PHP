<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Request_Data. 
*/
class Request_Data
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
    * Creates a new RequestData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Request';
        $this->_dataTypeName = 'RequestData';
        $this->_data['ver'] = 2;
        $this->_data['id'] = NULL;
        $this->_data['startTime'] = NULL;
        $this->_data['duration'] = NULL;
        $this->_data['responseCode'] = NULL;
        $this->_data['success'] = NULL;
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
    * Gets the id field. 
    */
    public function getId()
    {
        return array_key_exists('id', $this->_data) ? $this->_data['id'] : null;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['id'] = $id;
    }

    /**
    * Gets the name field. 
    */
    public function getName()
    {
        return array_key_exists('name', $this->_data) ? $this->_data['name'] : null;
    }

    /**
    * Sets the name field. 
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the startTime field. 
    */
    public function getStartTime()
    {
        return array_key_exists('startTime', $this->_data) ? $this->_data['startTime'] : null;
    }

    /**
    * Sets the startTime field. 
    */
    public function setStartTime($startTime)
    {
        $this->_data['startTime'] = $startTime;
    }

    /**
    * Gets the duration field. 
    */
    public function getDuration()
    {
        return array_key_exists('duration', $this->_data) ? $this->_data['duration'] : null;
    }

    /**
    * Sets the duration field. 
    */
    public function setDuration($duration)
    {
        $this->_data['duration'] = $duration;
    }

    /**
    * Gets the responseCode field. 
    */
    public function getResponseCode()
    {
        return array_key_exists('responseCode', $this->_data) ? $this->_data['responseCode'] : null;
    }

    /**
    * Sets the responseCode field. 
    */
    public function setResponseCode($responseCode)
    {
        $this->_data['responseCode'] = $responseCode;
    }

    /**
    * Gets the success field. 
    */
    public function getSuccess()
    {
        return array_key_exists('success', $this->_data) ? $this->_data['success'] : null;
    }

    /**
    * Sets the success field. 
    */
    public function setSuccess($success)
    {
        $this->_data['success'] = $success;
    }

    /**
    * Gets the httpMethod field. 
    */
    public function getHttpMethod()
    {
        return array_key_exists('httpMethod', $this->_data) ? $this->_data['httpMethod'] : null;
    }

    /**
    * Sets the httpMethod field. 
    */
    public function setHttpMethod($httpMethod)
    {
        $this->_data['httpMethod'] = $httpMethod;
    }

    /**
    * Gets the url field. 
    */
    public function getUrl()
    {
        return array_key_exists('url', $this->_data) ? $this->_data['url'] : null;
    }

    /**
    * Sets the url field. 
    */
    public function setUrl($url)
    {
        $this->_data['url'] = $url;
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
