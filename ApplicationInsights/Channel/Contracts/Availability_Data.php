<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Availability_Data. 
*/
class Availability_Data extends Base_Data implements Data_Interface
{

    /**
    * Creates a new AvailabilityData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Availability';
        $this->_dataTypeName = 'AvailabilityData';
        $this->_data['ver'] = 2;
        $this->_data['id'] = NULL;
        $this->_data['name'] = NULL;
        $this->_data['duration'] = NULL;
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
        $this->_data['id'] = $id;
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
    * Gets the runLocation field. 
    */
    public function getRunLocation()
    {
        if (array_key_exists('runLocation', $this->_data)) { return $this->_data['runLocation']; }
        return NULL;
    }

    /**
    * Sets the runLocation field. 
    */
    public function setRunLocation($runLocation)
    {
        $this->_data['runLocation'] = $runLocation;
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
