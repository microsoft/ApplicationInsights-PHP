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
    * Gets the ip field.
    */
    public function getIp()
    {
        if (array_key_exists('ai.device.ip', $this->_data)) { return $this->_data['ai.device.ip']; }
        return NULL;
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
        if (array_key_exists('ai.device.language', $this->_data)) { return $this->_data['ai.device.language']; }
        return NULL;
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
    * Gets the network field.
    */
    public function getNetwork()
    {
        if (array_key_exists('ai.device.network', $this->_data)) { return $this->_data['ai.device.network']; }
        return NULL;
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
    * Gets the os field.
    */
    public function getOs()
    {
        if (array_key_exists('ai.device.os', $this->_data)) { return $this->_data['ai.device.os']; }
        return NULL;
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
    * Gets the roleInstance field.
    */
    public function getRoleInstance()
    {
        if (array_key_exists('ai.device.roleInstance', $this->_data)) { return $this->_data['ai.device.roleInstance']; }
        return NULL;
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
        if (array_key_exists('ai.device.roleName', $this->_data)) { return $this->_data['ai.device.roleName']; }
        return NULL;
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
        if (array_key_exists('ai.device.screenResolution', $this->_data)) { return $this->_data['ai.device.screenResolution']; }
        return NULL;
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

    /**
    * Gets the vmName field.
    */
    public function getVmName()
    {
        if (array_key_exists('ai.device.vmName', $this->_data)) { return $this->_data['ai.device.vmName']; }
        return NULL;
    }

    /**
    * Sets the vmName field.
    */
    public function setVmName($vmName)
    {
        $this->_data['ai.device.vmName'] = $vmName;
    }
}
