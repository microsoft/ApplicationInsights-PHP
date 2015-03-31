<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Device. 
*/
class Device
{
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
        return array_key_exists('ai.device.id', $this->_data) ? $this->_data['ai.device.id'] : null;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['ai.device.id'] = $id;
    }

    /**
    * Gets the ip field. 
    */
    public function getIp()
    {
        return array_key_exists('ai.device.ip', $this->_data) ? $this->_data['ai.device.ip'] : null;
    }

    /**
    * Sets the ip field. 
    */
    public function setIp($ip)
    {
        $this->_data['ai.device.ip'] = $ip;
    }

    /**
    * Gets the language field. 
    */
    public function getLanguage()
    {
        return array_key_exists('ai.device.language', $this->_data) ? $this->_data['ai.device.language'] : null;
    }

    /**
    * Sets the language field. 
    */
    public function setLanguage($language)
    {
        $this->_data['ai.device.language'] = $language;
    }

    /**
    * Gets the locale field. 
    */
    public function getLocale()
    {
        return array_key_exists('ai.device.locale', $this->_data) ? $this->_data['ai.device.locale'] : null;
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
        return array_key_exists('ai.device.model', $this->_data) ? $this->_data['ai.device.model'] : null;
    }

    /**
    * Sets the model field. 
    */
    public function setModel($model)
    {
        $this->_data['ai.device.model'] = $model;
    }

    /**
    * Gets the network field. 
    */
    public function getNetwork()
    {
        return array_key_exists('ai.device.network', $this->_data) ? $this->_data['ai.device.network'] : null;
    }

    /**
    * Sets the network field. 
    */
    public function setNetwork($network)
    {
        $this->_data['ai.device.network'] = $network;
    }

    /**
    * Gets the oemName field. 
    */
    public function getOemName()
    {
        return array_key_exists('ai.device.oemName', $this->_data) ? $this->_data['ai.device.oemName'] : null;
    }

    /**
    * Sets the oemName field. 
    */
    public function setOemName($oemName)
    {
        $this->_data['ai.device.oemName'] = $oemName;
    }

    /**
    * Gets the os field. 
    */
    public function getOs()
    {
        return array_key_exists('ai.device.os', $this->_data) ? $this->_data['ai.device.os'] : null;
    }

    /**
    * Sets the os field. 
    */
    public function setOs($os)
    {
        $this->_data['ai.device.os'] = $os;
    }

    /**
    * Gets the osVersion field. 
    */
    public function getOsVersion()
    {
        return array_key_exists('ai.device.osVersion', $this->_data) ? $this->_data['ai.device.osVersion'] : null;
    }

    /**
    * Sets the osVersion field. 
    */
    public function setOsVersion($osVersion)
    {
        $this->_data['ai.device.osVersion'] = $osVersion;
    }

    /**
    * Gets the roleInstance field. 
    */
    public function getRoleInstance()
    {
        return array_key_exists('ai.device.roleInstance', $this->_data) ? $this->_data['ai.device.roleInstance'] : null;
    }

    /**
    * Sets the roleInstance field. 
    */
    public function setRoleInstance($roleInstance)
    {
        $this->_data['ai.device.roleInstance'] = $roleInstance;
    }

    /**
    * Gets the roleName field. 
    */
    public function getRoleName()
    {
        return array_key_exists('ai.device.roleName', $this->_data) ? $this->_data['ai.device.roleName'] : null;
    }

    /**
    * Sets the roleName field. 
    */
    public function setRoleName($roleName)
    {
        $this->_data['ai.device.roleName'] = $roleName;
    }

    /**
    * Gets the screenResolution field. 
    */
    public function getScreenResolution()
    {
        return array_key_exists('ai.device.screenResolution', $this->_data) ? $this->_data['ai.device.screenResolution'] : null;
    }

    /**
    * Sets the screenResolution field. 
    */
    public function setScreenResolution($screenResolution)
    {
        $this->_data['ai.device.screenResolution'] = $screenResolution;
    }

    /**
    * Gets the type field. 
    */
    public function getType()
    {
        return array_key_exists('ai.device.type', $this->_data) ? $this->_data['ai.device.type'] : null;
    }

    /**
    * Sets the type field. 
    */
    public function setType($type)
    {
        $this->_data['ai.device.type'] = $type;
    }

    /**
    * Gets the vmName field. 
    */
    public function getVmName()
    {
        return array_key_exists('ai.device.vmName', $this->_data) ? $this->_data['ai.device.vmName'] : null;
    }

    /**
    * Sets the vmName field. 
    */
    public function setVmName($vmName)
    {
        $this->_data['ai.device.vmName'] = $vmName;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
