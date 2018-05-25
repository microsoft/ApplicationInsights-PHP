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
* Data contract class for type Device. 
*/
class Device
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Device. 
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the id field. 
    */
    public function getId()
    {
        if (array_key_exists('ai.device.id', $this->_data)) { return $this->_data['ai.device.id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['ai.device.id'] = $id;
    }

    /**
    * Gets the locale field. 
    */
    public function getLocale()
    {
        if (array_key_exists('ai.device.locale', $this->_data)) { return $this->_data['ai.device.locale']; }
        return NULL;
    }

    /**
    * Sets the locale field. 
    */
    public function setLocale($locale)
    {
        $this->_data['ai.device.locale'] = $locale;
    }

    /**
    * Gets the model field. 
    */
    public function getModel()
    {
        if (array_key_exists('ai.device.model', $this->_data)) { return $this->_data['ai.device.model']; }
        return NULL;
    }

    /**
    * Sets the model field. 
    */
    public function setModel($model)
    {
        $this->_data['ai.device.model'] = $model;
    }

    /**
    * Gets the oemName field. 
    */
    public function getOemName()
    {
        if (array_key_exists('ai.device.oemName', $this->_data)) { return $this->_data['ai.device.oemName']; }
        return NULL;
    }

    /**
    * Sets the oemName field. 
    */
    public function setOemName($oemName)
    {
        $this->_data['ai.device.oemName'] = $oemName;
    }

    /**
    * Gets the osVersion field. 
    */
    public function getOsVersion()
    {
        if (array_key_exists('ai.device.osVersion', $this->_data)) { return $this->_data['ai.device.osVersion']; }
        return NULL;
    }

    /**
    * Sets the osVersion field. 
    */
    public function setOsVersion($osVersion)
    {
        $this->_data['ai.device.osVersion'] = $osVersion;
    }

    /**
    * Gets the type field. 
    */
    public function getType()
    {
        if (array_key_exists('ai.device.type', $this->_data)) { return $this->_data['ai.device.type']; }
        return NULL;
    }

    /**
    * Sets the type field. 
    */
    public function setType($type)
    {
        $this->_data['ai.device.type'] = $type;
    }
}
