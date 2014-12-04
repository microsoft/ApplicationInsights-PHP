<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Device. 
*/
class Device implements \JsonSerializable 
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
        $this->_data = [];
    }

    /**
    * Gets the id field. 
    */
    public function get_id()
    {
        if (array_key_exists('ai.device.id', $this->_data)) { return $this->_data['ai.device.id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function set_id($id)
    {
        $this->_data['ai.device.id'] = $id;
    }

    /**
    * Gets the ip field. 
    */
    public function get_ip()
    {
        if (array_key_exists('ai.device.ip', $this->_data)) { return $this->_data['ai.device.ip']; }
        return NULL;
    }

    /**
    * Sets the ip field. 
    */
    public function set_ip($ip)
    {
        $this->_data['ai.device.ip'] = $ip;
    }

    /**
    * Gets the language field. 
    */
    public function get_language()
    {
        if (array_key_exists('ai.device.language', $this->_data)) { return $this->_data['ai.device.language']; }
        return NULL;
    }

    /**
    * Sets the language field. 
    */
    public function set_language($language)
    {
        $this->_data['ai.device.language'] = $language;
    }

    /**
    * Gets the locale field. 
    */
    public function get_locale()
    {
        if (array_key_exists('ai.device.locale', $this->_data)) { return $this->_data['ai.device.locale']; }
        return NULL;
    }

    /**
    * Sets the locale field. 
    */
    public function set_locale($locale)
    {
        $this->_data['ai.device.locale'] = $locale;
    }

    /**
    * Gets the model field. 
    */
    public function get_model()
    {
        if (array_key_exists('ai.device.model', $this->_data)) { return $this->_data['ai.device.model']; }
        return NULL;
    }

    /**
    * Sets the model field. 
    */
    public function set_model($model)
    {
        $this->_data['ai.device.model'] = $model;
    }

    /**
    * Gets the network field. 
    */
    public function get_network()
    {
        if (array_key_exists('ai.device.network', $this->_data)) { return $this->_data['ai.device.network']; }
        return NULL;
    }

    /**
    * Sets the network field. 
    */
    public function set_network($network)
    {
        $this->_data['ai.device.network'] = $network;
    }

    /**
    * Gets the oemName field. 
    */
    public function get_oem_name()
    {
        if (array_key_exists('ai.device.oemName', $this->_data)) { return $this->_data['ai.device.oemName']; }
        return NULL;
    }

    /**
    * Sets the oemName field. 
    */
    public function set_oem_name($oem_name)
    {
        $this->_data['ai.device.oemName'] = $oem_name;
    }

    /**
    * Gets the os field. 
    */
    public function get_os()
    {
        if (array_key_exists('ai.device.os', $this->_data)) { return $this->_data['ai.device.os']; }
        return NULL;
    }

    /**
    * Sets the os field. 
    */
    public function set_os($os)
    {
        $this->_data['ai.device.os'] = $os;
    }

    /**
    * Gets the osVersion field. 
    */
    public function get_os_version()
    {
        if (array_key_exists('ai.device.osVersion', $this->_data)) { return $this->_data['ai.device.osVersion']; }
        return NULL;
    }

    /**
    * Sets the osVersion field. 
    */
    public function set_os_version($os_version)
    {
        $this->_data['ai.device.osVersion'] = $os_version;
    }

    /**
    * Gets the roleInstance field. 
    */
    public function get_role_instance()
    {
        if (array_key_exists('ai.device.roleInstance', $this->_data)) { return $this->_data['ai.device.roleInstance']; }
        return NULL;
    }

    /**
    * Sets the roleInstance field. 
    */
    public function set_role_instance($role_instance)
    {
        $this->_data['ai.device.roleInstance'] = $role_instance;
    }

    /**
    * Gets the roleName field. 
    */
    public function get_role_name()
    {
        if (array_key_exists('ai.device.roleName', $this->_data)) { return $this->_data['ai.device.roleName']; }
        return NULL;
    }

    /**
    * Sets the roleName field. 
    */
    public function set_role_name($role_name)
    {
        $this->_data['ai.device.roleName'] = $role_name;
    }

    /**
    * Gets the screenResolution field. 
    */
    public function get_screen_resolution()
    {
        if (array_key_exists('ai.device.screenResolution', $this->_data)) { return $this->_data['ai.device.screenResolution']; }
        return NULL;
    }

    /**
    * Sets the screenResolution field. 
    */
    public function set_screen_resolution($screen_resolution)
    {
        $this->_data['ai.device.screenResolution'] = $screen_resolution;
    }

    /**
    * Gets the type field. 
    */
    public function get_type()
    {
        if (array_key_exists('ai.device.type', $this->_data)) { return $this->_data['ai.device.type']; }
        return NULL;
    }

    /**
    * Sets the type field. 
    */
    public function set_type($type)
    {
        $this->_data['ai.device.type'] = $type;
    }

    /**
    * Gets the vmName field. 
    */
    public function get_vm_name()
    {
        if (array_key_exists('ai.device.vmName', $this->_data)) { return $this->_data['ai.device.vmName']; }
        return NULL;
    }

    /**
    * Sets the vmName field. 
    */
    public function set_vm_name($vm_name)
    {
        $this->_data['ai.device.vmName'] = $vm_name;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::remove_empty_value($this->_data);
    }
}
?>
