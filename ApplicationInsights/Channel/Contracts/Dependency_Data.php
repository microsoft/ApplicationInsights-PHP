<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Dependency_Data.
*/
class Dependency_Data extends Base_Data implements Data_Interface
{
    /**
    * Creates a new MetricData.
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.RemoteDependency';
        $this->_dataTypeName = 'RemoteDependencyData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = NULL;
        $this->_data['kind'] = Data_Point_Type::Measurement;
        $this->_data['dependencyKind'] = NULL;
        $this->_data['commandName'] = NULL;
        $this->_data['startTime'] = NULL;
        $this->_data['duration'] = NULL;
        $this->_data['success'] = true;
        $this->_data['resultCode'] = NULL;
        $this->_data['async'] = NULL;
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
    * Gets the kind field.
    */
    public function getKind()
    {
        if (array_key_exists('kind', $this->_data)) { return $this->_data['kind']; }
        return NULL;
    }

    /**
    * Sets the kind field.
    */
    public function setKind($kind)
    {
        $this->_data['kind'] = $kind;
    }

    /**
    * Gets the dependencyKind field.
    */
    public function getDependencyKind()
    {
        if (array_key_exists('dependencyKind', $this->_data)) { return $this->_data['dependencyKind']; }
        return NULL;
    }

    /**
    * Sets the dependencyKind field.
    */
    public function setDependencyKind($dependencyKind)
    {
        $this->_data['dependencyKind'] = $dependencyKind;
    }

    /**
    * Gets the commandName field.
    */
    public function getCommandName()
    {
        if (array_key_exists('commandName', $this->_data)) { return $this->_data['commandName']; }
        return NULL;
    }

    /**
    * Sets the commandName field.
    */
    public function setCommandName($name)
    {
        $this->_data['commandName'] = $name;
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
        $this->_data['resultCode'] = (string)var_export($resultCode, true);
    }

    /**
    * Gets the async field.
    */
    public function getAsync()
    {
        if (array_key_exists('async', $this->_data)) { return $this->_data['async']; }
        return NULL;
    }

    /**
    * Sets the success field.
    */
    public function setAsync($async)
    {
        $this->_data['async'] = $async;
    }
}
