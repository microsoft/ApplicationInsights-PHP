<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Remote_Dependency_Data. 
*/
class Remote_Dependency_Data extends Base_Data implements Data_Interface
{

    /**
    * Creates a new RemoteDependencyData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.RemoteDependency';
        $this->_dataTypeName = 'RemoteDependencyData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = NULL;
        $this->_data['duration'] = NULL;
        $this->_data['success'] = true;
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
    * Gets the resultCode field. 
    */
    public function getResultCode()
    {
        if (array_key_exists('resultCode', $this->_data)) { return $this->_data['resultCode']; }
        return NULL;
    }

    /**
    * Sets the resultCode field. 
    */
    public function setResultCode($resultCode)
    {
        $this->_data['resultCode'] = $resultCode;
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
    * Gets the data field. 
    */
    public function getData()
    {
        if (array_key_exists('data', $this->_data)) { return $this->_data['data']; }
        return NULL;
    }

    /**
    * Sets the data field. 
    */
    public function setData($data)
    {
        $this->_data['data'] = $data;
    }

    /**
    * Gets the target field. 
    */
    public function getTarget()
    {
        if (array_key_exists('target', $this->_data)) { return $this->_data['target']; }
        return NULL;
    }

    /**
    * Sets the target field. 
    */
    public function setTarget($target)
    {
        $this->_data['target'] = $target;
    }

    /**
    * Gets the type field. 
    */
    public function getType()
    {
        if (array_key_exists('type', $this->_data)) { return $this->_data['type']; }
        return NULL;
    }

    /**
    * Sets the type field. 
    */
    public function setType($type)
    {
        $this->_data['type'] = $type;
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
