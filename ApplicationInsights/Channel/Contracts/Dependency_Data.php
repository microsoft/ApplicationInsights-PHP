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
* Data contract class for type Dependency_Data. An instance of Remote Dependency represents an interaction of the monitored component with a remote component/service like SQL or an HTTP endpoint. 
*/
class Dependency_Data extends Base_Data implements Data_Interface
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
    * Gets the name field. Name of the command initiated with this dependency call. Low cardinality value. Examples are stored procedure name and URL path template. 
    */
    public function getName()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field. Name of the command initiated with this dependency call. Low cardinality value. Examples are stored procedure name and URL path template. 
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the id field. Identifier of a dependency call instance. Used for correlation with the request telemetry item corresponding to this dependency call. 
    */
    public function getId()
    {
        if (array_key_exists('id', $this->_data)) { return $this->_data['id']; }
        return NULL;
    }

    /**
    * Sets the id field. Identifier of a dependency call instance. Used for correlation with the request telemetry item corresponding to this dependency call. 
    */
    public function setId($id)
    {
        $this->_data['id'] = $id;
    }

    /**
    * Gets the resultCode field. Result code of a dependency call. Examples are SQL error code and HTTP status code. 
    */
    public function getResultCode()
    {
        if (array_key_exists('resultCode', $this->_data)) { return $this->_data['resultCode']; }
        return NULL;
    }

    /**
    * Sets the resultCode field. Result code of a dependency call. Examples are SQL error code and HTTP status code. 
    */
    public function setResultCode($resultCode)
    {
        $this->_data['resultCode'] = var_export($resultCode, TRUE);
    }

    /**
    * Gets the duration field. Request duration in format: DD.HH:MM:SS.MMMMMM. Must be less than 1000 days. 
    */
    public function getDuration()
    {
        if (array_key_exists('duration', $this->_data)) { return $this->_data['duration']; }
        return NULL;
    }

    /**
    * Sets the duration field. Request duration in format: DD.HH:MM:SS.MMMMMM. Must be less than 1000 days. 
    */
    public function setDuration($duration)
    {
        $this->_data['duration'] = $duration;
    }

    /**
    * Gets the success field. Indication of successfull or unsuccessfull call. 
    */
    public function getSuccess()
    {
        if (array_key_exists('success', $this->_data)) { return $this->_data['success']; }
        return NULL;
    }

    /**
    * Sets the success field. Indication of successfull or unsuccessfull call. 
    */
    public function setSuccess($success)
    {
        $this->_data['success'] = $success;
    }

    /**
    * Gets the data field. Command initiated by this dependency call. Examples are SQL statement and HTTP URL's with all query parameters. 
    */
    public function getData()
    {
        if (array_key_exists('data', $this->_data)) { return $this->_data['data']; }
        return NULL;
    }

    /**
    * Sets the data field. Command initiated by this dependency call. Examples are SQL statement and HTTP URL's with all query parameters. 
    */
    public function setData($data)
    {
        $this->_data['data'] = $data;
    }

    /**
    * Gets the target field. Target site of a dependency call. Examples are server name, host address. 
    */
    public function getTarget()
    {
        if (array_key_exists('target', $this->_data)) { return $this->_data['target']; }
        return NULL;
    }

    /**
    * Sets the target field. Target site of a dependency call. Examples are server name, host address. 
    */
    public function setTarget($target)
    {
        $this->_data['target'] = $target;
    }

    /**
    * Gets the type field. Dependency type name. Very low cardinality value for logical grouping of dependencies and interpretation of other fields like commandName and resultCode. Examples are SQL, Azure table, and HTTP. 
    */
    public function getType()
    {
        if (array_key_exists('type', $this->_data)) { return $this->_data['type']; }
        return NULL;
    }

    /**
    * Sets the type field. Dependency type name. Very low cardinality value for logical grouping of dependencies and interpretation of other fields like commandName and resultCode. Examples are SQL, Azure table, and HTTP. 
    */
    public function setType($type)
    {
        $this->_data['type'] = $type;
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
