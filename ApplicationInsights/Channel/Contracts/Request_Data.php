<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Request_Data.
*/
class Request_Data extends Base_Data implements Data_Interface
{
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
    * Gets the id field.
    */
    public function getId()
    {
        if (array_key_exists('id', $this->_data)) { return $this->_data['id']; }
        return NULL;
    }

    /**
    * Sets the id field.
    */
    public function setId($id)
    {
        $this->_data['id'] = (string)var_export($id, true);
    }

    /**
    * Gets the name field.
    */
    public function getName()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
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
        if (array_key_exists('startTime', $this->_data)) { return $this->_data['startTime']; }
        return NULL;
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
        if (array_key_exists('duration', $this->_data)) { return $this->_data['duration']; }
        return NULL;
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
        if (array_key_exists('responseCode', $this->_data)) { return $this->_data['responseCode']; }
        return NULL;
    }

    /**
    * Sets the responseCode field.
    */
    public function setResponseCode($responseCode)
    {
        $this->_data['responseCode'] = (string)var_export($responseCode, true);
    }

    /**
    * Gets the success field.
    */
    public function getSuccess()
    {
        if (array_key_exists('success', $this->_data)) { return $this->_data['success']; }
        return NULL;
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
        if (array_key_exists('httpMethod', $this->_data)) { return $this->_data['httpMethod']; }
        return NULL;
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
        if (array_key_exists('url', $this->_data)) { return $this->_data['url']; }
        return NULL;
    }

    /**
    * Sets the url field.
    */
    public function setUrl($url)
    {
        $this->_data['url'] = $url;
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
