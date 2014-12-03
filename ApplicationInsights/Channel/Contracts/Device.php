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
    }

    /**
    * Gets the id field. 
    */
    public function get_id()
    {
        return $this->_data['ai.device.id'];
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
        return $this->_data['ai.device.ip'];
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
        return $this->_data['ai.device.language'];
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
        return $this->_data['ai.device.locale'];
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
        return $this->_data['ai.device.model'];
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
        return $this->_data['ai.device.network'];
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
        return $this->_data['ai.device.oemName'];
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
        return $this->_data['ai.device.os'];
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
        return $this->_data['ai.device.osVersion'];
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
        return $this->_data['ai.device.roleInstance'];
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
        return $this->_data['ai.device.roleName'];
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
        return $this->_data['ai.device.screenResolution'];
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
        return $this->_data['ai.device.type'];
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
        return $this->_data['ai.device.vmName'];
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
        return $this->_data;
    }
}
?>
